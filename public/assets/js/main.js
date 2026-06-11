document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggleBtn = document.getElementById('sidebarToggleBtn');
    const sidebarMenu = document.getElementById('sidebarMenu');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    if (sidebarToggleBtn && sidebarMenu && sidebarOverlay) {
        // Toggle sidebar when button is clicked
        sidebarToggleBtn.addEventListener('click', function() {
            sidebarMenu.classList.toggle('show');
            sidebarOverlay.classList.toggle('show');
        });

        // Close sidebar when clicking outside (on overlay)
        sidebarOverlay.addEventListener('click', function() {
            sidebarMenu.classList.remove('show');
            sidebarOverlay.classList.remove('show');
        });
    }
});

// Script to update file name for inputs
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image');
    const fileNameDisplay = document.getElementById('file-name-display');
    if (imageInput && fileNameDisplay) {
        imageInput.addEventListener('change', function(e) {
            var fileName = e.target.files[0] ? e.target.files[0].name : 'Klik atau seret foto ke sini';
            fileNameDisplay.textContent = fileName;
        });
    }
});
