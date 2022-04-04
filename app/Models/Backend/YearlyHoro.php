<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class YearlyHoro extends Model
{
    protected $fillable = ['date', 'aries', 'taurus', 'gemini', 'cancer', 'leo', 'virgo', 'libra', 'scorpio', 'sagittarius', 'capricorn', 'aquarius', 'pisces'];
}
