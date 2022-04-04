<?php

namespace App\Http\Controllers\Api;

use App\Models\Backend\Card;
use App\Models\Backend\CardAlignment;
use App\Models\Backend\CardShared;
use App\Models\Backend\VisitingCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class CardController extends Controller
{
    public function cards()
    {
    	$cards = Card::where('status', 'Active')->get();

    	foreach ($cards as $card) {
    		$card->template = asset('/uploads/cards/' . $card->template);
    	}

    	return response()->json($cards, Response::HTTP_OK);
    }

    public function alignments()
    {
    	$alignments = CardAlignment::select('id', 'alignment')->get();
    	return response()->json($alignments, Response::HTTP_OK);
    }

    public function storeVisitingCard(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'card_id' => 'required|integer',
    		'card_alignment_id' => 'required|integer'
    	]);

    	if ($validator->fails()) {
    		return response()->json(['errors' => $validator->messages()], Response::HTTP_NOT_ACCEPTABLE);
    	}

    	$visiting = new VisitingCard();
    	$visiting->card_id = $request->card_id;
    	$visiting->user_id = auth('api')->id();
    	$visiting->card_alignment_id = $request->card_alignment_id;
    	$visiting->save();

    	return response()->json(['success' => 'Visiting Card successfully created.'], Response::HTTP_CREATED);
    }

    public function viewVisitingCard()
    {
    	$card = VisitingCard::where('user_id', auth('api')->id())->first();
    	$card->image = asset('/uploads/cards/' . $card->cards->template);
    	unset($card->cards);
    	return response()->json($card, Response::HTTP_OK);
    }

    public function shareCard(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'friend_id' => 'required|integer',
    		'visiting_card_id' => 'required|integer'
    	]);

    	if ($validator->fails()) {
    		return response()->json(['errors' => $validator->messages()], Response::HTTP_NOT_ACCEPTABLE);
    	}

    	$shareCard = new CardShared();
    	$shareCard->friend_id = $request->friend_id;
    	$shareCard->visiting_card_id = $request->visiting_card_id;
        $shareCard->user_id = auth('api')->id();
    	$shareCard->save();

        $sendData = array
        (
            'body'  => $shareCard->sharedUser->first_name . ' has shared their card with you.',
            'title' => 'Card Shared',
            'image' => asset('/uploads/cards/' . $shareCard->cards->template),
            'user_id' => $shareCard->friend_id
        );
        // $response = onesignalNotificationToSpecificUser($sendData, $shareCard->friend_id);

    	return response()->json(['success' => 'Visiting Card successfully shared.'], Response::HTTP_CREATED);
    }

    public function viewSharedCard()
    {
    	$cards = CardShared::where('friend_id', auth('api')->id())->get();
        if(!isset($cards) || $cards->isEmpty())
        {
            return response()->json(['msg' => 'There is no card yet.', 'error' => true], Response::HTTP_NOT_FOUND);
        }
    	foreach ($cards as $card) {
            $card->image = asset('/uploads/cards/' . $card->cards->template);
            $card->first_name = $card->sharedUser->first_name;
            $card->last_name = $card->sharedUser->last_name;
            $card->username = $card->sharedUser->username;
            $card->email = $card->sharedUser->email;
            $card->designation = $card->sharedUser->userInfos ? $card->sharedUser->userInfos->designation : null;
            $card->company = $card->sharedUser->userInfos ? $card->sharedUser->userInfos->company : null;
            $card->facebook = $card->sharedUser->userInfos ? $card->sharedUser->userInfos->facebook: null;
            $card->google = $card->sharedUser->userInfos ? $card->sharedUser->userInfos->google : null;
            $card->linkedin = $card->sharedUser->userInfos ? $card->sharedUser->userInfos->linkedin : null;
            unset($card->cards);
            unset($card->sharedUser);
        }
    	
    	return response()->json($cards, Response::HTTP_OK);
    }
}
