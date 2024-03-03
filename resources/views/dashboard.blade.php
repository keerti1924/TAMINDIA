 @extends('layouts/dashboardlayout')

@section('content-section')


<style>
    div#social-links ul li{
        display: inline-block;
    }
    div#social-links ul li a{
        padding: 10px;
        padding-left: 15px;
        padding-right: 15px;
        margin: 5px;
        font-size: 20px;
        color: #0c48af;
        background-color: #fff;
        border-radius: 50%;
    }
    div#social-links ul li a:hover{
        background: #0c48af;
        border: 1px solid #fff;
        color: #fff;
    }


</style>

 <!-- Header -->
 <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">
      </div>
    </div>
  </div>

  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xl-12 mb-5 mb-xl-0">
        <div class="card bg-gradient-default shadow">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col text-center  py-5">
                    
                    <h1 class="text-white mb-0">Welcome, {{ Auth::user()->name }}</h1>

                    <h3 data-code = "{{ Auth::user()->referral_code }}" class="copy py-3" style="color: #3977e3; cursor:pointer;"><span class="fa fa-copy mr-2"></span>Copy Referral Link</h3>

                        <p> {!! $shareComponent !!} </p>

                  </div>
              
            </div>
          </div>
          
        </div>
      </div>
     
    </div>
  </div>

  <script>
    $(document).ready(function(){
        $('.copy').click(function(){
            $(this).parent().prepend('<span class="copied_text text-white">Copied</span>');

            var code = $(this).attr('data-code');
            var url = "{{ URL::to('/') }}/referral-register?ref=" + code;

            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            document.execCommand("copy");
            $temp.remove();

            setTimeout(() => {
                $('.copied_text').remove();
            }, 2000);
        });
    });
</script>
{{--
<style>
    div#social-links ul li{
        display: inline-block;
    }
    div#social-links ul li a{
        padding: 10px;
        padding-left: 15px;
        padding-right: 15px;
        margin: 5px;
        font-size: 20px;
        color: #fff;
        background-color: #0c48af;
        border-radius: 50%;
    }
    div#social-links ul li a:hover{
        background: #fff;
        border: 1px solid #0c48af;
        color: #0c48af;
    }

</style>

<section>
    <div class="navbar">
        <div class="heading" style="float: left">
            <h4>Dashboard</h4>
        </div>
        <div class="heading" style="float: right">
            <img src="{{asset ('images/profile.jpg')}}" alt="" style="width:35px; height:35px; border-radius:50%; border:1px solid #ccc" class="img-fluid mr-2"><span style="font-size:20px;">{{ Auth::user()->name }}</span>
        </div>
    </div>
    <div class="container text-center py-5">
        <div class="row justify-content-center align-items-center py-5 shadow border" >

            <div class="col-lg-12 col-12 ">
                <h2 class="fw-normal">Welcome, {{ Auth::user()->name }}</h2>
                <h6 data-code = "{{ Auth::user()->referral_code }}" class="copy py-3" style="color: #0c48af; cursor:pointer;"><span class="fa fa-copy mr-2"></span>Copy Referral Link</h6>
                
                 <p> {!! $shareComponent !!} </p>
                
            </div>

        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $('.copy').click(function(){
            $(this).parent().prepend('<span class="copied_text">Copied</span>');

            var code = $(this).attr('data-code');
            var url = "{{ URL::to('/') }}/referral-register?ref=" + code;

            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            document.execCommand("copy");
            $temp.remove();

            setTimeout(() => {
                $('.copied_text').remove();
            }, 2000);
        });
    });
</script>
--}}

@endsection 