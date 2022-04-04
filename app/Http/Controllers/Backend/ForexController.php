<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Forex;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForexController extends BackendController
{
public function update_forex(Request $request)
{
  if ($request->isMethod('get'))
  {
      $forex= new Forex;
      $this->data('forex',$forex);
      $this->data('title', $this->setTitle('Exchange-Rates'));
      return view($this->backendPath . 'add_forex', $this->data);
  }
  if($request->isMethod('post'))
  {
      $request->validate([
        'usa_image' => 'required|sometimes',
        'usa_currency' => 'required',
        'usa_unit' => 'required',
        'usa_buying' => 'required',
        'usa_selling' => 'required',
        'uk_currency' => 'required',
        'uk_image' => 'required|sometimes',
        'uk_unit' => 'required',
        'uk_buying' => 'required',
        'uk_selling' => 'required',
        'europe_currency' => 'required',
        'europe_image' => 'required|sometimes',
        'europe_unit' => 'required',
        'europe_buying' => 'required',
        'europe_selling' => 'required',
        'australia_image' => 'required|sometimes',
        'australia_currency' => 'required',
        'australia_unit' => 'required',
        'australia_buying' => 'required',
        'australia_selling' => 'required',
        'canada_image' => 'required|sometimes',
        'canada_currency' => 'required',
        'canada_unit' => 'required',
        'canada_buying' => 'required',
        'canada_selling' => 'required',
        'switzerland_image' => 'required|sometimes',
        'switzerland_currency' => 'required',
        'switzerland_unit' => 'required',
        'switzerland_buying' => 'required',
        'switzerland_selling' => 'required',
        'china_image' => 'required|sometimes',
        'china_currency' => 'required',
        'china_unit' => 'required',
        'china_buying' => 'required',
        'china_selling' => 'required',
        'japan_image' => 'required|sometimes',
        'japan_currency' => 'required',
        'japan_unit' => 'required',
        'japan_buying' => 'required',
        'japan_selling' => 'required',
        'saudi_image' => 'required|sometimes',
        'saudi_currency' => 'required',
        'saudi_unit' => 'required',
        'saudi_buying' => 'required',
        'saudi_selling' => 'required',
        'singapore_image' => 'required|sometimes',
        'singapore_currency' => 'required',
        'singapore_unit' => 'required',
        'singapore_buying' => 'required',
        'singapore_selling' => 'required',
        'qatar_image' => 'required|sometimes',
        'qatar_currency' => 'required',
        'qatar_unit' => 'required',
        'qatar_buying' => 'required',
        'qatar_selling' => 'required',
        'thailand_image' => 'required|sometimes',
        'thailand_currency' => 'required',
        'thailand_unit' => 'required',
        'thailand_buying' => 'required',
        'thailand_selling' => 'required'
      ]);

      $inputs = $request->only([
        'usa_image',
        'usa_currency',
        'usa_unit',
        'usa_buying',
        'usa_selling',
        'uk_currency',
        'uk_image',
        'uk_unit',
        'uk_buying',
        'uk_selling',
        'europe_currency',
        'europe_image',
        'europe_unit',
        'europe_buying',
        'europe_selling',
        'australia_image',
        'australia_currency',
        'australia_unit',
        'australia_buying',
        'australia_selling',
        'canada_image',
        'canada_currency',
        'canada_unit',
        'canada_buying',
        'canada_selling',
        'switzerland_image',
        'switzerland_currency',
        'switzerland_unit',
        'switzerland_buying',
        'switzerland_selling',
        'china_image',
        'china_currency',
        'china_unit',
        'china_buying',
        'china_selling',
        'japan_image',
        'japan_currency',
        'japan_unit',
        'japan_buying',
        'japan_selling',
        'saudi_image',
        'saudi_currency',
        'saudi_unit',
        'saudi_buying',
        'saudi_selling',
        'singapore_image',
        'singapore_currency',
        'singapore_unit',
        'singapore_buying',
        'singapore_selling',
        'qatar_image',
        'qatar_currency',
        'qatar_unit',
        'qatar_buying',
        'qatar_selling',
        'thailand_image',
        'thailand_currency',
        'thailand_unit',
        'thailand_buying',
        'thailand_selling'
      ]);

      foreach ( $inputs as $inputKey => $inputValue ) {
        if ( $inputKey == 'usa_image' || $inputKey == 'europe_image' || $inputKey == 'uk_image' || $inputKey == 'australia_image' || $inputKey == 'canada_image' || $inputKey == 'switzerland_image' || $inputKey == 'china_image' || $inputKey == 'japan_image' || $inputKey == 'saudi_image' || $inputKey == 'singapore_image' || $inputKey == 'qatar_image' || $inputKey == 'thailand_image' ) {
          $file = $inputValue;
          // Delete old file
          $this->deleteFile( $inputKey );
          // Upload file & get store file name
          $fileName   = $this->uploadFile( $file );
          $inputValue = $fileName;
        }   
        Forex::updateOrCreate( [ 'key' => $inputKey ], [ 'value' => $inputValue ] );
      }

      return redirect()->back()->with('success', 'Currency successfully updated!');
  }
}

  protected function uploadFile( $file ) {
    // Store file
    // $path = Storage::disk('public')->put( 'storage/settings', $file, 'public' );
    // // Get stored file name
    // $fileName = explode( 'storage/settings/', $path );

        $image = $file;
        $name = $image->getClientOriginalName();
        $destinationPath = public_path('/images/flags/');
        $image->move($destinationPath, $name);
        $data['image'] = $name;

    // File name
    return $name;
  }

  protected function deleteFile( $inputKey ) {
    $forex = Forex::where( 'key', '=', $inputKey )->first();
    // Check if configuration exists
    // if ( null !== $configuration && $configuration->exists() ) {
    //   $fullPath = storage_path( 'app/public' ) . '/' . $configuration->configuration_value;
    //   if ( File::exists( $fullPath ) ) {
    //     // File exists
    //     File::delete( $fullPath );
    //   }
    // }

    if(isset($forex) && $forex->value != null) {
      unlink(public_path('images/flags/').$forex->value);
      return true;
    }
    return false;
  }
}
