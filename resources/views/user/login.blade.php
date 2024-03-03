<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TAMINDIA-SIGNIN</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="icon" href="{{asset ('images/logo.png')}}" />
  </head>
  <body >
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth" style="background: #37517e">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <h2 class="text-primary"> <img src="{{asset ('images/logo.png')}}" alt="" style="width:50px;"> TAMINDIA</h2>
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" action="{{ route('login') }}" method="POST">
                  @csrf

                  @if(Session::has('success'))
                <div class="alert alert-success text-center p-2" role="alert">
                    <p style="color:green">{{ Session::get('success') }}</p>
                </div>
                @endif 
                @if(Session::has('error'))
                <div class="alert alert-danger text-center p-2" role="alert">
                    <p style="color:red">{{ Session::get('error') }}</p>
                </div>
                @endif 

                  <div class="form-group mb-3">
                    <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Email Address">
                  </div>
                  @error('email')
                    <span style="color: red">{{ $message }}</span>
                @enderror

                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password">
                  </div>
                  @error('password')
                  <span style="color: red">{{ $message }}</span>
              @enderror

                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn w-100">SIGN IN</button>
                  </div>


                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{route('user.register')}}" class="text-primary">Create an Account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
 
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>

    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('js/misc.js')}}"></script>
    <!-- endinject -->
  </body>
</html>



