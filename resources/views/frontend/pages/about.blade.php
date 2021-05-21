@extends('frontend.layouts.app')

@section('title', __('About Us'))

@push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

<style type="text/css" scoped>

    .floating-box * {
        color: #111 !important;
    }
</style>

@section('content')

<section class="home-banner-slider slider p-0">
    <div class="slick--item imagebg" style="height: 70vh !important;">
        <div class="background-image-holder">
            <img src="{{ asset('img/about-us.jpg') }}"> 
        </div>
        <div class="container pos-vertical-center">
            <div class="slick-desc text-center">
                <h1 class="title font-bold mb-0">About Us</h1>
                <h2 class="sub-title font-thin mb-4">Story about our hospital</h2>
            </div>
        </div>
    </div>
</section>
<div class="height-50 pos-relative">
    <div class="floating-box" style="background-image: none; top: -10em; padding: 6em;">
        <div class="row">
            <div class="col-md-6 mb-lg-0 mb-5" style="padding-right: 0;">
                <img src="{{ url('img/about-1.jpeg') }}">
            </div>
            <div class="col-md-6 mb-lg-0" style="padding: 73px 65px 0 70px; background-color: #fff;">
                <h3 class="mb-0" style="font-size: 28px;font-weight: 600;letter-spacing: 0px;text-transform: none;">Story about our hospital</h3>
                <span style="font-size: 20px;font-style: normal;color: #803251 !important;margin-top: 5px;">And how we get to this point</span>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <p style="font-size: 15px;font-weight: 400;letter-spacing: 0px;text-transform: none;color: #606060 !important;">One of the first major discoveries relevant to the field of pulmonology was the discovery of pulmonary circulation. Originally, it was thought that blood reaching the right side of the heart passed through small ‘pores’ in the septum.</p>
                    </div>
                    <div class="col-md-12 mt-5">
                        <img src="{{ url('img/sign.png') }}" width="40%">
                        <h5 style="color: #5e5e5e !important;font-size: 15px;">Founder of Iligan Medical Center Hospital</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container text-center" style="padding-top: 10rem;padding-bottom: 4rem;">
    <h3 style="font-size: 29px;font-weight: 700;letter-spacing: 0px;text-transform: none;color: #171717;">Certified by the Joint Commission</h3>
    <span style="font-size: 20px;font-style: normal;color: #803251;margin-top: 8px;">The largest and most respected accreditation agencies</span>
    <p class="mt-4 px-5" style="font-size: 16px;font-weight: 400;letter-spacing: 0px;text-transform: none;color: #6d6d6d;">One of the first major discoveries relevant to the field of pulmonology was the discovery of pulmonary circulation. Originally, it was thought that blood reaching the right side of the heart passed through small</p>

    <div style="border-color: #803251;border-width: 2px !important;border-radius: 0px;-moz-border-radius: 0px;-webkit-border-radius: 0px;height: 35px;border-bottom: 0;width: 0;border-left-style: solid;margin-left: auto;margin-right: auto;margin-top: 2em;"></div>
</div>

<div class="container numbers" style="max-width: 1250px !important;">
    <div class="card text-center" style="background-image: url('/img/about-us-2.jpg'); color: #fff; padding: 50px 0px 50px 0px;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <h1 class="value" style="font-size: 39px;font-weight: 700;">191</h1>
                    <span style="font-size: 20px;font-weight: 500;text-transform: none;color: #ffb3b3;">Doctors</span>
                </div>
                <div class="col-md-3">
                    <h1 style="font-size: 39px;font-weight: 700;"><span class="value">27596</span> <span>+</span></h1>
                    <span style="font-size: 20px;font-weight: 500;text-transform: none;color: #ffb3b3;">Happy Patients</span>
                </div>
                <div class="col-md-3">
                    <h1 class="value" style="font-size: 39px;font-weight: 700;">952</h1>
                    <span style="font-size: 20px;font-weight: 500;text-transform: none;color: #ffb3b3;">Medical Beds</span>
                </div>
                <div class="col-md-3">
                    <h1 class="value" style="font-size: 39px;font-weight: 700;">143</h1>
                    <span style="font-size: 20px;font-weight: 500;text-transform: none;color: #ffb3b3;">Winning Awards</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5 m-0 w-100">
    <div class="col-md-4" style="background-image: url('/img/about-us-3.jpg');background-size: cover;background-position: left;padding: 50px 0px 60px 60px;">
        <div class="d-flex align-items-center">
            <i class="fa fa-3x fa-map-marker-alt mr-3 text-white"></i>
            <div>
                <h3 style="font-size: 21px;color: #ffb3b3;font-weight: 500;letter-spacing: 0px;text-transform: none;">Get directions</h3>
                <div style="font-size: 19px;font-weight: 600;font-style: italic;color: #ffffff;">Find us on map</div>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="background-color: #803251;background-size: cover;background-position: left;padding: 50px 0px 60px 60px;">
        <div class="d-flex align-items-center">
            <i class="fa fa-3x fa-envelope-open-text mr-3 text-white"></i>
            <div>
                <h3 style="font-size: 21px;color: #ffb3b3;font-weight: 500;letter-spacing: 0px;text-transform: none;">Contact & Appointment</h3>
                <div style="font-size: 19px;font-weight: 600;font-style: italic;color: #ffffff;">Send us an email</div>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="background-image: url('/img/about-us-4.jpg');background-size: cover;background-position: left;padding: 50px 0px 60px 60px;">
        <div class="d-flex align-items-center">
            <i class="fa fa-3x fa-heartbeat mr-3 text-white"></i>
            <div>
                <h3 style="font-size: 21px;color: #ffb3b3;font-weight: 500;letter-spacing: 0px;text-transform: none;">Emergency Service</h3>
                <div style="font-size: 19px;font-weight: 600;font-style: italic;color: #ffffff;">Call : +1-2345-3455-33</div>
            </div>
        </div>
    </div>
</div>
    
@endsection

@push('after-scripts')
<script>

    $('.background-image-holder').each(function() {
        var imgSrc = $(this).children('img').attr('src');
        $(this).css('background', 'url("' + imgSrc + '")').css('background-position', 'initial').css('opacity','1');
    });

    $(window).scroll(testScroll);
    var viewed = false;

    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }

    function testScroll() {
      if (isScrolledIntoView($(".numbers")) && !viewed) {
          viewed = true;
          $('.value').each(function () {
          $(this).prop('Counter',0).animate({
              Counter: $(this).text()
          }, {
              duration: 4000,
              easing: 'swing',
              step: function (now) {
                  $(this).text(Math.ceil(now));
              }
          });
        });
      }
    }
</script>
@endpush