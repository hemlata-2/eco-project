@extends('layout/template-layout')

@section('content')

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Material Pro Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

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
                        <h3 class="page-title mb-0 p-0">Student Table</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a>Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Student Table</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- <div class="col-md-6 col-4 align-self-center">
                        <div class="text-end upgrade-btn">
                            <a href="https://www.wrappixel.com/templates/materialpro/"
                                class="btn btn-danger d-none d-md-inline-block text-white" target="_blank">Upgrade to
                                Pro</a>
                        </div>
                    </div> -->
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
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                @if(Session::has('danger'))
                                <div class="alert alert-danger">
                                    {{ Session::get('danger') }}
                                    @php
                                    Session::forget('danger');
                                    @endphp
                                </div>
                                @endif

                                @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                    Session::forget('success');
                                    @endphp
                                </div>
                                @endif

                                <div class="mx-auto pull-right">
                                    <div class="">
                                        <form action="{{ route('search_student') }}" method="POST" role="search">
                                            @csrf
                                            <div class="input-group">
                                                <span class="input-group-btn mr-5 mt-1">
                                                    <button class="btn btn-info" type="submit" title="Search">
                                                        <span class="fas fa-search"></span>Search
                                                    </button>
                                                </span>
                                                <input type="Search" class="form-control mr-2" name="Search" placeholder="Search projects" id="Search">
                                                <!-- <a href="{{ route('table-basic') }}" class=" mt-1">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-danger" type="button" title="Refresh page">Search
                                                        <span class="fas fa-sync-alt"></span>
                                                    </button>
                                                </span>
                                            </a> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <h4 class="card-title">Student Table</h4>
                                <h6 class="card-subtitle">Add class <code>.table</code></h6>
                                <div class="table-responsive">
                                    <table class="table user-table">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">S.NO></th>
                                                {{-- <th class="border-top-0">ID></th> --}}

                                                <th class="border-top-0"> Name</th>
                                                <th class="border-top-0">Address</th>
                                                <th class="border-top-0">Email</th>
                                                <th class="border-top-0">Mobile</th>
                                                <th class="border-top-0">DOB</th>
                                                <th class="border-top-0">Image</th>

                                                <th class="border-top-0">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $k => $value)


                                            <tr>
                                                <td>{{$k+1}}</td>
                                                {{-- <td>{{$value->id}}</td> --}}

                                                <td>{{$value->name}}</td>
                                                <td>{{$value->address}}</td>
                                                <td>{{ucfirst($value->email) }}</td>
                                                <td>{{$value->contact}}</td>
                                                <td>{{$value->dob}}</td>



                                                @if(isset($value->image))
                                                <td>
                                                    <img src="{{ ('uploadimage/student' . $value->image) }}" width="100" height="100" />
                                                </td>
                                                @endif
                                                <!-- <td>{{$value->password}}</td> -->
                                                <td><a href="{{route('edit-student', $value->id)}}"><button type="button" class="btn-info">Edit</button></a></td>

                                                <td><a href="{{route('delete-student', $value->id)}}"><button type="button" Onclick="return ConfirmDelete();" class="btn btn-danger d-inline-block">Delete</button></a></td>

                                              


                                            </tr>

                                            @endforeach
                                            <!-- {{-- <tr>
                                                <td>2</td>
                                                <td>Deshmukh</td>
                                                <td>Gaylord</td>
                                                <td>@Ritesh</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Sanghani</td>
                                                <td>Gusikowski</td>
                                                <td>@Govinda</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Roshan</td>
                                                <td>Rogahn</td>
                                                <td>@Hritik</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Joshi</td>
                                                <td>Hickle</td>
                                                <td>@Maruti</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Nigam</td>
                                                <td>Eichmann</td>
                                                <td>@Sonu</td>
                                            </tr> --}} -->
                                        </tbody>
                                    </table>
                                </div>

                                <!-- //______________________use for pagination -->
                                <!-- <div  class="col-sm-12 pull-right">
                                    <?php //{{$data->links()}?>
                                </div>
                                <style>
                                    .w-5 {
                                        display: none
                                    }
                                </style> -->

                                <!-- //__________________________________________________ -->
                            </div>
                        </div>
                    </div>
                </div>
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

            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <script>
        function ConfirmDelete() {
            return confirm("Are you sure you want to delete?");
        }
    </script>

</body>
@endsection

</html>