@extends('layouts/dashboardlayout')

@section('content-section')


<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-6 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0 shadow">
              <div class="card-body">
                <div class="row p-4">
                  <div class="col">
                    <h1 class="card-title text-uppercase text-muted mb-0">Your Referrals</h1>
                    <h3 class="h2 font-weight-bold mb-0">{{$networkCount}}</h3>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow px-3 py-2" style="font-size: 20px">
                      <i class="fas fa-chart-bar"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0 shadow">
              <div class="card-body">
                <div class="row p-4">
                  <div class="col">
                    <h1 class="card-title text-uppercase text-muted mb-0">Your Wallet</h1>
                    <h3 class="h2 font-weight-bold mb-0">₹ {{$user->wallet}}</h3>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-success text-white rounded-circle shadow px-3 py-2" style="font-size: 20px">
                      <i class="fas fa-wallet"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="container-fluid mt--7">
  <!-- Table -->
  <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Your Referrals</h3>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Verified</th>
              </tr>
            </thead>
            <tbody>
                @if (count($networkData) > 0)
                @php $x = 1; @endphp
                    @foreach ($networkData as $net)
              <tr>
                <th scope="row">
                    {{$x++}}
                </th>
                <td>
                    {{$net->user->name}}
                </td>
                <td>
                    {{$net->user->email}}
                </td>
                <td>
                  <i class="fas fa-arrow-up text-success mr-3"></i>
                     @if($net->user->is_verified == 0)
                        <b class="text-danger">UnVerified</b>
                    @else
                        <b class="text-success">Verified</b>
                    @endif
                        </td>
              </tr>
              @endforeach
            @else
                <tr>
                    <th colspan="4">No Referrals Found!</th>
                </tr>
            @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection