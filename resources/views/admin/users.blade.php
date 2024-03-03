@extends('layouts/adminlayout')

@section('content-section')


<div class="main-panel">
    
    <div class="content-wrapper">
        
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-account-multiple "></i>
          </span> Users
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
                      <th> Name </th>
                      <th> Email </th>
                      <th> Verify </th>
                      <th>Amount</th>
                      <th>Bank Name</th>
                      <th> Account No. </th>
                      <th>IFSC Code</th>
                      <th>User Type</th>
                      <th> Last Update</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                      @php $x = 1; @endphp
                    @foreach($users as $user)
                    <tr>
                      <td>
                        {{$x++}}
                      </td>
                      <td>{{$user->name}} </td>
                      <td>{{$user->email}}</td>
                      <td>
                        @if($user->is_verified == 0)
                            <label class="badge badge-gradient-danger">Unverified</label>
                        @else
                            <label class="badge badge-gradient-success">Verified</label>
                        @endif
                      </td>

                      <td>₹ {{$user->wallet}}</td>
                      <td>₹ {{$user->bank_name}}</td>
                      <td>{{$user->account_no}}</td>
                      <td>{{$user->ifsc_code}}</td>
                      <td>
                        @if($user->user_type == 1)
                        <label class="badge badge-gradient-primary">Admin</label>
                        @else
                        <label class="badge badge-gradient-warning">User</label>
                        @endif
                      </td>
                      <td>{{$user->created_at}}</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <table class="table">
 
        
      </table>

      
    </div>
</div>


@endsection