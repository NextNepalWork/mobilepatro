<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['title', 'template', 'status'];

    public function visitingCards()
    {
    	return $this->hasMany(VisitingCard::class, 'card_id');
    }
}
