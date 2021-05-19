@section('content')
<section>
    
    <div class="home-banner-slider slider">
        <div class="slick--item imagebg ">
            <div class="background-image-holder">
                <img src="{{asset('img/slider-hospital-1-1-2.jpg')}}"> 
            </div>
            <div class="container pos-vertical-center">
                <div class="slick-desc">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="title font-bold mb-0">IMCH</h1>
                            <h2 class="sub-title font-thin mb-4">Medical Hospital in Iligan</h2>
                            <p class="desc font-thin">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                            <a class="btn btn-lg btn-primary-gradient btn-curve"><span>Contact Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slick--item imagebg ">
            <div class="background-image-holder">
                <img src="{{asset('img/slider-hospital-2-1-n.jpg')}}"> 
            </div>
            <div class="container pos-vertical-center">
                <div class="slick-desc">
                    <div class="row justify-content-end">
                        <div class="col-md-6">
                            <h1 class="title font-bold mb-0">IMCH</h1>
                            <h2 class="sub-title font-thin mb-4">Medical Hospital in Iligan</h2>
                            <p class="desc font-thin">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                            <a class="btn btn-lg btn-primary-gradient btn-curve"><span>Contact Now</span></a>
                        </div>
                    </div>
                </div>
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