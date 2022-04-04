<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Controller;
use App\Models\Backend\Card;
use Illuminate\Http\Request;

class CardController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::paginate(10);
        $this->data('cards', $cards);
        $this->data('title', $this->setTitle('All Cards'));
        return view('backend.cards.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data('title', $this->setTitle('Create Card'));
        return view('backend.cards.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:50',
            'template' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3072'
        ]);

        $card = new Card();
        $card->title = $request->title;
        $card->status = $request->status;
        if ($request->hasFile('template')) {
            $template = $request->file('template');
            $name = $template->getClientOriginalName();
            $template->move(public_path('/uploads/cards/'), $name);
            $card->template = $name;
        }
        $card->save();

        return redirect()->back()->with('success', 'Card Template successfully saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = Card::findOrFail($id);
        $this->data('card', $card);
        $this->data('title', $this->setTitle('Edit Card'));
        return view('backend.cards.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:50',
            'template' => 'image|mimes:jpg,png,jpeg,gif,svg|max:3072'
        ]);

        $card = Card::findOrFail($id);
        $card->title = $request->title;
        $card->status = $request->status;
        if ($request->hasFile('template')) {
            if ($card->template) {
                unlink(public_path('/uploads/cards/' . $card->template));
            }
            $template = $request->file('template');
            $name = $template->getClientOriginalName();
            $template->move(public_path('/uploads/cards/'), $name);
            $card->template = $name;
        }
        $card->update();

        return redirect()->back()->with('success', 'Card Template successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Card::findOrFail($id);
        if ($card->visitingCards()->exists()) {
            return redirect()->back()->with('error', 'Card Template can\'t be deleted. It is used by users.');
        }
        if($card->template != null)
        {
            unlink(public_path('/uploads/cards/' . $card->template));
        }

        $card->delete();

        return redirect()->back()->with('success', 'Card Template successfully deleted.');
    }
}
