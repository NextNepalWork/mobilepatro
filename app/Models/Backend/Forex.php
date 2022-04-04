<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Forex extends Model
{
	protected $fillable=['key','value'];

	public static function getForex( $key ) {
		$model = new static();

		$row = $model->where( 'key', '=', $key )->first();
		if ( $row != null ) {
			return $row->value;
		}
	}
}
