@extends('layouts.master')

@section('content')
  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('partials.sidebar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          @if(session()->has('cartMessage'))

          <div  class="alert alert-success border-left-success bg-light">
          

        
              
               	{{ session()->get('cartMessage') }}
            
          </div>
         
        @endif

          <div style="background: white" class="border-left-success alert"><center>Available Rooms</center></div>
         
            
      


          <div style="margin-top:30px;margin-bottom:30px" class="row">
            @foreach($rooms ?? '' as $room)
            <div class="col-lg-6">
              <div class="card" style="width:100%; height:100%">
                <img class="card-img-top"  src="{{ Voyager::image($room->photo) }}" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">{{$room->price}}</h5>
                  <p class="card-text">{{$room->name}}</p>
                <a href="{{route('admin.addToCart', $room->id)}}" class="btn btn-primary">Book Now</a>
                </div>
              </div>


            </div>
            @endforeach
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

  @endsection  