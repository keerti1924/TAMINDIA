<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TAMINDIA-SIGNUP</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" />
  </head>
  <body >
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth" style="background: #37517e">
          <div class="row flex-grow" >
            <div class="col-lg-5 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <h2 class="text-primary"> <img src="{{asset ('images/logo.png')}}" alt="" style="width:50px;"> TAMINDIA</h2>
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>

                <form class="pt-3" action="{{ route('registered') }}" method="POST" >
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
                    <input type="text" name="referral_code"  class="form-control form-control-lg" id="referral_code" placeholder="Refferal Code(Optional)">
                  </div>
                  @error('referral_code')
                <span style="color:red">{{ $message }}</span>
                @enderror
                  
                          <div class="form-group mb-3">
                            <input type="text" name="name" placeholder="Name" class="form-control form-control-lg">
                          </div>
                        
                        @error('name')
                        <span style="color:red">{{ $message }}</span>
                        @enderror

                        
                          <div class="form-group mb-3">
                            <input type="text" name="phone" placeholder="Mobile Number" class="form-control form-control-lg">
                          </div>
                        @error('phone')
                        <span style="color:red">{{ $message }}</span>
                        @enderror
                  
    
                        
                          <div class="form-group mb-3">
                            <input type="date" name="birth_date" placeholder="Date Of Birth" class="form-control form-control-lg">
                          </div>
                        @error('birth_date')
                        <span style="color:red">{{ $message }}</span>
                        @enderror
                        
                          <div class="form-group mb-3">
                            <input type="text" name="gender" placeholder="Gender" class="form-control form-control-lg">
                          </div>
                        @error('gender')
                        <span style="color:red">{{ $message }}</span>
                        @enderror
    
                    <div class="form-group mb-3">
                    <input type="text" name="pancard" placeholder="Pancard Number" class="form-control form-control-lg">
                    </div>
                  @error('pancard')
                  <span style="color:red">{{ $message }}</span>
                  @enderror
    
                        
                          <div class="form-group mb-3">
                            <input type="text" name="state" placeholder="State" class="form-control form-control-lg">
                          </div>
                        @error('state')
                        <span style="color:red">{{ $message }}</span>
                        @enderror
                        
                          <div class="form-group mb-3">
                            <input type="text" name="city" placeholder="City" class="form-control form-control-lg">
                          </div>
                        @error('city')
                        <span style="color:red">{{ $message }}</span>
                        @enderror
    
                        
                          <div class="form-group mb-3">
                            <input type="text" name="bank_name" placeholder="Bank Name" class="form-control form-control-lg">
                          </div>
                        @error('bank_name')
                        <span style="color:red">{{ $message }}</span>
                        @enderror

                        
                          <div class="form-group mb-3">
                            <input type="number" name="account_no" placeholder="Bank Account Number" class="form-control form-control-lg">
                        </div>
                        @error('account_no')
                        <span style="color:red">{{ $message }}</span>
                        @enderror
    
    
                      
                          <div class="form-group mb-3">
                            <input type="text" name="ifsc_code" placeholder="IFSC Code" class="form-control form-control-lg">
                          </div>
                        
                        @error('ifsc_code')
                        <span style="color:red">{{ $message }}</span>
                        @enderror
                        
                          <div class="form-group mb-3">
                            <input type="number" name="pincode" placeholder="pincode" class="form-control form-control-lg">
                          </div>
                        
                        @error('pincode')
                        <span style="color:red">{{ $message }}</span>
                        @enderror
                    
                    
                  
    
              
                    <div class="form-group mb-3">
                    <input type="text" name="address" placeholder="Address" class="form-control form-control-lg">
                  
                  </div>
                  @error('address')
                  <span style="color:red">{{ $message }}</span>
                  @enderror
                  
                  
                    <div class="form-group mb-3">
                    <input type="email" name="email" placeholder="Email Address" class="form-control form-control-lg">
                    </div>
                  
                  @error('email')
                  <span style="color:red">{{ $message }}</span>
                  @enderror
    
                
                    <div class="form-group mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control form-control-lg">
                  </div>
                
                  @error('password')
                  <span style="color:red">{{ $message }}</span>
                  @enderror
    
                  
                    <div class="form-group mb-3">
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control form-control-lg">
                    </div>
              
                  @error('password_confirmation')
                  <span style="color:red">{{ $message }}</span>
                  @enderror
    


                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn w-100" >SIGN UP</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{route('user.login')}}" class="text-primary">Login</a>
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



