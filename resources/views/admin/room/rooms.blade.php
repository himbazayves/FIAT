@extends('layouts.master')

@section('content')
  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('partials.sidebar')
  

      
        <div class="container-fluid">


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>Number</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Number</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Action</th>
                         
                        </tr>
                      </tfoot>
                      <tbody>


                        @foreach($rooms as $room)
                        <tr>
                            <td>{{$room->number}}</td>
                            <td>{{$room->name}}</td>
                            <td>{{$room->price}}</td>
                            <td>
                            <a href="{{route('admin.room.show',$room->id)}}" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                  <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">view</span>
                              </a>  
                            
                            </td>
                          </tr>
                         
    
                        @endforeach
                        
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>

        </div>
     

      </div>


  @endsection  