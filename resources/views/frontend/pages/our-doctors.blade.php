@extends('frontend.layouts.app')

@section('title', __('Our Doctors'))

@push('after-styles')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
@endpush

@section('content')

<section class="home-banner-slider slider p-0">
        
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