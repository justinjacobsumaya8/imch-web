@extends('frontend.layouts.app')

@section('title', __('Our Services'))

@push('after-styles')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
@endpush

@section('content')

<section class="home-banner-slider slider p-0">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="">
                    <div class="card-doctors">
                        <div class="imagebg">
                            <div class="background-image-holder">
                                <img src="{{asset('img/doctor-1.jpg')}}"/>
                            </div>
                        </div>
                        <div class="card-body-desc text-center">
                            <h4 class="font-bold">Dr. Lorraine Dy </h4>
                            <p class="mb-0">Pediatrician</p>
                        </div>
                    </div>  
                </a>
            </div>
            <div class="col-md-4">
                <a href="">
                    <div class="card-doctors">
                        <div class="imagebg">
                            <div class="background-image-holder">
                                <img src="{{asset('img/doctor-2.jpg')}}"/>
                            </div>
                        </div>
                        <div class="card-body-desc text-center">
                            <h4 class="font-bold">Dr. Henry Sy </h4>
                            <p class="mb-0">General Practictioner</p>
                        </div>
                    </div>
                </a>  
            </div>
            <div class="col-md-4">
                <a href="#">
                    <div class="card-doctors">
                        <div class="imagebg">
                            <div class="background-image-holder">
                                <img src="{{asset('img/doctor-3.jpg')}}"/>
                            </div>
                        </div>
                        <div class="card-body-desc text-center">
                            <h4 class="font-bold">Dr. Matthew Diaz </h4>
                            <p class="mb-0">Anesthesiologist</p>
                        </div>
                    </div>  
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
@push('after-scripts')
<script>

    $('.background-image-holder').each(function() {
        var imgSrc = $(this).children('img').attr('src');
        $(this).css('background', 'url("' + imgSrc + '")').css('background-position', 'initial').css('opacity','1');
    });

    $('.slider').slick({
        arrows:false,
        dots:true,
        infinite: true,
        fade: true,
    });
</script>
@endpush