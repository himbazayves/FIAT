
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
      
                      <div class="table-responsive">
      
                      <table class="table table-bordered">
                          <thead >
                            <tr class="text-center">
                              <th>#</th>
                              <th>Room number</th>
                              <th>Room name</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Action</th>
                            
                            </tr>
                          </thead>
                          <tbody>
      
                            <form action="" method="post">
                                @csrf
                            
                         <?php $count=1 ;?>
      
                                @foreach($items as $i)
      
                            <tr class="text-center">
                                
                            <td>{{$count++}}</td>
                          
                                  
                                <td>{{$i->associatedModel->number}}</td>
                       
      
                              <td class="product-name">
                              {{$i->name}}
                                
                              </td>
                              <input type="hidden" name="id[]" value="{{$i->id}}">
                              <td class="price">${{$i->price}}</td>
                              
                              
                                 <td>{{$i->quantity}}</td>
                            <td><a class="btn btn-danger" href="{{route('admin.cart.remove',$i->id)}}">Remove</a></td>
       
       
                              
                           
                            </tr><!-- END TR-->
                          
                            @endforeach
      
                            <tr>
                              
                              <td colspan="5">General Total</td>
                              <td>{{\Cart::getTotal()}}</td>
                            </tr>
                      
                          </tbody>
                        </table>
                  </div>
                 </div>
      
              </div>
          </div>
            </div>
       

       
           <div style="margin-top:40px" class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                 
                <form>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                      </div>
                    </div>

                </form>  
                
                

            </div>
        </div>
    </div>


        </div>
    </div>
       

      </div>
      

  @endsection  