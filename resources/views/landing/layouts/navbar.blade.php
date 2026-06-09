<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3 sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bolder text-primary d-flex align-items-center gap-2" href="#">
            <img src="{{ asset('assets/img/logonew.PNG') }}" alt="HummaKos Logo" style="height: 70px; width: auto; max-width: 100%;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav nav-underline gap-2 gap-lg-4">
                <li class="nav-item">
                    <a class="nav-link active fw-medium px-3 text-primary" aria-current="page" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3 text-secondary" href="#">Cari Kamar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium px-3 text-secondary" href="#">Tentang Kami</a>
                </li>
            </ul>
        </div>
        <div class="d-none d-lg-flex">
            <a href="{{ route('login') }}" class="btn btn-primary px-3 rounded-2 fw-semibold shadow-sm">Masuk</a>
        </div>
    </div>
</nav>
