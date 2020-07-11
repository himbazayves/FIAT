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

class CartController extends Controller
{
    public function add($room)
   {
       $room = Room::find($room); 

     
      
       $rowId =$room->id;
     
     
       $price= $room->price;

       $items = \Cart::getContent();
 foreach($items as $i){

  if($i->id==$rowId){
    return redirect()->back()->with('warning','The room is already in the cart!');
  }


 }
      
      
       Cart::add(array(
        'id' => $rowId,
        'name' => $room->name,
        'price' => $room->price,
        'quantity' => 1,
      
        'attributes' => array(),
       'associatedModel' => $room
       ));




   return redirect()->back('success', 'Item added to cart successfully.');                 
   }
   

   public function remove($item)
   {
       Cart::remove($item);
   
       if (Cart::isEmpty()) {
           return redirect('admin/findRoom')->with('success', 'Item removed from cart successfully .');
      }
   
   
       return redirect()->back()->with('success', 'Item removed from cart successfully.');
   }
}
