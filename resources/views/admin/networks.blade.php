@extends('layouts/adminlayout')

@section('content-section')


<div class="main-panel">
    
    <div class="content-wrapper">
        
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-account-multiple-plus "></i>
          </span> Networks
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
              <h4 class="card-title">Referral Details</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th> Sr. No. </th>
                      <th> UserID </th>
                      <th> ParentUserID </th>
                      <th>Referral Code</th>
                      <th> Last Update</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                      @php $x = 1; @endphp
                    @foreach($networks as $net)
                    <tr>
                      <td>
                        {{$x++}}
                      </td>
                      <td>{{$net->name}}({{$net->user_id}}) </td>
                      <td>{{$user->name}}({{$net->parent_user_id}})</td>
                      <td>{{$net->referral_code}}</td>
                      <td>{{$net->created_at}}</td>
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