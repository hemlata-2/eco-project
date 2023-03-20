@extends('layout/template-layout')

@section('content')

{{--
<html>
   <head>
      
      <script language = "javascript" type = "text/javascript">
         function CheckData45() {
            with(document.filepost) {
               if(filea.value ! = "") {
                  document.getElementById('one').innerText = 
                     "Attaching File ... Please Wait";
               }
            }
         }
      </script>
      
   </head>
   <body>
      
      <table width = "100%" height = "100%" border = "0" 
         cellpadding = "0" cellspacing = "0">
         <tr>
            <td align = "center">
               <form name = "filepost" method = "post" 
                  action = "file.php" enctype = "multipart/form-data" id = "file">
                  
                  <table width = "300" border = "0" cellspacing = "0" 
                     cellpadding = "0">
							
                     <tr valign = "bottom">
                        <td height = "20">Your Name:</td>
                     </tr>
                     
                     <tr>
                        <td><input name = "from" type = "text" 
                           id = "from" size = "30"></td>
                     </tr>
                     
                     <tr valign = "bottom">
                        <td height = "20">Your Email Address:</td>
                     </tr>
                     
                     <tr>
                        <td class = "frmtxt2"><input name = "emaila"
                           type = "text" id = "emaila" size = "30"></td>
                     </tr>
                     
                     <tr>
                        <td height = "20" valign = "bottom">Attach File:</td>
                     </tr>
                     
                     <tr valign = "bottom">
                        <td valign = "bottom"><input name = "filea" 
                           type = "file" id = "filea" size = "16"></td>
                     </tr>
                     
                     <tr>
                        <td height = "40" valign = "middle"><input 
                           name = "Reset2" type = "reset" id = "Reset2" value = "Reset">
                        <input name = "Submit2" type = "submit" 
                           value = "Submit" onClick = "return CheckData45()"></td>
                     </tr>
                  </table>
                  
               </form>
               
               <center>
                  <table width = "400">
                     
                     <tr>
                        <td id = "one">
                        </td>
                     </tr>
                     
                  </table>
               </center>
               
            </td>
         </tr>
      </table>
      
   </body>
</html>
--}}

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


<form action="{{route('registration-add')}}" method="post" enctype="multipart/form-data">

                {!! csrf_field() !!}
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

                            
 
   <center> <h1>Register</h1></center>

   
     

    <p>Please fill in this form to create an account.</p>
    {{-- <hr> --}}

    <form class="form-horizontal form-material mx-2">

            <div class="form-group">
                    <label class="col-sm-12">Select Role</label>
                    <div class="col-sm-12 border-bottom">
                        <select class="form-select shadow-none ps-0 border-0 form-control-line  select2" name="user_role" onclick="multipleFunc()">
                            @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                           
                        </select>
                    </div>
             </div><br>


        <div class="form-group">
            <label class="col-md-12 mb-0"> Name</label>
            <div class="col-md-12">
                <input type="text"  class="form-control ps-0 form-control-line" name="name" id="name">
                @error('name')
                <div class="alert-danger" style="color:red">{{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-12 mb-0"> Address</label>
            <div class="col-md-12">
                <input type="text"  class="form-control ps-0 form-control-line" name="address" id="address">
                @error('address')
                <div class="alert-danger" style="color:red">{{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-12 mb-0"> Email</label>
            <div class="col-md-12">
                <input type="text"  class="form-control ps-0 form-control-line" name="email" id="email">
                @error('email')
                <div class="alert-danger" style="color:red">{{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-12 mb-0"> Contact</label>
            <div class="col-md-12">
                <input type="number"  class="form-control ps-0 form-control-line" name="contact" id="contact" required>
                @error('contact')
                <div class="alert-danger" style="color:red">{{$message}}
                </div>
                @enderror
            </div>
        </div>
 


        <div class="form-group">
            <label class="col-md-12 mb-0"> Username</label>
            <div class="col-md-12">
                <input type="text"  class="form-control ps-0 form-control-line" name="username" id="username" required>
                @error('username')
                <div class="alert-danger" style="color:red">{{$message}}
                </div>
                @enderror
            </div>
        </div>
 
        <div class="form-group">
            <label class="col-md-12 mb-0"> Dob</label>
            <div class="col-md-12">
                <input type="date"  class="form-control ps-0 form-control-line" name="dob" id="dob" required>
                @error('dob')
                <div class="alert-danger" style="color:red">{{$message}}
                </div>
                @enderror
            </div>
        </div>

        <?php
        $hobbies_data_arr = [];
        if (isset($response->hobbies) && $response->hobbies != '') {
            $hobbies_data_arr = explode(',', $response->hobbies);
        }

    
        ?>

        <div class="form-group detail-box">
          
            <img src="images/icon-hobbies.png" alt=""> Hobbies <a href="javascript:void(0)" class="link me-2">
              <i class="fa fa-pencil font-10 me-2 "></i>
            </a>
          
          <div class="hobbies-btn">
            <input id="cities" class="form-control" name="hobbies[]" value="" data-role="tagsinput" type="text">
        
          </div>
        </div>


        <div class="form-group">
            <label class="col-md-12 mb-0"> Password</label>
            <div class="col-md-12">
                <input type="password"  class="form-control ps-0 form-control-line" name="password" id="password" required>
                @error('password')
                <div class="alert-danger" style="color:red">{{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-12 mb-0">Image</label>
            <div class="col-md-12">
                <input type="file" value="image" placeholder="Choose image" class="form-control ps-0 form-control-line" name="image" id="image" accept=".jpg, .png, .jpeg">
                @error('image')
                <div class="alert-danger">{{$message}}</div>
                @enderror
            </div>
        </div>

        @if(config('services.recaptcha.key'))
        <div class="g-recaptcha"
            data-sitekey="{{config('services.recaptcha.key')}}">
        </div>

        @endif


</div>


<div class="card-footer d-inline-block">
    <div class="form-group">
        <button type="submit" class="btn btn-success"  name="uploadfilesub" value="upload"> Register </button>
        <p class="col-md-12 col-9 align-self-right"> Already have an account? <a href="{{ url('login')}}" class="col-md-12 col-9 align-self-right"> Login </a> </p>
    </div>
</div>
</form>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    
   <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <!--sweet alert -->
  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
<!--sweet alert -->

    <script>
      $(function() {
        $('#cities').tagsinput({
          maxTags: 3
        });
      });
    </script>
    <script type="text/javascript"></script>
    <script>
      function addProduct() {
        // body...
        $('#firstproduct .productdiv').clone().find('input').val('').end().appendTo('#moreproduct');
        //   if($(".remove_btn").length == 1){
        //                 $(".remove_btn").eq(0).hide();
        //             }else{
        //                 $(".remove_btn").show();
        //             }
      }
    
      function removeProduct() {
        $('#moreproduct .productdiv').last().remove();
        //   if($(".remove_btn").length == 1){
        //                 $(".remove_btn").eq(0).hide();
        //             }else{
        //                 $(".remove_btn").show();
        //             }
      }
      $(document).ready(function() {
        // if($(".remove_btn").length == 1){
        //     $(".remove_btn").eq(0).hide();
        // }else{
        //     $(".remove_btn").show();
        // }
      })
    </script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
@if(Session::has('success'))
  <script type="text/javascript">

  function massge() {
  Swal.fire(
            'Good job!',
            'Successfully Saved!',
            'success'
        );
  }

  window.onload = massge;
 </script>
@endif

    <script>
      /*
      Swal.fire('successfully created',{
      title: 'Success!',
      text: 'successfully created',
      icon: 'Success',
      confirmButtonText: 'Cool'
    });

      if(session()->get('success')){
      Swal.fire({
      title: 'Success!',
      text: '{!! session()->get('success') !!}',
      icon: 'Success',
      confirmButtonText: 'Cool'
    });
      }else(session()->get('error')){
      Swal.fire({
      title: 'Error!',
      text: '{!! session()->get('error') !!}',
      icon: 'error',
      confirmButtonText: 'Cool'
    });
      }
*/

</script>

<script>
  var onloadCallback = function() {
  alert("grecaptcha is ready!");
};
</script>
