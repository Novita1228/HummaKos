<!-- Mobile Navbar -->
<nav class="navbar navbar-light bg-white border-bottom px-3 py-3 d-md-none d-flex justify-content-between align-items-center w-100" style="position: sticky; top: 0; z-index: 1020;">
    <div class="d-flex align-items-center gap-2">
        <button class="btn btn-light border-0 p-1 rounded-circle d-flex align-items-center justify-content-center" id="sidebarToggleBtn" style="width: 40px; height: 40px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        <img src="{{ asset('assets/img/logonew.PNG') }}" alt="Logo" height="35" class="ms-2">
    </div>
    
    <!-- Notification -->
    <button class="btn btn-light rounded-circle p-2 position-relative d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: #E8F5E9; border: none;">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#00897B" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.252 3 8.188 3 6a5 5 0 0 1 10 0c0 2.188.32 4.252 1.22 6z"/>
        </svg>
    </button>
</nav>
