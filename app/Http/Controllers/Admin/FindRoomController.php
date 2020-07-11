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

class FindRoomController extends Controller
{
    function findRoom(Request $request){
        $rooms = $request->session()->get('availableRooms');
        $checkIn = $request->session()->get('check_in');
        $checkOut = $request->session()->get('check_out');
        return view('admin.findRoom',['rooms'=>$rooms,'checkOut'=>$checkOut,'checkIn'=>$checkOut]);
       }
    
       function findRoomHandle(Request $request){
    
        
        $request->validate([
            'check_in'=>'required',
            'check_out'=>'required',
    
        ]);
    
        $time_from= $request->input('check_in');
        $time_to= $request->input('check_out');
    
        $request->session()->put('check_in', $time_from);
        $request->session()->put('check_out',  $time_to);
        
       // $rooms = Room::whereNotIn('id', function($query) use ($time_from, $time_to) {
          //  $query->from('bookings')
          //   ->select('room_id')
          //   ->where('check_in', '<=', $time_to)
           //  ->where('check_out', '>=', $time_from);
        // })->get();
    
        if ($request->isMethod('POST')) {
          $rooms = Room::with('bookings')->whereHas('bookings', function ($q) use ($time_from, $time_to) {
              $q->where(function ($q2) use ($time_from, $time_to) {
                  $q2->where('check_in', '>=', $time_to)
                     ->orWhere('check_out', '<=', $time_from);
              });
          })->orWhereDoesntHave('bookings')->get();
      } else {
          $rooms = null;
      }
        
     
    
      
      
        
     $request->session()->put('availableRooms', $rooms);
     return redirect()->back();        
    
       
       }
}
