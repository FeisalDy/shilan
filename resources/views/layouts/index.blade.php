<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shi Lan</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Cropper.js library and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css">
    <script src="https://unpkg.com/cropperjs"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-white" id="neubar">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{url('/images/logo2.png')}}" height="50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" onclick="this.classList.toggle('rotate')">
                <div class="custom-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>


            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item p-1">
                        <a class="nav-link {{ (request()->is('home')) ? 'active' : '' }}" href="/home">Home</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="nav-link {{ (request()->is('novels')) ? 'active' : '' }}" href="/novels">Novels</a>
                    </li>
                    @guest
                    <li class="nav-item p-1">
                        <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item p-1">
                        <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ ucfirst(Auth::user()->name) }}
                            </a>
                            <ul class="dropdown-menu bg-custom-nav">
                                <li class="nav-item">
                                    <a class="dropdown-item bg-custom-nav" href="#">Bookmarks</a>
                                </li>
                                @if(Auth::user()->role =='admin')
                                <li class="nav-item">
                                    <a class="dropdown-item bg-custom-nav" href="{{ route('novels.create') }}">Upload Novels</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="dropdown-item bg-custom-nav" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    @endguest
                    </li>
                    <li class="nav-item p-1">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark" type="submit">Search</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>

    <div class="container bg-white">
        <div class="p-2">
            @yield('content')
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        </div>

        <br>


        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>

                <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <ul class="nav col-md-4 justify-content-end">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
                </ul>
            </footer>
        </div>
</body>

</html>