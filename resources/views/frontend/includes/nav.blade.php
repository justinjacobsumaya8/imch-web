<nav class="navbar navbar-expand-md navbar-light bg-white">
    <div class="container">
        <div class="bar">
            <img src="{{ asset('img/logo-dark.png') }}" class="logo" alt=""/>
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
                    <p class="mb-0">Iligan City</p>
                </div>
            </div>
            
        </div>
        
    </div><!--container-->
</nav>
<nav class="navbar navbar-expand-md navbar-light bg-white bot-menu">
    <div class="container">

            <div class="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Our Services
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Services 1</a>
                            <a class="dropdown-item" href="#">Services 2</a>
                        </div>  
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Our Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blogs</a>
                    </li>
                </ul>
            </div>
            <div class="">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="btn btn-primary btn-curve" href="#"><span>Contact Us</span></a>
                    </li>
                    
                </ul>
            </div>
        
    </div><!--container-->
</nav>

@if (config('boilerplate.frontend_breadcrumbs'))
    @include('frontend.includes.partials.breadcrumbs')
@endif
