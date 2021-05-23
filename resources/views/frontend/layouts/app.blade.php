<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    @stack('before-styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    <link href="{{ url('packages/jquery-steps/jquery.steps.css') }}" rel="stylesheet">
    <link href="{{ url('packages/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <livewire:styles />
    @stack('after-styles')
</head>
<body>
    @include('includes.partials.read-only')
    @include('includes.partials.logged-in-as')

    <div id="app">
        @include('frontend.includes.nav')
        <main>
            <div class="container">
                @include('includes.partials.messages')
            </div>
            @yield('content')
        </main>
        @include('frontend.includes.footer')
    </div><!--app-->

    @stack('before-scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/frontend.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{ url('packages/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ url('packages/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        feather.replace()
    </script>
    <livewire:scripts />
    @stack('after-scripts')
</body>
</html>
