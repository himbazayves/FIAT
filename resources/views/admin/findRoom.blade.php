@extends('layouts.master')

@section('content')
  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('partials.sidebar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        
           <div class="row">
             <div class="col-lg-12">
               <div class="card">
                 <div class="card-body">
                  @if(\Cart::isEmpty())


                    <a href="#" class="btn btn-primary disabled">Checkout Now</a>


                    @else
                 <a href="{{route('admin.checkout.index')}}" class="btn btn-primary">Checkout Now</a>
                    @endif
                  
                 </div>
               </div>
             </div>
           </div>
         
      

          <!-- Page Heading -->
         <div class="card">
            @if(session()->has('errors'))

            <div class="alert border-left-danger bg-light">
            
              
                
                <ul>

                    @foreach($errors->all() as $e)
                <li>{{$e}}</li>
                    @endforeach
                </ul>

             
          
                
               
              
            </div>
           
          @endif

            <div class="card-body">

            <form method="post" action="{{route('admin.findRoomHandle')}}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Checkin</label>
                        <input type="datetime-local" class="form-control @error('check_in') is-invalid @enderror" value="{{$checkIn}}" name="check_in" placeholder="Check in">
                          @error('check_in')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">Checkout</label>
                          <input type="datetime-local" class="form-control  @error('check_out') is-invalid @enderror" name="check_out" value="{{$checkOut}}" placeholder="Checkout">
                          @error('check_out')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                       
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary">Find room</button>
                  </form>
            </div>
         </div>


         @if(isset($rooms))

            <div class="row">

              <div class="col-12">
                <div class="card">
                  <div class="card-body">

                    <div style="margin-top:30px;margin-bottom:30px" class="row">
                      @foreach($rooms ?? '' as $room)
                      <div class="col-lg-6">
                        <div class="card" style="width:100%; height:100%">
                          <img class="card-img-top"  src="{{ Voyager::image($room->photo) }}" alt="Card image cap">
                          <div class="card-body">
                          <h5 class="card-title">{{$room->price}}</h5>
                            <p class="card-text">{{$room->name}}</p>
                          <a href="{{route('admin.cart.add', $room->id)}}" class="btn btn-primary">Book Now</a>
                          </div>
                        </div>
          
          
                      </div>
                      @endforeach
                    </div>




                  </div>
                </div>
              </div>
            </div>



            @endif
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->




     

  @endsection  