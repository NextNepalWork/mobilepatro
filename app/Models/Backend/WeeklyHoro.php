<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class WeeklyHoro extends Model
{
    protected $fillable = ['date', 'aries', 'taurus', 'gemini', 'cancer', 'leo', 'virgo', 'libra', 'scorpio', 'sagittarius', 'capricorn', 'aquarius', 'pisces'];
}
