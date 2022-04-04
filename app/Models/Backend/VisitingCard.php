<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class VisitingCard extends Model
{
    protected $fillable = ['user_id', 'card_id', 'card_alignment_id'];

    public function users()
    {
    	return $this->belongsTo(User::class);
    }

    public function cards() 
    {
    	return $this->belongsTo(Card::class, 'card_id');
    }

    public function cardShared()
    {
    	return $this->hasMany(CardShared::class, 'visiting_card_id');
    }
}
