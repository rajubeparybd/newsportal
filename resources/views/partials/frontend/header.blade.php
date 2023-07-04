<header class="header-default">
    <nav class="navbar navbar-expand-lg">
        <div class="container-xl">
            <!-- site logo -->
            <a class="navbar-brand" href="/">
                <x-application-logo/>
            </a>

            <div class="collapse navbar-collapse">
                <!-- menus -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="{{asset('index-2.html')}}">Home</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{asset('index-2.html')}}">Magazine</a></li>
                            <li><a class="dropdown-item" href="{{asset('personal.html')}}">Personal</a></li>
                            <li><a class="dropdown-item" href="{{asset('personal-alt.html')}}">Personal Alt</a></li>
                            <li><a class="dropdown-item" href="{{asset('minimal.html')}}">Minimal</a></li>
                            <li><a class="dropdown-item" href="{{asset('classic.html')}}">Classic</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{asset('category.html')}}">Lifestyle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{asset('category.html')}}">Inspiration</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#">Pages</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{asset('category.html')}}">Category</a></li>
                            <li><a class="dropdown-item" href="{{asset('blog-single.html')}}">Blog Single</a></li>
                            <li><a class="dropdown-item" href="{{asset('blog-single-alt.html')}}">Blog Single Alt</a>
                            </li>
                            <li><a class="dropdown-item" href="{{asset('about.html')}}">About</a></li>
                            <li><a class="dropdown-item" href="{{asset('contact.html')}}">Contact</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{asset('contact.html')}}">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- header right section -->
            <div class="header-right">
                <!-- social icons -->
                <ul class="social-icons list-unstyled list-inline mb-0">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
                <!-- header buttons -->
                <div class="header-buttons">
                    @auth
                        <a href="{{route("user.dashboard")}}" class="btn btn-primary">
                            Dashboard
                        </a>
                    @else
                        <a href="{{route("login")}}" class="btn btn-primary">
                            Login
                        </a>
                    @endauth
                    <button class="search icon-button">
                        <i class="icon-magnifier"></i>
                    </button>
                    <button class="burger-menu icon-button">
                        <span class="burger-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>
