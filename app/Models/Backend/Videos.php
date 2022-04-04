<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $fillable = ['title', 'video', 'thumbnail', 'status'];
}
