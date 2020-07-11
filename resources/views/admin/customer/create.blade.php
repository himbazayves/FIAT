
@extends('layouts.master')

@section('content')
  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('partials.sidebar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Customer create</h1>

          <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <form>
                            <div class="form-group">
                              <label >First name</label>
                              <input type="text" class="form-control  @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus >
                              @error('first_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                           
                            </div>


                            <div class="form-group">
                                <label >Last name</label>
                                <input type="text" class="form-control  @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus >
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                           
                            </div>


                            <div class="form-group">
                                <label >Phone number</label>
                                <input type="text" class="form-control  @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus >
                             
                                @error('phone_number')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                            </div>


                            <div class="form-group">
                                <label >Identinty</label>
                                <input type="text" class="form-control  @error('identity') is-invalid @enderror" name="identity" value="{{ old('identity') }}" required autocomplete="identity" autofocus >
                             
                                @error('identity')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                            </div>



                            <div class="form-group">
                                <label >Birth place</label>
                                <input type="text" class="form-control  @error('birth_place') is-invalid @enderror" name="birth_place" value="{{ old('birth_place') }}" required autocomplete="birth_place" autofocus >
                             
                                @error('birth_place')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                            </div>
                            

                        <button class="btn btn-primary">Save</button>
                          </form>
                    </div>
                </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

  @endsection  