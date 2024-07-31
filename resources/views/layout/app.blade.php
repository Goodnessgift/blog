<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}" >Blogger’s Haven</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}"  href="{{ route('home') }}">Home</a></li>
                    <a class="nav-link {{ Request::is('createpost') ? 'active' : '' }}" href="{{ route('createpost') }}">Create Posts</a></li>
                    <a class="nav-link {{ Request::is('allposts') ? 'active' : '' }}"  href="{{ route('allposts') }}">All Posts</a></li>
                    @if (Auth::user())
                    <a class="nav-link {{ Request::is('logout') ? 'active' : '' }}"  href="{{ route('logout') }}">Logout</a></li>
                    @else
                    <a class="nav-link {{ Request::is('login') ? 'active' : '' }}"  href="{{ route('login') }}">Login</a></li>
                    <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">Register</a></li>
                    @endif
                    {{-- <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li> --}}
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page header with logo and tagline-->
   
    @yield('content')
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
