<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Best blogging platform">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/frontend/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/owl.css') }}">

</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

@include('blog.components.navigation')

@if(request()->routeIs('blog.index'))
    @include('blog.components.categories')
@elseif(request()->routeIs('blog.post'))
    @include('blog.components.post-header')
@elseif(request()->routeIs('blog.contact'))
    @include('blog.components.contact-header')
@endif

<section class="{{ (request()->routeIs('blog.contact') ? 'contact-us' : 'blog-posts')  }}">
    <div class="container">
        <div class="row">
            @yield('content')

            @if(request()->routeIs('blog.index') || request()->routeIs('blog.post'))
                @include('blog.components.sidebar')
            @endif
        </div>
    </div>
</section>

@include('blog.components.footer')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('js/frontend/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/frontend/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- Scripts -->
<script src="{{ asset('js/frontend/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/frontend/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/frontend/custom.js') }}"></script>
<script src="{{ asset('js/frontend/owl.js') }}"></script>
<script src="{{ asset('js/frontend/slick.js') }}"></script>
<script src="{{ asset('js/frontend/isotope.min.js') }}"></script>
<script src="{{ asset('js/frontend/accordions.js') }}"></script>

<script language = "text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
        }
    }
</script>

</body>
</html>
