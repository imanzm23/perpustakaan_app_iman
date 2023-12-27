<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">

        {{-- Boostrap Icons --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

        {{-- My Style --}}
        <link rel="stylesheet" href="/css/style.css">

        <title>Perpustakaan Digital | Dashboard</title>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Perpustakaan Digital </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">Mulyani-20110110</a>
            </li>
        </ul>
                {{-- <li class="nav-item">
                <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{ ($title === "About") ? 'active' : '' }}" href="/about">About</a>
                </li>
                <li class="nav-item">
                <a class="nav-link {{ ($title === "Posts") ? 'active' : '' }}" href="/posts">Blog</a>
                </li> --}}
            </ul>

            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window"></i> Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ ($title === "Login") ? 'active' : '' }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                @endauth
            </ul>

            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card border-dark text-center mt-5">
            <div class="text-white bg-dark card-header"></div>
            <div class="card-body text-dark bg-light">
                <h5 class="card-title">Data User</h5>
                <p class="card-text">Form Data User</p>
                <a href="/user" class="btn btn-primary">Open</a>
            </div>
            <div class="card-footer text-muted text-white bg-dark">

            </div>
        </div>
        <div class="card border-dark text-center mt-5">
            <div class="text-white bg-dark card-header"></div>
            <div class="card-body text-dark bg-light">
                <h5 class="card-title">Data Buku</h5>
                <p class="card-text">Form Data Buku</p>
                <a href="/book" class="btn btn-primary">Open</a>
            </div>
            <div class="card-footer text-muted text-white bg-dark">

            </div>
        </div>
        <div class="card border-dark text-center mt-5">
            <div class="text-white bg-dark card-header"></div>
            <div class="card-body text-dark bg-light">
                <h5 class="card-title">Data Pegawai</h5>
                <p class="card-text">Form Data Pegawai</p>
                <a href="/pegawai" class="btn btn-primary">Open</a>
            </div>
            <div class="card-footer text-muted text-white bg-dark">

            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  </body>
</html>