
@extends('layouts/home')

@section('content-section')

  <!-- ======= Header ======= -->

  

  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center ">

      <h1 class="logo me-auto"><a href="{{route('user.home')}}">TAMINDIA</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('user.home')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('user.contact')}}">Contact</a></li>

          @if(Auth::check())

          <li><a class="getstarted scrollto" href="{{route('dashboard')}}">Dashboard</a></li>

          @else 

          <li><a class="nav-link scrollto" href="{{route('user.login')}}">Login</a></li>

          <li><a class="getstarted scrollto" href="{{route('user.register')}}">Join Us</a></li>

          @endif 


        </ul>
        <i class="fas fa-bars mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <section class="banner-section d-flex justify-content-center align-items-end">
    <div class="section-overlay"></div>

    <div class="container">
        <div class="row">

            <div class="col-lg-7 col-12">
                <h1 class="text-white mb-lg-0">Contact</h1>
            </div>

            <div class="col-lg-4 col-12 d-flex justify-content-lg-end align-items-center ms-auto">
                <nav aria-label="breadcrumb">
                    <ol class="justify-content-center breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.home')}}">Home</a></li>

                        <li class="breadcrumb-item active text-white" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
</section>

  <main id="main">

    <section class="contact-section py-5">
        <div class="container d-flex justify-content-center align-items-center p-5">
            <div class="row">

                <div class="col-12 me-auto mb-lg-0 mb-5"> 
                    <div class="contact-info bg-white shadow-lg p-5">
                        <h3 class="mb-4">Contact Information</h3>

                        <h5 class="d-flex mt-3 mb-3">
                            <i class="bi-geo-alt-fill custom-icon me-3"></i>
                            105/108, 1st Floor, Lamp Tower 5, Golf Course Road, Sector-69, Bengaluru-560001, Karnataka, India
                        </h5>

                        <h5 class="d-flex mb-3">
                            <i class="bi-telephone-fill custom-icon me-3"></i>

                            <a href="#">
                                +91 99920 98854
                            </a>
                        </h5>

                        <h5 class="d-flex">
                            <i class="bi-envelope-fill custom-icon me-3"></i>

                            <a href="mailto:tamindia@gmail.com">
                                tamindia@gmail.com
                            </a>
                        </h5>
                    </div>
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