<?php

namespace App\Http\Controllers\Api;

use App\Models\Backend\Forex;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ForexController extends Controller
{
    public function index()
    {
    	$forex = new Forex();

    	$data = [
    		[
    			'image' => asset('images/flags/' . $forex->getForex('usa_image')),
    			'currency' => $forex->getForex('usa_currency'),
    			'unit' => $forex->getForex('usa_unit'),
    			'buying' => $forex->getForex('usa_buying'),
    			'selling' => $forex->getForex('usa_selling')
    		],
    		[
    			'image' => asset('images/flags/' . $forex->getForex('europe_image')),
    			'currency' => $forex->getForex('europe_currency'),
    			'unit' => $forex->getForex('europe_unit'),
    			'buying' => $forex->getForex('europe_buying'),
    			'selling' => $forex->getForex('europe_selling')
    		],
    		[
    			'image' => asset('images/flags/' . $forex->getForex('uk_image')),
    			'currency' => $forex->getForex('uk_currency'),
    			'unit' => $forex->getForex('uk_unit'),
    			'buying' => $forex->getForex('uk_buying'),
    			'selling' => $forex->getForex('uk_selling')
    		],
    		[
    			'image' => asset('images/flags/' . $forex->getForex('australia_image')),
    			'currency' => $forex->getForex('australia_currency'),
    			'unit' => $forex->getForex('australia_unit'),
    			'buying' => $forex->getForex('australia_buying'),
    			'selling' => $forex->getForex('australia_selling')
    		],
    		[
    			'image' => asset('images/flags/' . $forex->getForex('canada_image')),
    			'currency' => $forex->getForex('canada_currency'),
    			'unit' => $forex->getForex('canada_unit'),
    			'buying' => $forex->getForex('canada_buying'),
    			'selling' => $forex->getForex('canada_selling')
    		],
    		[
    			'image' => asset('images/flags/' . $forex->getForex('switzerland_image')),
    			'currency' => $forex->getForex('switzerland_currency'),
    			'unit' => $forex->getForex('switzerland_unit'),
    			'buying' => $forex->getForex('switzerland_buying'),
    			'selling' => $forex->getForex('switzerland_selling')
    		],
    		[
    			'image' => asset('images/flags/' . $forex->getForex('china_image')),
    			'currency' => $forex->getForex('china_currency'),
    			'unit' => $forex->getForex('china_unit'),
    			'buying' => $forex->getForex('china_buying'),
    			'selling' => $forex->getForex('china_selling')
    		],
    		[
    			'image' => asset('images/flags/' . $forex->getForex('japan_image')),
    			'currency' => $forex->getForex('japan_currency'),
    			'unit' => $forex->getForex('japan_unit'),
    			'buying' => $forex->getForex('japan_buying'),
    			'selling' => $forex->getForex('japan_selling')
    		],
    		[
    			'image' => asset('images/flags/' . $forex->getForex('saudi_image')),
    			'currency' => $forex->getForex('saudi_currency'),
    			'unit' => $forex->getForex('saudi_unit'),
    			'buying' => $forex->getForex('saudi_buying'),
    			'selling' => $forex->getForex('saudi_selling')
    		],
    		[
    			'image' => asset('images/flags/' . $forex->getForex('singapore_image')),
    			'currency' => $forex->getForex('singapore_currency'),
    			'unit' => $forex->getForex('singapore_unit'),
    			'buying' => $forex->getForex('singapore_buying'),
    			'selling' => $forex->getForex('singapore_selling')
    		],
    		[
    			'image' => asset('images/flags/' . $forex->getForex('qatar_image')),
    			'currency' => $forex->getForex('qatar_currency'),
    			'unit' => $forex->getForex('qatar_unit'),
    			'buying' => $forex->getForex('qatar_buying'),
    			'selling' => $forex->getForex('qatar_selling')
    		],
    		[
    			'image' => asset('images/flags/' . $forex->getForex('thailand_image')),
    			'currency' => $forex->getForex('thailand_currency'),
    			'unit' => $forex->getForex('thailand_unit'),
    			'buying' => $forex->getForex('thailand_buying'),
    			'selling' => $forex->getForex('thailand_selling')
    		]
    	];

    	return response()->json($data, Response::HTTP_OK);
    }
}
