<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public  function index()
    {
        return view('frontend.pages.checkout');
    }

    public  function login_check()
    {
        return view('frontend.pages.login');
    }

    public function save_shipping_address(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['city'] = $request->city;
        $data['country'] = $request->country;
        $data['mobile'] = $request->mobile;
        $data['zipcode'] = $request->zipcode;
        $data['address'] = $request->address;

        $s_id = Shipping::insertGetId($data);

        Session::put('id', $s_id);
        return Redirect::to('/payment');
    }

    public function payment()
    {
        return view('frontend.pages.payment');
    }
}
