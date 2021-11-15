<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SuperAdminController extends Controller
{
    public function dashboard()

    {
        $this->AdminAuthCheck();
        return view('backend.admin.dashboard');
    }

    public function logout()
    {
        Session::flush();
        return Redirect::to('/adminLogin');
    }

    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
            return Redirect::to('/adminLogin')->send();
        }
    }
}
