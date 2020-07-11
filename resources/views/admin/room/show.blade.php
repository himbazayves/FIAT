
@extends('layouts.master')

@section('content')
  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('partials.sidebar')
      
        <div class="container-fluid">

       <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <h5>Name</h5> 

                <div class="alert"> <center> {{$room->name}}</center></div>
                </div>
            </div>
        </div>
       </div>



       <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <h5>Number</h5> 

                <div class="alert"> <center> {{$room->number}}</center></div>
                </div>
            </div>
        </div>
       </div>



       <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <h5>Description</h5> 

                <div class="alert"> <center> {{$room->description}}</center></div>
                </div>
            </div>
        </div>
       </div>




       
       <div class="row">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <h5>Photo</h5> 

                <div class="alert"> <center><img src="{{ Voyager::image($room->photo) }}" alt=""></center></div>
                </div>
            </div>
        </div>
       </div>





        </div>
       

      </div>
     
  @endsection  