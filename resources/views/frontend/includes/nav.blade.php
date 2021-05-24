<nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container">
        <div class="bar">
            <div class="d-flex align-items-center">
                <img src="{{ asset('img/imcc-logo.png') }}" class="logo" alt=""/>
                <div class="ml-3">
                    <h3 class="mb-0" style="font-size: 28px; font-weight: 600; letter-spacing: 0px; text-transform: none;">Iligan Medical</h3>
                    <h5 class="mb-0 font-semibold">Center Hospital</h5>
                </div>
            </div>
        </div>
        <div class="wrap-container">
            <div class="menu-wrap mr-3">
                <i data-feather="check-circle" class="mr-3"></i>
                <div class="menu-wrap-text">
                    <h6 class="mb-0 font-semibold">Trusted By</h6>
                    <p class="mb-0">10,000+ People</p>
                </div>
            </div>
            <div class="menu-wrap ">
                <i data-feather="check-circle" class="mr-3"></i>
                <div class="menu-wrap-text">
                    <h6 class="mb-0 font-semibold">Best Hospital</h6>
                    <p class="mb-0">in Iligan City</p>
                </div>
            </div>
            
        </div>
        
    </div><!--container-->
</nav>
<nav class="navbar navbar-expand-md navbar-light bg-white bot-menu">
    <div class="container">

            <div class="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('frontend.index') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ request()->is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('frontend.pages.about') }}">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Our Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Ambulatory Surgical Center</a>
                            <a class="dropdown-item" href="#">Doctor's Office</a>
                            <a class="dropdown-item" href="#">Urgent Care Clinic</a>
                            <a class="dropdown-item" href="#">Nursing Home</a>
                            <a class="dropdown-item" href="#">Consultation</a>
                            <a class="dropdown-item" href="#">Laboratory</a>
                            <a class="dropdown-item" href="#">Critical Care Unit</a>
                            <a class="dropdown-item" href="#">Imaging Services</a>
                            <a class="dropdown-item" href="#">Emergency Services & Out Patient Services</a>
                        </div>  
                    </li>
                    <!-- <li class="nav-item {{ request()->is('our-services') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('frontend.pages.our-services') }}">Our Services</a>
                    </li> -->
                    <li class="nav-item {{ request()->is('our-doctors') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('frontend.pages.our-doctors') }}">Our Doctors</a>
                    </li>
                </ul>
            </div>
            <div class="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        @if(!$logged_in_user)
                        <a class="btn btn-primary btn-curve" href="{{ url('login') }}"><span>Login</span></a>
                        @endif
                    </li>
                    
                </ul>
            </div>
        
    </div><!--container-->
</nav>

@if (config('boilerplate.frontend_breadcrumbs'))
    @include('frontend.includes.partials.breadcrumbs')
@endif
