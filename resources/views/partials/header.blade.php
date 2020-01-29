<!--Main Navigation-->
<header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark scrolling-navbar">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand waves-effect" href="/">
                <strong class="blue-text">Blog</strong>
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item @if(Route::currentRouteNamed('welcome')) active @endif">
                        <a class="nav-link waves-effect" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect @if(Route::currentRouteNamed('category.index')) active @endif" href="{{ route('category.index') }}">Categories</a>
                    </li>
                </ul>


            </div>

        </div>
    </nav>
    <!-- Navbar -->

</header>
<!--Main Navigation-->
