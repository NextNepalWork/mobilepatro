<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    protected $fillable = ['title', 'url', 'thumbnail', 'status'];
}
