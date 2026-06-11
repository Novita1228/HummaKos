<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-3 px-4 d-none d-md-flex justify-content-end w-100">
    <div class="d-flex align-items-center gap-4">
        <!-- Notification -->
        <button class="btn btn-light rounded-circle p-2 position-relative d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: #E8F5E9; border: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#00897B" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.252 3 8.188 3 6a5 5 0 0 1 10 0c0 2.188.32 4.252 1.22 6z"/>
            </svg>
        </button>

        <!-- Profile Dropdown -->
        <div class="dropdown">
            <div class="d-flex align-items-center gap-3 cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                <div class="text-end">
                    <h6 class="mb-0 fw-bold" style="font-size: 14px; color: #333;">{{ auth()->user()->name }}</h6>
                    <small class="text-muted" style="font-size: 12px;">{{ auth()->user()->hasRole('admin') ? 'Admin' : 'Penyewa' }}</small>
                </div>
                <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&background=00897B&color=fff' }}" alt="Profile" class="rounded-circle object-fit-cover bg-white" width="45" height="45" style="border: 2px solid #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            </div>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2" style="border-radius: 8px; min-width: 200px;">
                <li>
                    <a class="dropdown-item py-2 d-flex align-items-center gap-2" href="{{ route('profile.edit') }}" style="font-size: 14px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/></svg>
                        Edit Profile
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item py-2 d-flex align-items-center gap-2 text-danger" style="font-size: 14px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/><path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/></svg>
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
