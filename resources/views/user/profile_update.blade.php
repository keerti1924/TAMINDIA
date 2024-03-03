@extends('layouts/dashboardlayout')

@section('content-section')



  
  <!-- Page content -->

  <div class="container-fluid py-5 mt-4 bg-primary ">
    <h1 class="text-center text-white">Profile Update</h1>
    <div class="p-3 shadow border" style="background: #fff">
    <form action="{{ route('profile.update',auth()->id()) }}" method="POST">
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
        <div class="row">
            <div class="col-md-6 p-2 p-2">
              <label for="name">Name</label>
              <input type="text" value="{{$profile->name}}" name="name" class="form-control border" placeholder="" placeholder="Name">
            </div>
            <div class="col-md-6 p-2">
              <label for="Email">Email</label>
                <input type="email" value="{{$profile->email}}" name="email" class="form-control border" placeholder="Email Address">
            </div>
          </div>
        
      <div class="row">
        <div class="col-md-6 p-2">
            <label for="Phone">Phone Number</label>
            <input type="tel" value="{{$profile->phone}}" name="phone" class="form-control border" placeholder="Phone Number">
        </div>
        <div class="col-md-6 p-2">
          <label for="Gender">Gender</label>
            <input type="text" value="{{$profile->gender}}" name="gender" class="form-control border" placeholder="Gender">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 p-2">
          <label for="dob">Date Of Birth</label>
            <input type="date" value="{{$profile->birth_date}}" name="birth_date" class="form-control border" placeholder="Date of Birth">
        </div>
        <div class="col-md-6 p-2">
          <label for="Pancard">Pancard</label>
            <input type="text" value="{{$profile->pancard}}" name="pancard" class="form-control border" placeholder="Pancard Number">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 p-2">
          <label for="State">State</label>
            <input type="text" value="{{$profile->state}}" name="state" class="form-control border" placeholder="State">
        </div>
        <div class="col-md-6 p-2">
          <label for="City">City</label>
            <input type="text" value="{{$profile->city}}" name="city" class="form-control border" placeholder="City">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 p-2">
          <label for="Bank Name">Bank Name</label>
            <input type="text" value="{{$profile->bank_name}}" name="bank_name" class="form-control border" placeholder="Bank Name">
        </div>
        <div class="col-md-6 p-2">
          <label for="Account Number">Account Number</label>
            <input type="number" value="{{$profile->account_no}}" name="account_no" class="form-control border" placeholder="Account Number">
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 p-2">
          <label for="ifsc_code">IFSC Code</label>
            <input type="text" value="{{$profile->ifsc_code}}" name="ifsc_code" class="form-control border" placeholder="IFSC Code">
        </div>
        <div class="col-md-6 p-2">
          <label for="Pincode">Pincode</label>
            <input type="number" value="{{$profile->pincode}}" name="pincode" class="form-control border" placeholder="Pincode">
        </div>
      </div>
      <div class="row">
        <div class="col-12 p-2 p-2">
          <label for="Password">Password</label>
          <input type="password" value="{{$profile->password}}" name="password" class="form-control border" placeholder="Password">
        </div>
      </div>
      <div class="row">
        <div class="col-12 p-2">
          <label for="Address">Address</label>
            <input type="text" value="{{$profile->address}}" name="address" class="form-control border" placeholder="Address">
        </div>
      </div>

      <div class="row mt-2" style="text-align: end">
        <div class="col-12">
          <input type="submit" class="btn btn-primary btn-md px-5" value="Save">
        </div>
      </div>

    </form>

    </div>
</div>


@endsection