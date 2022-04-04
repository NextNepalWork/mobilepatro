<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class CardShared extends Model
{
    protected $fillable = ['friend_id', 'visiting_card_id', 'user_id'];

    public function users()
    {
    	return $this->belongsTo(User::class, 'friend_id');
    }

    public function visitingCards()
    {
    	return $this->belongsTo(VisitingCard::class, 'visiting_card_id');
    }
    
    public function cards() 
    {
    	return $this->belongsTo(Card::class, 'visiting_card_id');
    }

    public function sharedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
