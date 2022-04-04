<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Horoscope;
use App\Models\Backend\Horoscopes;
use App\Models\Backend\Monthly;
use App\Models\Backend\News;
use App\Models\Backend\Privilege;
use App\Models\Backend\User;
use App\Models\Backend\Weekly;
use App\Models\Backend\Yearly;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends BackendController
{
    public function index()
    {
        return view($this->backendPath . 'index', $this->data);
    }

    public function add_user()
    {
        $privilegeData = Privilege::where('status', '=', '1')->orderby('id', 'desc')->get();
        $this->data('privilegeData', $privilegeData);
        $this->data('title', $this->setTitle('add-user'));
        return view($this->backendPath . 'add_user', $this->data);
    }

    public function add_user_action(Request $request)
    {
        if ($request->isMethod('post')) {


            $privilege = $request->privilege;

            $request->validate([
                'privilege' => 'required',
                'last_name' => 'required|max:30',
                'first_name' => 'required|max:30',
                'username' => 'required|min:5|max:30',
                'email' => 'required|min:5|max:30',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
                'image' => 'required'
            ],
                ['privilege.required' => 'Please provide privilege']);

            $data['first_name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['username'] = $request->username;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/user');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $privilege = implode(',', $request->privilege);
            $data['privilege'] = $privilege;

            $privilege = $request->privilege;
            $totalId = count($privilege);
            $increment = 0;

            $user = User::create($data);
            $response = $user->id;

            foreach ($privilege as $value) {
                $data2['user_id'] = $response;
                $data2['privilege_id'] = $value;
                $result = DB::table('privilege_user')->insert($data2);
                if ($result) {
                    $increment++;
                }
            }
            if ($totalId == $increment) {
                return redirect()->route('show-user')->with('success', 'User has been added');
            }


        }


    }

    public function delete_user(Request $request)
    {
        if ($request->isMethod('get')) {

            $id = $request->id;
            $user = User::findorfail($id);
            if ($user->id != 1 && $user->id != 2) {
                $userprivilege = DB::table('privilege_user')->where('user_id', '=', $id);
                $deleteuserpriv = $userprivilege->delete();
                if ($this->delete_file($id) && $deleteuserpriv && $user->delete()) {
                    Session::flash('success', 'User has been removed');
                    return redirect()->back();
                }
            } else {
                Session::flash('error', 'Access Denied');
                return redirect()->back();
            }
        }
    }

    public function delete_file($id)
    {
        $findData = User::findorfail($id);
        $fileName = $findData->image;
        $deletePath = public_path('images/user/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

    public function edit_user(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $userdata = User::findorfail($id);
            if ($userdata->id != 1 && $userdata->id != 2) {
                $this->data('userdata', $userdata);
                $this->data('title', $this->setTitle('Edit-User'));
                $privilegeData = Privilege::where('status', '=', '1')->orderby('id', 'desc')->get();
                $this->data('privilegeData', $privilegeData);
                return view($this->backendPath . 'edit_user', $this->data);

            } else {
                return redirect()->back()->with('error', 'Access Denied');
            }
        }
    }

    public function edit_user_action(Request $request)
    {
        if ($request->isMethod('post')) {
            $id = $request->id;

            $request->validate([
                'privilege' => 'required',
                'first_name' => 'required|max:30',
                'last_name' => 'required|max:30',
                'username' => 'required|min:5|max:30',
                'email' => 'required|min:5|max:30',
                'password' => 'min:6|required_with:password_confirmation|same:password_confirmation'
            ],
                ['privilege.required' => 'Please provide privilege']);
            $data['first_name'] = $request->first_name;
            $data['last_name'] = $request->last_name;
            $data['username'] = $request->username;
            $data['email'] = $request->email;
            $data['password'] = bcrypt($request->password);


            if ($request->hasFile('image')) {
                $this->delete_file($id);
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/user');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $privilege = implode(',', $request->privilege);
            $data['privilege'] = $privilege;

            $privilege = $request->privilege;
            $user = User::findorfail($id);
            $result = $user->privileges()->sync($privilege);
            if ($result && $user->update($data)) {
                return redirect()->route('show-user')->with('success', 'User Updated');
            }
        }
    }

    public function show_user(Request $request)
    {
        if ($request->isMethod('get')) {
            $userdata = User::orderby('id', 'desc')->get();
            $this->data('userdata', $userdata);
            $this->data('title', $this->setTitle('show-user'));
            return view($this->backendPath . 'show_user', $this->data);
        }
    }


    public function add_privilege()
    {
        $this->data('title', $this->setTitle('Add-PrivilegeSeeder'));
        return view($this->backendPath . 'add_privilege', $this->data);
    }

    public function add_news_action(Request $request)
    {
        if ($request->isMethod('post')) {


            $request->validate([
                'category' => 'required',
                'title' => 'required|min:5|max:25',
                'description' => 'required|min:10|max:200',
                'image' => 'required'
            ]);
            $data['category'] = $request->category;
            $data['title'] = $request->title;
            $data['description'] = $request->description;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/News');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }

            if (News::create($data)) {
                Session::flash('success', 'Your News has Been Added');
                return redirect()->route('show-news');

            }
        }
    }

    function show_news(Request $request)
    {
        if ($request->isMethod('get')) {

            $news = News::orderby('id', 'desc')->paginate(5);
            $this->data('news', $news);
            $this->data('title', $this->setTitle('manage-news'));
            return view($this->backendPath . 'show_news', $this->data);
        }
    }

    public function add_news(Request $request)
    {
        if ($request->isMethod('get')) {

            $this->data('title', $this->setTitle('News & Updates'));
            return view($this->backendPath . 'add_slides', $this->data);
        }
    }

    public function edit_news(Request $request)
    {
        if ($request->isMethod('get')) {
            $id = $request->id;
            $news = News::findorfail($id);
            $this->data('news', $news);
            $this->data('title', $this->setTitle('Edit-News'));

            return view($this->backendPath . 'edit_news', $this->data);
        }
    }

    public function edit_news_action(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'category' => 'required',
                'title' => 'required|min:5|max:25',
                'description' => 'required|min:10|max:200',
                'image' => 'required'
            ]);

            $data['category'] = $request->category;
            $data['title'] = $request->title;
            $data['description'] = $request->description;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/News');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }

            $id = $request->id;
            $newsata = News::findorfail($id);
            if ($newsata->update($data)) {
                Session::flash('success', 'News Updated');
                return redirect()->route('show-news');
            }
        }
    }

    public function delete_news()
    {

    }

    public function show_horo_weekly()
    {

        $weekly = Weekly::orderby('id', 'desc')->paginate(12);
        $this->data('weekly', $weekly);
        $this->data('title', $this->setTitle('Show-Weekly-Horoscope'));
        return view($this->backendPath . 'show_weekly_horo', $this->data);

    }

    public function show_horo_monthly()
    {
        $monthly = Monthly::orderby('id', 'desc')->paginate(12);
        $this->data('monthly', $monthly);
        $this->data('title', $this->setTitle('Show-Monthly-Horoscope'));
        return view($this->backendPath . 'show_monthly_horo', $this->data);

    }

    public function show_horo_yearly()
    {
        $yearly = Yearly::orderby('id', 'desc')->paginate(12);
        $this->data('yearly', $yearly);
        $this->data('title', $this->setTitle('Show-Yearly-Horoscope'));
        return view($this->backendPath . 'show_yearly_horo', $this->data);
    }

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->setTitle('Login'));
            return view($this->backendPath . 'login', $this->data);
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);
            $username = $request->username;
            $password = $request->password;

            $remember = isset($request->remember) ? true : false;

            if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
                return redirect()->route('add-horo');
            } else {
                Session::flash('error', 'Username and Password not match');
                return redirect()->back();
            }

        }
    }

    public function widgets(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->setTitle('Widgets'));
            return view($this->backendPath . 'widgets', $this->data);
        }
    }

    public function Calendar(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->setTitle('Calendar'));
            return view($this->backendPath . 'calendar', $this->data);
        }
    }

    public function Panchang(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->setTitle('Panchang'));
            return view($this->backendPath . 'panchang', $this->data);
        }
    }

    public function logout(Request $request)
    {
        if ($request->isMethod('get')) {
            Auth::logout();
            return redirect()->back();
        }
    }

    public function forex(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->setTitle('Exchange Rate'));
            return view($this->backendPath . 'forex', $this->data);
        }
    }
}
