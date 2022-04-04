<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CustomVideo;
use App\Http\Resources\Api\Daily;
use App\Http\Resources\Api\Month;
use App\Http\Resources\Api\NewsRss;
use App\Http\Resources\Api\Week;
use App\Http\Resources\Api\Year;
use App\Http\Resources\Api\YoutubeVideo;
use App\Models\Backend\Horoscope;
use App\Models\Backend\Horoscopes;
use App\Models\Backend\Monthly;
use App\Models\Backend\MonthlyHoro;
use App\Models\Backend\User;
use App\Models\Backend\Videos;
use App\Models\Backend\Weekly;
use App\Models\Backend\WeeklyHoro;
use App\Models\Backend\Yearly;
use App\Models\Backend\YearlyHoro;
use App\Models\Backend\Youtube;
use Carbon\Carbon;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;

class ApiAdminController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'password' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->messages()], Response::HTTP_NOT_ACCEPTABLE);
            }

            $username = $request->username;
            $password = $request->password;

            if (Auth::attempt(['username' => $username, 'password' => $password])) {
                $http = new GuzzleHttp\Client;

                $response = $http->post(url('/oauth/token'), [
                    'form_params' => [
                        'grant_type' => 'password',
                        'client_id' => '2',
                        'client_secret' => 'UegsEtcA7NjOi0eJtvLjvvCTyBQ4lv5dYisFKHaL',
                        'username' => $username,
                        'password' => $password,
                    ],
                ]);
                return json_decode((string)$response->getBody(), true);
            } else {
                return response()->json(['message' => 'Invalid Credentials', 'error' => true], Response::HTTP_UNAUTHORIZED);
            }

        }
        return true;
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $privilege = $request->privilege;

            $validator = Validator::make($request->all(), [

                'first_name' => 'required|max:30',
                'last_name' => 'required|max:30',
                'username' => 'required|min:5|max:30|unique:users,username',
                'email' => 'required|min:5|max:30|unique:users,email',
                'phone' => 'required|numeric',
                'password' => 'min:6|required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->messages()], Response::HTTP_NOT_ACCEPTABLE);
            }

            $data['first_name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['username'] = $request->username;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['password'] = bcrypt($request->password);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/user');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $data['privilege'] = 2;

            $user = User::create($data);
            $response = $user->id;

            $data2['user_id'] = $response;
            $data2['privilege_id'] = $data['privilege'];
            $result = DB::table('privilege_user')->insert($data2);

            if ($user && $result) {

                $http = new GuzzleHttp\Client;
                $response = $http->post(url('/oauth/token'), [
                    'form_params' => [
                        'grant_type' => 'password',
                        'client_id' => '2',
                        'client_secret' => 'UegsEtcA7NjOi0eJtvLjvvCTyBQ4lv5dYisFKHaL',
                        'username' => $request->username,
                        'password' => $request->password,
                    ],
                ]);
                return json_decode((string)$response->getBody(), true);
            }


        }


    }


    public function show_horo_daily()
    {
        $date = Carbon::now()->toDateString();
        $daily = Horoscopes::where('date', '=', $date)->first();
        
        if(!isset($daily) && empty($daily))
        {
            $daily = Horoscopes::orderBy('date', 'desc')->first();
        }


        return [
            'dates' => $date,
            'rashi' => [
                '0' => [
                    'name' => 'Aries',
                    'rashi' => strip_tags($daily->aries),
                    'image' => asset('images/rashifals/aries.png')
                ],
                '1' => [
                    'name' => 'Taurus',
                    'rashi' => strip_tags($daily->taurus),
                    'image' => asset('images/rashifals/taurus.png')
                ],
                '2' => [
                    'name' => 'Gemini',
                    'rashi' => strip_tags($daily->gemini),
                    'image' => asset('images/rashifals/gemini.png')
                ],
                '3' => [
                    'name' => 'Cancer',
                    'rashi' => strip_tags($daily->cancer),
                    'image' => asset('images/rashifals/cancer.png')
                ],
                '4' => [
                    'name' => 'Leo',
                    'rashi' => strip_tags($daily->leo),
                    'image' => asset('images/rashifals/leo.png')
                ],
                '5' => [
                    'name' => 'Virgo',
                    'rashi' => strip_tags($daily->virgo),
                    'image' => asset('images/rashifals/virgo.png')
                ],
                '6' => [
                    'name' => 'Libra',
                    'rashi' => strip_tags($daily->libra),
                    'image' => asset('images/rashifals/libra.png')
                ],
                '7' => [
                    'name' => 'Scorpio',
                    'rashi' => strip_tags($daily->scorpio),
                    'image' => asset('images/rashifals/scorpio.png')
                ],
                '8' => [
                    'name' => 'Sagittarius',
                    'rashi' => strip_tags($daily->sagittarius),
                    'image' => asset('images/rashifals/sagittarius.png')
                ],
                '9' => [
                    'name' => 'Capricorn',
                    'rashi' => strip_tags($daily->capricorn),
                    'image' => asset('images/rashifals/capricorn.png')
                ],
                '10' => [
                    'name' => 'Aquarius',
                    'rashi' => strip_tags($daily->aquarius),
                    'image' => asset('images/rashifals/aquarius.png')
                ],
                '11' => [
                    'name' => 'Pisces',
                    'rashi' => strip_tags($daily->pisces),
                    'image' => asset('images/rashifals/pisces.png')
                ],


            ]
        ];
    }

    public function show_horo_weekly()
    {
        $weekly = WeeklyHoro::all()->last();
        $date = $weekly->date;

      return [
            'dates' => $date,
            'rashi' => [
                '0' => [
                    'name' => 'Aries',
                    'rashi' => strip_tags($weekly->aries),
                    'image' => asset('images/rashifals/aries.png')
                ],
                '1' => [
                    'name' => 'Taurus',
                    'rashi' => strip_tags($weekly->taurus),
                    'image' => asset('images/rashifals/taurus.png')
                ],
                '2' => [
                    'name' => 'Gemini',
                    'rashi' => strip_tags($weekly->gemini),
                    'image' => asset('images/rashifals/gemini.png')
                ],
                '3' => [
                    'name' => 'Cancer',
                    'rashi' => strip_tags($weekly->cancer),
                    'image' => asset('images/rashifals/cancer.png')
                ],
                '4' => [
                    'name' => 'Leo',
                    'rashi' => strip_tags($weekly->leo),
                    'image' => asset('images/rashifals/leo.png')
                ],
                '5' => [
                    'name' => 'Virgo',
                    'rashi' => strip_tags($weekly->virgo),
                    'image' => asset('images/rashifals/virgo.png')
                ],
                '6' => [
                    'name' => 'Libra',
                    'rashi' => strip_tags($weekly->libra),
                    'image' => asset('images/rashifals/libra.png')
                ],
                '7' => [
                    'name' => 'Scorpio',
                    'rashi' => strip_tags($weekly->scorpio),
                    'image' => asset('images/rashifals/scorpio.png')
                ],
                '8' => [
                    'name' => 'Sagittarius',
                    'rashi' => strip_tags($weekly->sagittarius),
                    'image' => asset('images/rashifals/sagittarius.png')
                ],
                '9' => [
                    'name' => 'Capricorn',
                    'rashi' => strip_tags($weekly->capricorn),
                    'image' => asset('images/rashifals/capricorn.png')
                ],
                '10' => [
                    'name' => 'Aquarius',
                    'rashi' => strip_tags($weekly->aquarius),
                    'image' => asset('images/rashifals/aquarius.png')
                ],
                '11' => [
                    'name' => 'Pisces',
                    'rashi' => strip_tags($weekly->pisces),
                    'image' => asset('images/rashifals/pisces.png')
                ],


            ]
        ];
    }

    public function show_horo_monthly()
    {
        $monthly = MonthlyHoro::where('date', date('m/Y'))->first();
        if(!isset($monthly) && empty($monthly))
        {
            $monthly = MonthlyHoro::orderBy('date', 'desc')->first();
        }
        $date = $monthly->date;

       return [
            'dates' => $date,
            'rashi' => [
                '0' => [
                    'name' => 'Aries',
                    'rashi' => strip_tags($monthly->aries),
                    'image' => asset('images/rashifals/aries.png')
                ],
                '1' => [
                    'name' => 'Taurus',
                    'rashi' => strip_tags($monthly->taurus),
                    'image' => asset('images/rashifals/taurus.png')
                ],
                '2' => [
                    'name' => 'Gemini',
                    'rashi' => strip_tags($monthly->gemini),
                    'image' => asset('images/rashifals/gemini.png')
                ],
                '3' => [
                    'name' => 'Cancer',
                    'rashi' => strip_tags($monthly->cancer),
                    'image' => asset('images/rashifals/cancer.png')
                ],
                '4' => [
                    'name' => 'Leo',
                    'rashi' => strip_tags($monthly->leo),
                    'image' => asset('images/rashifals/leo.png')
                ],
                '5' => [
                    'name' => 'Virgo',
                    'rashi' => strip_tags($monthly->virgo),
                    'image' => asset('images/rashifals/virgo.png')
                ],
                '6' => [
                    'name' => 'Libra',
                    'rashi' => strip_tags($monthly->libra),
                    'image' => asset('images/rashifals/libra.png')
                ],
                '7' => [
                    'name' => 'Scorpio',
                    'rashi' => strip_tags($monthly->scorpio),
                    'image' => asset('images/rashifals/scorpio.png')
                ],
                '8' => [
                    'name' => 'Sagittarius',
                    'rashi' => strip_tags($monthly->sagittarius),
                    'image' => asset('images/rashifals/sagittarius.png')
                ],
                '9' => [
                    'name' => 'Capricorn',
                    'rashi' => strip_tags($monthly->capricorn),
                    'image' => asset('images/rashifals/capricorn.png')
                ],
                '10' => [
                    'name' => 'Aquarius',
                    'rashi' => strip_tags($monthly->aquarius),
                    'image' => asset('images/rashifals/aquarius.png')
                ],
                '11' => [
                    'name' => 'Pisces',
                    'rashi' => strip_tags($monthly->pisces),
                    'image' => asset('images/rashifals/pisces.png')
                ],


            ]
            ];

    }

    public function show_horo_yearly()
    {
        $yearly = YearlyHoro::where('date', date('Y'))->first();
        if(!isset($yearly) && empty($yearly))
        {
            $yearly = YearlyHoro::orderBy('date', 'desc')->first();
        }
        $date = $yearly->date;

       return [
            'dates' => $date,
            'rashi' => [
                '0' => [
                    'name' => 'Aries',
                    'rashi' => strip_tags($yearly->aries),
                    'image' => asset('images/rashifals/aries.png')
                ],
                '1' => [
                    'name' => 'Taurus',
                    'rashi' => strip_tags($yearly->taurus),
                    'image' => asset('images/rashifals/taurus.png')
                ],
                '2' => [
                    'name' => 'Gemini',
                    'rashi' => strip_tags($yearly->gemini),
                    'image' => asset('images/rashifals/gemini.png')
                ],
                '3' => [
                    'name' => 'Cancer',
                    'rashi' => strip_tags($yearly->cancer),
                    'image' => asset('images/rashifals/cancer.png')
                ],
                '4' => [
                    'name' => 'Leo',
                    'rashi' => strip_tags($yearly->leo),
                    'image' => asset('images/rashifals/leo.png')
                ],
                '5' => [
                    'name' => 'Virgo',
                    'rashi' => strip_tags($yearly->virgo),
                    'image' => asset('images/rashifals/virgo.png')
                ],
                '6' => [
                    'name' => 'Libra',
                    'rashi' => strip_tags($yearly->libra),
                    'image' => asset('images/rashifals/libra.png')
                ],
                '7' => [
                    'name' => 'Scorpio',
                    'rashi' => strip_tags($yearly->scorpio),
                    'image' => asset('images/rashifals/scorpio.png')
                ],
                '8' => [
                    'name' => 'Sagittarius',
                    'rashi' => strip_tags($yearly->sagittarius),
                    'image' => asset('images/rashifals/sagittarius.png')
                ],
                '9' => [
                    'name' => 'Capricorn',
                    'rashi' => strip_tags($yearly->capricorn),
                    'image' => asset('images/rashifals/capricorn.png')
                ],
                '10' => [
                    'name' => 'Aquarius',
                    'rashi' => strip_tags($yearly->aquarius),
                    'image' => asset('images/rashifals/aquarius.png')
                ],
                '11' => [
                    'name' => 'Pisces',
                    'rashi' => strip_tags($yearly->pisces),
                    'image' => asset('images/rashifals/pisces.png')
                ],


            ]
        ];
    }

    public function youtube_videos()
    {
        $youtubes = Youtube::orderby('id', 'desc')->get();
        foreach ($youtubes as $youtube) {
            $youtube->thumbnail = asset('uploads/thumbnails/' . $youtube->thumbnail);
            $youtube->video_id = $youtube->url;
            unset($youtube->url);
        }
        return new YoutubeVideo($youtubes);
    }

    public function custom_videos()
    {
        $custom = Videos::orderby('id', 'desc')->get();
        foreach ($custom as $youtube) {
            $youtube->thumbnail = asset('uploads/thumbnails/' . $youtube->thumbnail);
            $youtube->video_id = $youtube->video;
            unset($youtube->video);
        }
        return new CustomVideo($custom);
    }

    // public function newsrss()
    // {
    //     if (ini_get('allow_url_fopen') == true) {
    //         // $newsapi = simplexml_load_file("https://www.onlinekhabar.com/feed");
    //         // $json = json_encode($newsapi);
    //         // $newsdecode = json_decode($json, true);
    //         // $data = $newsdecode['channel'];
    //      $onlinekhbr = simplexml_load_file("https://www.onlinekhabar.com/feed");
    //     $json = json_encode($onlinekhbr);
    //     $newsdecode = json_decode($json, true);
    //     $chan = $newsdecode['channel'];
    //     $img['url'] = $newsdecode['channel']['image']['url'];
    //     $title=$newsdecode['channel']['item'][0];
    //     $arr[]=array_merge($img,$title);

    //     $hamropati=simplexml_load_file('http://hamropati.com/feed');
    //     $enc=json_encode($hamropati);
    //     $news=json_decode($enc,true);
    //     $value=$news['channel'];
    //     $image['url']=$news['channel']['image']['url'];
    //     $heading=$news['channel']['item'][1];
    //     $array[]=array_merge($image,$heading);
        
    //     } else if (function_exists('curl_init')) {
    //         $curl = curl_init("https://www.onlinekhabar.com/feed");
    //         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //         $result = curl_exec($curl);
    //         curl_close($curl);
    //         $newsapi = simplexml_load_string($result);
    //          $onlinekhbr = simplexml_load_string($result);
    //     $json = json_encode($onlinekhbr);
    //     $newsdecode = json_decode($json, true);
    //     $chan = $newsdecode['channel'];
    //     $img['url'] = $newsdecode['channel']['image']['url'];
    //     $title=$newsdecode['channel']['item'][0];
    //     $arr[]=array_merge($img,$title);

    //     $hamropati=simplexml_load_string($result);
    //     $enc=json_encode($hamropati);
    //     $news=json_decode($enc,true);
    //     $value=$news['channel'];
    //     $image['url']=$news['channel']['image']['url'];
    //     $heading=$news['channel']['item'][1];
    //     $array[]=array_merge($image,$heading);
    //         // $json = json_encode($newsapi);
    //         // $newsdecode = json_decode($json, true);
    //         // $data = $newsdecode['channel'];
    //     } else {
    //         // Enable 'allow_url_fopen' or install cURL.
    //         throw new \Exception("Can't load data.");
    //     }
    //     // $newsapi = simplexml_load_file("https://www.onlinekhabar.com/feed");
    //     // $json = json_encode($newsapi);
    //     // $newsdecode = json_decode($json, true);
    //     // $data = $newsdecode['channel'];

    //     return new NewsRss($array);
    // }
      public function newsrss()
    {
           if (ini_get('allow_url_fopen') == false) {      
            $curl = curl_init("https://www.onlinekhabar.com/feed");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);
            
            $curl2 = curl_init("http://hamropati.com/feed");
            curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
            $result2 = curl_exec($curl2);
            curl_close($curl2);
            
            $curl3 = curl_init("https://www.khabarhub.com/category/%E0%A4%AA%E0%A5%8D%E0%A4%B0%E0%A4%AE%E0%A5%81%E0%A4%96-%E0%A4%B8%E0%A4%AE%E0%A4%BE%E0%A4%9A%E0%A4%BE%E0%A4%B0/feed/?fbclid=IwAR2Mu59msShq22GPS19UXFMRGa5AaqWE2LsxULiDNTLHKsdRgLvP1SYjj6c");
            curl_setopt($curl3, CURLOPT_RETURNTRANSFER, 1);
            $result3 = curl_exec($curl3);
            curl_close($curl3);
            
            $curl4 = curl_init("https://english.khabarhub.com/category/breaking-news/feed/?fbclid=IwAR32xN7O4TTAAXjY45W3vKjLyVjskkU9onJaKgzSioxtHK4yhqYRGQCt4kA");
            curl_setopt($curl4, CURLOPT_RETURNTRANSFER, 1);
            $result4 = curl_exec($curl4);
            curl_close($curl4);
            
            $curl5 = curl_init("https://www.khabarhub.com/category/%E0%A4%96%E0%A5%87%E0%A4%B2%E0%A4%95%E0%A5%81%E0%A4%A6/feed/?fbclid=IwAR2V365J0dHKDLic6jHawcEgt2D7IslZ7xq6GxGepxXE6SkGmixPxzP0--0");
            curl_setopt($curl5, CURLOPT_RETURNTRANSFER, 1);
            $result5 = curl_exec($curl5);
            curl_close($curl5);
            
            $curl6=curl_init("https://www.khabarhub.com/category/%E0%A4%AE%E0%A4%A8%E0%A5%8B%E0%A4%B0%E0%A4%9E%E0%A5%8D%E0%A4%9C%E0%A4%A8/feed/?fbclid=IwAR3PYVMsFb1HQEKqb2dTVpnLwaf1ShlMQGFnE2VEu6rIV2kUbmBzcwiWDXs");
            curl_setopt($curl6, CURLOPT_RETURNTRANSFER, 1);
            $result6 = curl_exec($curl6);
            curl_close($curl6);
            
            $curl7=curl_init("https://www.khabarhub.com/category/%E0%A4%86%E0%A4%B0%E0%A5%8D%E0%A4%A5%E0%A4%BF%E0%A4%95/feed/?fbclid=IwAR0eHb6blvWxCgfFYwH6TGVlLQ-HTdUWV7lqQcU9eJqBAPaXByqtuu5zVmU");
            curl_setopt($curl7, CURLOPT_RETURNTRANSFER, 1);
            $result7 = curl_exec($curl7);
            curl_close($curl7);
            
            $curl8=curl_init("https://english.khabarhub.com/category/Politics/feed/?fbclid=IwAR3YgGGjZ3StWGLWbBL1mIkGpBE7UkrLdEkyBnRrhraW6tFz_aQxl1ILd60");
            curl_setopt($curl8,CURLOPT_RETURNTRANSFER,1);
            $result8 = curl_exec($curl8);
            curl_close($curl8);
            
            $curl9=curl_init("https://english.khabarhub.com/category/World/feed/?fbclid=IwAR0YBwnLgLgMgouZMHTOxEwUjPT3xAYcuOSD4Q21leCcQh6eYYrYzzGeiQg");
            curl_setopt($curl9,CURLOPT_RETURNTRANSFER,1);
            $result9=curl_exec($curl9);
            curl_close($curl9);
            
            $curl10=curl_init("https://english.khabarhub.com/category/technology-science/feed/?fbclid=IwAR0h3D0kqHAo14mXzAeclIsUmd0aUsEAM6_9NviX02D9fqWEN5w2C0QMXnw");
            curl_setopt($curl10,CURLOPT_RETURNTRANSFER,1);
            $result10=curl_exec($curl10);
            curl_close($curl10);
            
            $curl11=curl_init("https://english.khabarhub.com/category/Business/feed/?fbclid=IwAR1zMVqK913VLz2xonrPcwdnsjpJga9ljgYU2Ta9EhmdqDciBlX7hJh24ZA");
            curl_setopt($curl11,CURLOPT_RETURNTRANSFER,1);
            $result11=curl_exec($curl11);
            curl_close($curl11);
            
              $curl12=curl_init('https://www.khabarhub.com/wp-json/appharurest/v2/posts/0/1/');
             curl_setopt($curl12,CURLOPT_RETURNTRANSFER,1);
            $result12=curl_exec($curl12);
            curl_close($curl12);
            
              $curl13=curl_init('https://www.khabarhub.com/wp-json/appharurest/v2/posts/3/1/');
             curl_setopt($curl13,CURLOPT_RETURNTRANSFER,1);
            $result13=curl_exec($curl13);
            curl_close($curl13);
            
            $curl14=curl_init('https://www.khabarhub.com/wp-json/appharurest/v2/posts/0/1/');
             curl_setopt($curl14,CURLOPT_RETURNTRANSFER,1);
            $result14=curl_exec($curl14);
            curl_close($curl14);
            
             $curl15=curl_init('https://www.khabarhub.com/wp-json/appharurest/v2/posts/0/1/');
             curl_setopt($curl15,CURLOPT_RETURNTRANSFER,1);
            $result15=curl_exec($curl15);
            curl_close($curl15);
            
        
                $onlinekhbr = simplexml_load_string($result);
                $hamropati = simplexml_load_string($result2);
                $khabarhub=simplexml_load_string($result3);
                $english=simplexml_load_string($result4);
                $sport=simplexml_load_string($result5);
                $manoranjan=simplexml_load_string($result6);
                $arthik=simplexml_load_string($result7);
                $english=simplexml_load_string($result4);
                $politics=simplexml_load_string($result8);
                $world=simplexml_load_string($result9);
                $techno=simplexml_load_string($result10);
                $bus=simplexml_load_string($result11);
            
        $json = json_encode($onlinekhbr);
        $newsdecode = json_decode($json, true);
        $chan = $newsdecode['channel'];
        $img['url'] = $newsdecode['channel']['image']['url'];
        $title=$newsdecode['channel']['item'][0];
        $date['pubDate']=\Illuminate\Support\Carbon::parse($title['pubDate'])->format('d F D');
        $media['media']=$chan['title'];
        $arr[]=array_merge($img,$title,$date,$media);
      

        $enc=json_encode($hamropati);
        $news=json_decode($enc,true);
        $value=$news['channel'];
        $image['url']=$news['channel']['image']['url'];
        $heading=$news['channel']['item'][0];
        $day['pubDate']=\Illuminate\Support\Carbon::parse($heading['pubDate'])->format('d F D');
        $med['media']=$value['title'];
        $array[]=array_merge($image,$heading,$day,$med);
        
        $encode=json_encode($khabarhub);
        $dec=json_decode($encode,true);
        $val=$dec['channel'];
        $img['url']=$dec['channel']['image']['url'];
        $head=$dec['channel']['item'][0];
        $time['pubDate']=\Illuminate\Support\Carbon::parse($head['pubDate'])->format('d F D');
        $channel['media']=$val['title'];
        $merge[]=array_merge($img,$head,$time,$channel);
        
       $encode=json_encode($english);
        $dec=json_decode($encode,true);
        $eng=$dec['channel'];
        $time['pubDate']=\Illuminate\Support\Carbon::parse($head['pubDate'])->format('d F D');
        $img['url']=$dec['channel']['image']['url'];
        $head=$dec['channel']['item'][0];
        $channel['media']=$eng['title'];
        $combo[]=array_merge($img,$head,$time,$channel);
        // dd($combo);
        
        $encode=json_encode($sport);
        $dec=json_decode($encode,true);
        $eng=$dec['channel'];
        // dd($eng);
        $time['pubDate']=\Illuminate\Support\Carbon::parse($head['pubDate'])->format('d F D');
        $img['url']=$dec['channel']['image']['url'];
        $head=$dec['channel']['item'][0];
        $channel['media']=$val['title'];
        $mix[]=array_merge($img,$head,$time,$channel);
        // dd($mix);
        
        $encode=json_encode($manoranjan);
        $dec=json_decode($encode,true);
        $eng=$dec['channel'];
        $time['pubDate']=\Illuminate\Support\Carbon::parse($head['pubDate'])->format('d F D');
        $img['url']=$dec['channel']['image']['url'];
        $head=$dec['channel']['item'][0];
        $channel['media']=$val['title'];
        $mixer[]=array_merge($img,$head,$time,$channel);
        
        $encode=json_encode($arthik);
        $dec=json_decode($encode,true);
        $eng=$dec['channel'];
        $time['pubDate']=\Illuminate\Support\Carbon::parse($head['pubDate'])->format('d F D');
        $img['url']=$dec['channel']['image']['url'];
        $head=$dec['channel']['item'][0];
        $channel['media']=$val['title'];
        $arth[]=array_merge($img,$head,$time,$channel);
        
        $encode=json_encode($politics);
        $dec=json_decode($encode,true);
        $eng=$dec['channel'];
        $time['pubDate']=\Illuminate\Support\Carbon::parse($head['pubDate'])->format('d F D');
        $img['url']=$dec['channel']['image']['url'];
        $head=$dec['channel']['item'][0];
        $channel['media']=$val['title'];
        $pol[]=array_merge($img,$head,$time,$channel);
        
        $encode=json_encode($world);
        $dec=json_decode($encode,true);
        $eng=$dec['channel'];
        $time['pubDate']=\Illuminate\Support\Carbon::parse($head['pubDate'])->format('d F D');
        $img['url']=$dec['channel']['image']['url'];
        $head=$dec['channel']['item'][0];
        $channel['media']=$val['title'];
        $world_en[]=array_merge($img,$head,$time,$channel);
        
        $encode=json_encode($techno);
        $dec=json_decode($encode,true);
        $eng=$dec['channel'];
        $time['pubDate']=\Illuminate\Support\Carbon::parse($head['pubDate'])->format('d F D');
        $img['url']=$dec['channel']['image']['url'];
        $head=$dec['channel']['item'][0];
        $channel['media']=$val['title'];
        $tech_en[]=array_merge($img,$head,$time,$channel);
        
        $encode=json_encode($bus);
        $dec=json_decode($encode,true);
        // dd($dec);
        $eng=$dec['channel'];
        $time['pubDate']=\Illuminate\Support\Carbon::parse($head['pubDate'])->format('d F D');
        $img['url']=$dec['channel']['image']['url'];
        $head=$dec['channel']['item'][0];
        $channel['media']=$val['title'];
        $bus_en[]=array_merge($img,$head,$time,$channel);
        
        
           $deco= json_decode($result12);
        $img['link']=$deco[0]->permalink;
        $thumbnail['thumbnail']=$deco[0]->image_link_medium;
        $time['pubDate']=\Illuminate\Support\Carbon::parse($deco[0]->date)->format('d F D');
        $channel['title']=$deco[0]->title;
        $latest[]=array_merge($img,$time,$channel,$thumbnail);
       
        
        $decode=json_decode($result13);
        $img['link']=$decode[0]->permalink;
        $thumbnail['thumbnail']=$decode[0]->image_link_medium;
        $time['pubDate']=\Illuminate\Support\Carbon::parse($decode[0]->date)->format('d F D');
        $channel['title']=$decode[0]->title;
        $poli[]=array_merge($img,$time,$channel,$thumbnail);
        
         $decode1=json_decode($result14);
        $img['link']=$decode1[2]->permalink;
        $thumbnail['thumbnail']=$decode1[2]->image_link_medium;
        $time['pubDate']=\Illuminate\Support\Carbon::parse($decode1[2]->date)->format('d F D');
        $channel['title']=$decode1[2]->title;
        $new[]=array_merge($img,$time,$channel,$thumbnail);
        
        
         $decode1=json_decode($result15);
        $img['link']=$decode1[3]->permalink;
        $thumbnail['thumbnail']=$decode1[3]->image_link_medium;
        $time['pubDate']=\Illuminate\Support\Carbon::parse($decode1[3]->date)->format('d F D');
        $channel['title']=$decode1[3]->title;
        $new1[]=array_merge($img,$time,$channel,$thumbnail);
        
        
        
        $arraa=array_merge($array,$arr,$merge,$mix,$mixer,$arth,$combo,$pol,$world_en,$tech_en,$bus_en,$latest,$poli,$new,$new1);
        $new_collection_count = count($arraa);

            $perPage = 15;
            $currentPage = Input::get('page', 1) - 1;
$new_collection = array_slice($arraa, $currentPage * $perPage, $perPage);
$Ads = new Paginator($new_collection, $new_collection_count, $perPage);

        return new NewsRss($Ads);
        
    


}

    }
}
