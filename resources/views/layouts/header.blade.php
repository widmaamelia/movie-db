<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Fixed navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link @yield('navHome')" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route(
                        'movie.create') }}">Input Movie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('navMovie')" aria-current="page" href="{{ route('movie.index') }}">Movie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('navCategory')" aria-current="page" href="{{ route('category.index') }}">Categori</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link @yield('navProdi')" aria-current="page" href="{{ route('prodi.index') }}">Prodi</a>
                    </li> --}}
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>
