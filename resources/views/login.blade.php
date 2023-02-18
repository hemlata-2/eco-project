@extends('layout/login-layout')

@section('content')



<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
       
        <div class="row align-items-center">
     
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">


<form action="{{route('login')}}" method="post" enctype="multipart/form-data">

                {!! csrf_field() !!}
                <center>
                <div class="col-lg-8 col-xlg-12 col-md-12">
                    <div class="card">
                      
                            <div class="card-body">
                                @if(Session::has('success'))
                                <div class="alert alert-success" style="color:green">
                                  {{ Session::get('success') }}
                                  @php 
                                  Session::forget('success');
                                  @endphp
                          
                                </div>
                                @endif


                                @if(Session::has('danger'))
                                <div class="alert alert-danger" style="color:red">
                                    {{ Session::get('danger') }}
                                    @php
                                        Session::forget('danger');
                                    @endphp
                                </div>
                                 @endif
                            
 
                                <center> <h1>Login User</h1></center>

                                
                                    

                                    <p>Please fill in this form to login an account.</p>





                                <form class="form-horizontal form-material mx-2">
                                    
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0"> Email</label>
                                    {{-- <label for="email" class="center-align">{{ __('Username') }}</label> --}}

                                        <div class="col-md-12">
                                            <input type="email"  class="form-control ps-0 form-control-line @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                                            @error('email')
                                            <div class="alert-danger" style="color:red">{{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-12 mb-0"> Password</label>
                                        <div class="col-md-12">
                                            <input type="password"  class="form-control ps-0 form-control-line @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}"  autocomplete="password" autofocus>
                                            @error('password')
                                            <div class="alert-danger" style="color:red">{{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>



                                </div>
                                <div class="card-footer d-inline-block">
                                <button type="submit" class="btn btn-success"> Login </button>
                                {{-- <p class="float-right mt-2"> Don't have an account? <a href="{{ url('registration')}}" class="text-success"> Register </a> </p> --}}
                                </div>

                    </form>
                    </center>
                    </div>
                    </div>
                    </div>
                    </form>
<!-- Column -->
</div>
<!-- Row -->
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->
<!-- ============================================================== -->
<!-- End Right sidebar -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->

@endsection
