<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Shipping;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

session_start();
class CheckoutController extends Controller
{
    public  function index()
    {
        $customer_id = Customer::where('id', Session::get('id'))->first();
        return view('frontend.pages.checkout', compact('customer_id'));
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

        Session::put('sid', $s_id);
        return Redirect::to('/payment');
    }

    public function payment()
    {
        $cartCollection = Cart::getContent();
        $cart_array = $cartCollection->toArray();
        return view('frontend.pages.payment', compact('cart_array'));
    }

    public function order_place(Request $request)
    {
        $payment_method = $request->payment;
        $pdata = array();
        $pdata['payment_method'] = $payment_method;
        $pdata['status'] = 'panding';
        $payment_id = Payment::insertGetId($pdata);

        $odata = array();
        $odata['cus_id'] = Session::get('id');
        $odata['ship_id'] = Session::get('sid');
        $odata['pay_id'] = $payment_id;
        $odata['total'] = Cart::getTotal();
        $odata['status'] = 'pending';
        $order_id = Order::insertGetId($odata);

        $cartCollection = Cart::getContent();
        $odata = array();
        foreach ($cartCollection as $cartContent) {
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $cartContent->id;
            $oddata['product_name'] = $cartContent->name;
            $oddata['product_price'] = $cartContent->price;
            $oddata['product_sales_quantity'] = $cartContent->quantity;
            DB::table('order_details')->insert($oddata);
        }
    }
}
