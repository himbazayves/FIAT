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
class AdminController extends Controller
{


    public function __construct()
   {
       $this->middleware('auth');
   }
   function home(){

    $user=Auth::user();

    if($user->role->name="admin"){

        return view('admin.home');
    }


   }


   


   



  


  function Rooms(){
    $rooms=Room::all();
    return view('admin.rooms',['rooms'=>$rooms]);
   }

   function editRoom($room){

    
return view('admin.editRoom',['room'=>$room]);
   }

   function viewRoom($room){

    $room=Room::find($room);
    
    return view('admin.viewRoom',['room'=>$room]);
}


function deleteRoom($room){

    

}


function getCheckout(){
    $items = \Cart::getContent();
    return view('admin.getCheckout',['items'=>$items]);
}



public function removeItem($item)
{
    Cart::remove($item);

    if (Cart::isEmpty()) {
        return redirect('admin/findRoom')->with('success', 'Item removed from cart successfully .');
   }


    return redirect()->back()->with('success', 'Item removed from cart successfully.');
}


function bookingHandle(Request $request){


}
}
