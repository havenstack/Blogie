<!-- Header -->
<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('blog.index') }}"><h2>Stand Blog<em>.</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('blog.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.contact') }}">Contact Us</a>
                    </li>
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="nav-link"
                        >
                            Administration
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="nav-link"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="nav-link"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
