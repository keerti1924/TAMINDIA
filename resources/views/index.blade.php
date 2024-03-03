
@extends('layouts/home')

@section('content-section')

  <!-- ======= Header ======= -->

  

  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{route('user.home')}}"><img src="{{asset ('images/logo.png')}}" alt="">TAMINDIA</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('user.home')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('user.contact')}}">Contact</a></li>

          @if(Auth::check())
            @if (Auth::user()->user_type == 1)

            <li><a class="getstarted scrollto" href="{{route('admin')}}">Dashboard</a></li>

            @else 
            <li><a class="getstarted scrollto" href="{{route('dashboard')}}">Dashboard</a></li>
            @endif
          @else

          <li><a class="nav-link scrollto" href="{{route('user.login')}}">Login</a></li>

          <li><a class="getstarted scrollto" href="{{route('user.register')}}">Join Us</a></li>

          @endif 


        </ul>
        <i class="fas fa-bars mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">

    <div class="container d-flex align-items-center justify-content-center">
      <div class="row text-center">
        <div class="col-12 pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Coming Soon</h1>
          <h2>Stay Tuned</h2>
          <div class="d-flex justify-content-center">
            @if($capturedPaymentFound)
                <button onclick="myFunction()" class="btn-get-started scrollto">Join Us</button>
                <script>
                  function myFunction() {
                    alert("Payment has been captured, no need to pay again.");
                  }
                </script>
            @else
                <a href="{{ route('payment') }}" class="btn-get-started scrollto">Join Us</a>
            @endif
                        
          </div>
        </div>

      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <section class="my-5 py-5">
      <div class="container text-center" >
          <div class="row justify-content-center align-items-center py-4" >

              <div class="col-lg-12 col-12 ">
                  <h2 class=" bg-white fw-normal"><u>Customer Support</u></h2>
                  <h3 class="my-4 text-primary">+91 99920 98854</h3>
                  <h6 style="color: #555;">Email : tamindia@gmail.com</h6>
                   <p>Mon - Sat 09:00 AM - 05:00 PM <br>
                  (Weekends & Holidays - Closed)</p>
                  
              </div>

          </div>
      </div>
  </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          
          <div class="col-lg-4 col-md-6 footer-links">
            <h3>TAMINDIA</h3>
            <ul>
              <li><i class="fas fa-chevron-right me-2"></i> <span>For Queries and Grievance, please contact Mr. Kapil</span></li>
              <li><i class="fas fa-chevron-right me-2"></i> <span> Nodal Officer Name - Mr. Kapil</span></li>
              <li><i class="fas fa-chevron-right me-2"></i> <span>Tam Enterprises India Pvt.Ltd.</span></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Address</h4>
            <p>
              105/108, 1st Floor, Lamp Tower 5, Golf Course Road, Sector-69, Bengaluru-560001, Karnataka, India <br><br>
              <strong>Phone:</strong> +91 99920 98854<br>
              <strong>Email:</strong>  tamindia@gmail.com<br>
            </p>
          </div>


          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Service Hours</h4>
            <p><strong>Mon - Sat</strong></p>
            <p>9:00 AM - 5:00 PM</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
              <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        Copyright © 2025 <strong><span>TAMINDIA</span></strong> CO., LTD. All Rights Reserved
      </div>

    </div>
</footer><!-- End Footer -->

@endsection