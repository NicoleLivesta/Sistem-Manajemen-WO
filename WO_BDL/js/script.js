// scripts.js

document.addEventListener('DOMContentLoaded', function() {
    // Example: Add functionality for mobile menu toggle if needed
    const mobileMenu = document.getElementById('mobile-menu');
    const nav = document.getElementById('nav');

    if (mobileMenu) {
        mobileMenu.addEventListener('click', function() {
            nav.classList.toggle('active');
        });
    }
});
