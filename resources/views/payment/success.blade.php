@extends('layouts/home')

@section('content-section')


<div style="background-color: #fff; min-height:100vh;" class="d-flex justify-content-center align-items-center">
    <div class="container py-5">
      <div class="row d-flex justify-content-center">
        <div class="col-md-9 col-lg-7 col-xl-5">
          <div class="card">
           
            <div class="rounded-bottom py-5" style="background-color: #eee;">
              <div class="card-body text-center">
                <i class="fa fa-check-circle display-1 text-success mb-4"></i>

                <h1 class="mb-4">Your payment has been processed.</h1>

                <button class="btn px-5 mb-3 p-3 w-50 text-white" style="background: #37517e;"><a href="{{route('user.home')}}" class="text-white"> Go Back</a></button>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  


@endsection

