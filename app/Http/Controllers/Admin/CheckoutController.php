<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Room;
use App\Booking;
use DB;
use Cart;
use Alert;


class CheckoutController extends Controller
{
    function index(){
        $items = \Cart::getContent();
        return view('admin.checkout.index',['items'=>$items]);
    }
}
