@extends('layouts/dashboardlayout')

@section('content-section')

<style>
  p{
    color: #fff;
  }
</style>

 <!-- Header -->
 <div class="container-fluid pb-8 p-5 pt-5 pt-lg-8 d-flex align-items-center profile" style="min-height: 200px; background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-12 col-md-10">
          <h1 class="text-white">Hello ,<br>{{ Auth::user()->name }}</h1>
          <p class="text-white mt-0 mb-5">This is your profile page.</p>
        </div>
      </div>
    </div>
  
  <!-- Page content -->
  <div class="container-fluid py-5 d-none d-sm-none d-md-none d-lg-block">
    <div class="p-5 shadow border bg-light" >

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
      <div class="row">
        <div class="col-md-6 p-2 p-2">
          <p><b>Name : </b><span  class="text-secondary">{{$profile->name}}</span></p>
        </div>
        <div class="col-md-6 p-2">
          <p><b>Email : </b><span  class="text-secondary">{{$profile->email}}</span></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 p-2">
          <p><b>Phone : </b><span  class="text-secondary">{{$profile->phone}}</span></p>
        </div>
        <div class="col-md-6 p-2">
          <p><b>Gender : </b><span  class="text-secondary">{{$profile->gender}}</span></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 p-2">
          <p><b>DOB : </b><span  class="text-secondary">{{$profile->birth_date}}</span></p>
        </div>
        <div class="col-md-6 p-2">
          <p><b>Pancard No. : </b><span  class="text-secondary">{{$profile->pancard}}</span></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 p-2">
          <p><b>State : </b><span  class="text-secondary">{{$profile->state}}</span></p>
        </div>
        <div class="col-md-6 p-2">
          <p><b>City : </b><span  class="text-secondary">{{$profile->city}}</span></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 p-2">
          <p><b>Bank Name : </b><span  class="text-secondary">{{$profile->bank_name}}</span></p>
        </div>
        <div class="col-md-6 p-2">
          <p><b>Account No. : </b><span  class="text-secondary">{{$profile->account_no}}</span></p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 p-2">
          <p><b>IFSC Code : </b><span  class="text-secondary">{{$profile->ifsc_code}}</span></p>
        </div>
        <div class="col-md-6 p-2">
          <p><b>Pincode : </b><span  class="text-secondary">{{$profile->pincode}}</span></p>
        </div>
      </div>
      <div class="row">
        <div class="col-12 p-2">
          <p><b>Address : </b><span  class="text-secondary">{{$profile->address}}</span></p>
        </div>
      </div>

      <div class="row" style="text-align: end">
        <div class="col-12">
          <button class="btn btn-primary w-20 p-2"><a href="{{route('profile_update')}}" class="text-light">Update Profile</a></button>
        </div>
      </div>

    </div>
</div>

</div>

<div class="container-fluid py-2 d-sm-block d-md-block d-lg-none" >
  <div class="p-5 shadow bg-light" >

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
    <div class="row">
      <div class="col-md-6 p-2 p-2">
        <p><b>Name : </b><span  class="text-secondary">{{$profile->name}}</span></p>
      </div>
      <div class="col-md-6 p-2">
        <p><b>Email : </b><span  class="text-secondary">{{$profile->email}}</span></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 p-2">
        <p><b>Phone : </b><span  class="text-secondary">{{$profile->phone}}</span></p>
      </div>
      <div class="col-md-6 p-2">
        <p><b>Gender : </b><span  class="text-secondary">{{$profile->gender}}</span></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 p-2">
        <p><b>DOB : </b><span  class="text-secondary">{{$profile->birth_date}}</span></p>
      </div>
      <div class="col-md-6 p-2">
        <p><b>Pancard No. : </b><span  class="text-secondary">{{$profile->pancard}}</span></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 p-2">
        <p><b>State : </b><span  class="text-secondary">{{$profile->state}}</span></p>
      </div>
      <div class="col-md-6 p-2">
        <p><b>City : </b><span  class="text-secondary">{{$profile->city}}</span></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 p-2">
        <p><b>Bank Name : </b><span  class="text-secondary">{{$profile->bank_name}}</span></p>
      </div>
      <div class="col-md-6 p-2">
        <p><b>Account No. : </b><span  class="text-secondary">{{$profile->account_no}}</span></p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 p-2">
        <p><b>IFSC Code : </b><span  class="text-secondary">{{$profile->ifsc_code}}</span></p>
      </div>
      <div class="col-md-6 p-2">
        <p><b>Pincode : </b><span  class="text-secondary">{{$profile->pincode}}</span></p>
      </div>
    </div>
    <div class="row">
      <div class="col-12 p-2">
        <p><b>Address : </b><span  class="text-secondary">{{$profile->address}}</span></p>
      </div>
    </div>

    <div class="row" style="text-align: end">
      <div class="col-12">
        <button class="btn btn-primary w-20 p-2"><a href="{{route('profile_update')}}" class="text-light">Update Profile</a></button>
      </div>
    </div>

  </div>
</div>

@endsection