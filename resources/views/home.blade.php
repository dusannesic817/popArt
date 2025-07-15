<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body class="bg-light">
  

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">

    <div class="container">
        <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">                                
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>


        </div>
    </div>
</nav>

<x-auth-session-status :status="session('status')" />

<!--Search-->
<div class="container">
    <div class="row mt-5">
        <div class="col-10">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<!--Main-->

<div class="container">
    <div class="row mt-5">
        <!-- Sidebar -->
        <div class="col-2 p-0 border-end border-1 border-secondary">
            <aside class="vh-100 overflow-auto p-3">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                Racunari
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div><a href="">asdsd</a></div>
                                <div><a href="">asdsd</a></div>
                                <div><a href="">asdsd</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        <!-- Content -->
        <div class="col-10">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <a href="product.html">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <div><b>Title</b></div>
                                <small>Price: 19.99$</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">dasdasda</div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">dasdasda</div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">dasdasda</div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">dasdasda</div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="card">
                        <div class="card-body">dasdasda</div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="card">
                        <div class="card-body">dasdasda</div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="card">
                        <div class="card-body">dasdasda</div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="card">
                        <div class="card-body">dasdasda</div>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <div class="card">
                        <div class="card-body">dasdasda</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
</script>

</body>

</html>
