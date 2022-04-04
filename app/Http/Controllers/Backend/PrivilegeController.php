<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Privilege;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PrivilegeController extends BackendController
{
    public function add_privilege(Request $request)
    {
        if ($request->isMethod('get')) {
            $priviliges = Privilege::orderby('id', 'desc')->get();
            $this->data('priviliges', $priviliges);
            $this->data('title', $this->setTitle('Privileges'));
            return view($this->backendPath . 'add-privileges', $this->data);
        }

        if ($request->isMethod('post')) {

            $request->validate([
                'privilegename' => 'required'
            ]);

            $data['privilege'] = $request->privilegename;
            $privilege = Privilege::create($data);
            if ($privilege) {
                Session::flash('success', 'Privileges Added');
                return redirect()->back();
            }


        }
    }

    public function privilege_status(Request $request)
    {
        if ($request->isMethod('post')) {
            $id = $request->status;
            $update = Privilege::findorfail($id);

            if (isset($_POST['active'])) {
                $update->status = 0;
            }
            if (isset($_POST['inactive'])) {
                $update->status = 1;
            }
            if ($update->update()) {
                Session::flash('success', 'Privilege status has been updated');
                return redirect()->back();
            }
        }
    }

    public function delete_privilege(Request $request)
    {
        if ($request->isMethod('get')) {


            $id = $request->id;
            $data = Privilege::findorfail($id);
            $privilege_user = DB::table('privilege_user')->where('privilege_id', '=', $id)->get();

            foreach ($privilege_user as $puser) {
                if ($puser->privilege_id == $id) {
                    Session::flash('error', 'Cannot Delete,First Delete your User');
                    return redirect()->back();
                }
            }
            if ($data->delete()) {
                Session::flash('success', 'Privilege Deleted');
                return redirect()->back();
            }
        }
    }

    public function edit_privilege(Request $request)
    {
        $privilege = Privilege::findorfail($request->id);
        $this->data('privilege', $privilege);
        $this->data('title', $this->setTitle('Edit-Privilege'));
        return view($this->backendPath . 'edit_privilege', $this->data);

    }

    public function edit_privilege_action(Request $request)
    {
        $data['privilege'] = $request->privilegename;
        $id = $request->id;
        $privilege = Privilege::findorfail($id);
        $result = $privilege->update($data);
        if ($result) {
            Session::flash('success', 'Privilege Updated');
            return redirect()->back();
        }
    }

}
