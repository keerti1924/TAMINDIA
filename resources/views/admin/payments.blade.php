@extends('layouts/adminlayout')

@section('content-section')


<div class="main-panel">
    
    <div class="content-wrapper">
        
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-credit-card "></i>
          </span> Payments
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
          </ul>
        </nav>
      </div>


      <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Users Details</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> Sr. No. </th>
                      <th> PaymentID </th>
                      <th> Amount </th>
                      <th> Currency </th>
                      <th>Name</th>
                      <th> Email</th>
                      <th> Payment Status</th>
                      <th> Payment Method</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php $x = 1; @endphp
                    @foreach($payments as $pay)
                    <tr>
                      <td>
                        {{$x++}}
                      </td>
                      <td>{{$pay->payment_id}} </td>
                      <td>₹ {{$pay->amount}}</td>
                      <td>
                        {{$pay->currency}}
                      </td>

                      <td> {{$pay->name}}</td>
                      <td>{{$pay->email}}</td>
                      <td>{{$pay->payment_status}}</td>
                      <td>{{$pay->payment_method}}</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


      
    </div>
</div>


@endsection