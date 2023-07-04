<div class="canvas-menu d-flex align-items-end flex-column">
    <!-- close button -->
    <button type="button" class="btn-close" aria-label="Close"></button>

    <!-- logo -->
    <x-application-logo/>

    <!-- menu -->
    <nav>
        <ul class="vertical-menu">
            <li class="active">
                <a href="{{asset('index-2.html')}}">Home</a>
                <ul class="submenu">
                    <li><a href="{{asset('index-2.html')}}">Magazine</a></li>
                    <li><a href="{{asset('personal.html')}}">Personal</a></li>
                    <li><a href="{{asset('personal-alt.html')}}">Personal Alt</a></li>
                    <li><a href="{{asset('minimal.html')}}">Minimal</a></li>
                    <li><a href="{{asset('classic.html')}}">Classic</a></li>
                </ul>
            </li>
            <li><a href="{{asset('category.html')}}">Lifestyle</a></li>
            <li><a href="{{asset('category.html')}}">Inspiration</a></li>
            <li>
                <a href="#">Pages</a>
                <ul class="submenu">
                    <li><a href="{{asset('category.html')}}">Category</a></li>
                    <li><a href="{{asset('blog-single.html')}}">Blog Single</a></li>
                    <li><a href="{{asset('blog-single-alt.html')}}">Blog Single Alt</a></li>
                    <li><a href="{{asset('about.html')}}">About</a></li>
                    <li><a href="{{asset('contact.html')}}">Contact</a></li>
                </ul>
            </li>
            <li><a href="{{asset('contact.html')}}">Contact</a></li>
        </ul>
    </nav>

    <!-- social icons -->
    <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
    </ul>
</div>
