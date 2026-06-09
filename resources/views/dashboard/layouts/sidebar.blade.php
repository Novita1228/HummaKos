<!-- Sidebar -->
<aside class="sidebar d-flex flex-column p-3 bg-white shadow-sm vh-100 position-fixed" id="sidebarMenu">
    <!-- Logo -->
    <a href="/" class="d-flex align-items-center mb-4 px-2 pt-2 text-decoration-none">
        <img src="{{ asset('assets/img/logonew.PNG') }}" alt="HummaKos Logo" height="55">
    </a>

    <!-- Navigation -->
    @hasrole('admin')
    <!-- Menu Admin -->
    <ul class="nav nav-pills flex-column gap-1">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link d-flex align-items-center gap-3 px-3 py-2 rounded-3 {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-dark' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M6 1H1v5h5V1zm9 0H9v5h5V1H9zM1 10h5v5H1v-5zm9 0h6v5H10v-5z"/>
                </svg>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link d-flex align-items-center gap-3 px-3 py-2 rounded-3 text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M5 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5zm.5 1h5a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5z"/>
                </svg>
                Kamar
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link d-flex align-items-center gap-3 px-3 py-2 rounded-3 text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                </svg>
                Penyewa
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link d-flex align-items-center gap-3 px-3 py-2 rounded-3 text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.437-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                Keluhan
            </a>
        </li>
    </ul>
    @else
    <!-- Menu User (Penyewa) -->
    <ul class="nav nav-pills flex-column gap-1">
        <li class="nav-item">
            <a href="{{ route('user.dashboard') }}"
               class="nav-link d-flex align-items-center gap-3 px-3 py-2 rounded-3 {{ request()->routeIs('user.dashboard') ? 'active' : 'text-dark' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M6 1H1v5h5V1zm9 0H9v5h5V1H9zM1 10h5v5H1v-5zm9 0h6v5H10v-5z"/>
                </svg>
                Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link d-flex align-items-center gap-3 px-3 py-2 rounded-3 text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M1.5 15a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5V1a.5.5 0 0 0-.5-.5h-12a.5.5 0 0 0-.5.5v14zM13 14H3V2h10v12zM11 7h-1v2h1V7h-1z"/>
                </svg>
                Kamar Saya
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link d-flex align-items-center gap-3 px-3 py-2 rounded-3 text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                Cari Kamar
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link d-flex align-items-center gap-3 px-3 py-2 rounded-3 text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.437-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                Keluhan
            </a>
        </li>
    </ul>
    @endhasrole

    <!-- Logout Button (at bottom) -->
    <div class="mt-auto pt-3 border-top">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2 rounded-3 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>
