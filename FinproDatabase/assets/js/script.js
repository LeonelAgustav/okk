// Contoh validasi login form
document.querySelector('form').addEventListener('submit', function(e) {
    var username = document.querySelector('input[name="username"]').value;
    var password = document.querySelector('input[name="password"]').value;
    if (!username || !password) {
        alert('Semua field harus diisi!');
        e.preventDefault();
    }
});

// Add any custom JavaScript for front-end interactions
document.addEventListener("DOMContentLoaded", function () {
    console.log("Script loaded successfully");
    // Example: handle form validation or dynamic actions here
});
