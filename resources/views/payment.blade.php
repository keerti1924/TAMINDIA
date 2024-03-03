@extends('layouts/home')

@section('content-section')
<style>
    .razorpay-payment-button {
    background-color: #37517e; 
    color: white;
    padding: 10px 20px;    
    border: none; 
    width: 100%;
    border-radius: 5px; 
    cursor: pointer; 
    font-size: 16px; 
}
</style>

<div style="background-color: #37517e; min-height:100vh;" class="d-flex justify-content-center align-items-center">
    <div class="container py-5">
      <div class="row d-flex justify-content-center">
        <div class="col-md-9 col-lg-7 col-xl-5">
          <div class="card">
           
            <div class="card-body">
              <div class="card-title mb-0">
                <h2 class="text-muted mb-0 text-center" style="color: #37517e">Payment Page</h2>
              </div>
            </div>
            <div class="rounded-bottom" style="background-color: #eee;">
              <div class="card-body text-center">
                <h4 class="mb-4">Join Our Community</h4>
  
                <div class="row mb-3">
                  
                  <div class="col-13">
                    <div class="form-outline text-center">
                        <h5 class="text-muted">Total Amount to Pay</h5>
                        <span> ₹ 1000/-</span>                               
                    </div>
                  </div>
                </div>
  
                <form action="{{ route('razorpay') }}" method="POST" id="paymentForm">
                    @csrf
                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="rzp_test_vI7kANMNUUxKsB"
                    data-amount="100000"
                    data-button_text = "Pay Now"
                    data-button_theme = "brand-color"
                    data-image=""
                    {{-- data-prefill.name="TAMINDIA" --}}
                    {{-- data-prefill.contact="9005533066" --}}
                    ></script>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

</script>


@endsection