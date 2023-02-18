@extends('layout/template-layout')

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
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Profile</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <div class="text-end upgrade-btn">
                    <a href="https://www.wrappixel.com/templates/materialpro/" class="btn btn-danger d-none d-md-inline-block text-white" target="_blank">Upgrade to
                        Pro</a>
                </div>
            </div>
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
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">


                    <div class="card-body profile-card">
                        <center class="mt-4"> <img src="../assets/images/users/5.jpg" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-2">Hanna Gover</h4>
                            <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                            <div class="row text-center justify-content-center">
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="link">
                                        <i class="icon-people" aria-hidden="true"></i>
                                        <span class="value-digit">254</span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="link">
                                        <i class="icon-picture" aria-hidden="true"></i>
                                        <span class="value-digit">54</span>
                                    </a>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->

            <div class="col-lg-8 col-xlg-9 col-md-7">
                @if(isset($response))
            <form action="{{route('update-profile')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}


                    <input type="hidden" name="id" value="{{( isset($response['id']) && $response['id']!='') ? $response['id']  : ''}}">

                    <div class="card">

                        <div class="card-body">
                            @if(Session::get('success'))
                            <div class="alert alert-success">
                                {{session::get('success')}}
                            </div>
                            @endif
                            <form class="form-horizontal form-material mx-2">

                                <div class="form-group">

                                    <label class="col-md-12 mb-0">Name</label>

                                    <div class="col-md-12">


                                        <input type="text"  class="form-control ps-0 form-control-line" name="name" id="name" value="{{( isset($response['name']) && $response['name']!='') ? $response['name'] : ''}}">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 mb-0">DOB</label>
                                    <div class="col-md-12">

                                        <input type="date"  class="form-control ps-0 form-control-line" name="dob" id="last
                                            name" value="{{( isset($response['dob']) && $response['dob']!='') ?   $response['dob'] : ''}}">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">

                                        <input type="email" placeholder="johnathan@admin.com" class="form-control ps-0 form-control-line" name="email" id="email" value="{{( isset($response['email']) && $response['email']!='') ? $response['email'] : ''}}">

                                    </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Mobile</label>
                                        <div class="col-md-12">

                                            <input type="text" placeholder="123 456 7890" class="form-control ps-0 form-control-line" name="contact" id="contact" value="{{( isset($response['contact']) && $response['contact']!='') ? $response['contact']  : ''}}">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <label class="col-md-12 mb-0">Address</label>
                                            <div class="col-md-12">
    
                                                <input type="text" placeholder="123 456 7890" class="form-control ps-0 form-control-line" name="address" id="address" value="{{( isset($response['address']) && $response['address']!='') ? $response['address']  : ''}}">
    
                                            </div>
                                        </div>
    
                                     
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">Password</label>
                                            <div class="col-md-12">

                                                <input type="password" class="form-control ps-0 form-control-line" name="password" id="password" value="{{( isset($response['password']) && $response['password']!='') ?  $response['password'] : ''}}" required>


                                            </div>
                                        </div>
                                     

                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">Image</label>
                                            <div class="col-md-12">

                                                <input type="file" value="image" placeholder="Choose image" class="form-control ps-0 form-control-line" name="image" id="image" <?php echo (isset($response['image']) & $response['image'] != "") ? '' : 'required' ?> accept=".jpg, .png, .jpeg"><br>
                                              
                                                @if(isset($response['image'])&& $response['image']!="")
                                                <div class="form-group input-group">
                                                    <img src="{{url('uploadimage/' . $response['image'])}}" width="100" height="100">

                                                    
                                                </div>
                                                @endif
                                                @error('image')
                                                <div class="alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-12 d-flex">
                                                <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Submit</button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12 d-flex">
                                                <a href="{{route('table-basic')}}"><button type="button" class="btn-info">Back</button></a>
                                            </div>
                                        </div>
                            </form>

                        </div>
                    </div>


                </form>
                @endif
            </div>
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