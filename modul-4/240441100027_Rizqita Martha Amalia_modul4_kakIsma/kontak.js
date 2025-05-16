// Dark/Light mode toggle
const btn = document.getElementById('toggle-theme');
const body = document.body;
let dark = false;
if (btn) {
    btn.addEventListener('click', function() {
        dark = !dark;
        if (dark) {
            body.classList.add('dark-mode');
            btn.textContent = '☀️ Light Mode';
        } else {
            body.classList.remove('dark-mode');
            btn.textContent = '🌙 Dark Mode';
        }
    });
}

// Form validation
const form = document.querySelector('.contact-form');
if (form) {
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        let valid = true;
        const name = form.querySelector('input[type="text"]');
        const email = form.querySelector('input[type="email"]');
        const desc = form.querySelector('textarea');
        // Reset style
        [name, email, desc].forEach(f => f.style.borderColor = '#e0e0e0');
        // Name validation
        if (!name.value.trim()) {
            name.style.borderColor = 'red';
            valid = false;
        }
        // Email validation (simple)
        if (!email.value.trim() || !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email.value)) {
            email.style.borderColor = 'red';
            valid = false;
        }
        // Desc validation
        if (!desc.value.trim()) {
            desc.style.borderColor = 'red';
            valid = false;
        }
        if (valid) {
            alert('Pesan berhasil dikirim! Terima kasih sudah menghubungi Karina.');
            form.reset();
        } else {
            alert('Mohon lengkapi data dengan benar!');
        }
    });
} 