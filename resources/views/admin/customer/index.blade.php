@extends('layouts.master')

@section('content')
  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('partials.sidebar')
  

      
        <div class="container-fluid">


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Customers</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>First name</th>
                            <th>Last Name</th>
                            <th>Phone number</th>
                            <th>Identity</th>
                            <th>Birth Place </th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>First name</th>
                            <th>Last Name</th>
                            <th>Phone number</th>
                            <th>Identity</th>
                            <th>Birth Place </th>
                        </tr>
                      </tfoot>
                      <tbody>


                        @foreach($customers as $customer)
                        <tr>
                            <td>{{$customer->first_name}}</td>
                            <td>{{$customer->last_name}}</td>
                            <td>{{$customer->phone_number}}</td>
                            <td>{{$customer->identity}}</td>
                            <td>{{$customer->birth_place}}</td>
                            <td>
                            <a href="#" class="btn btn-warning btn-icon-split">
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