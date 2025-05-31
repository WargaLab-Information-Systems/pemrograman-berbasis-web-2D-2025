// Dark/Light mode toggle
const btn = document.getElementById('toggle-theme');
const body = document.body;

let dark = localStorage.getItem('theme') === 'dark';

// Fungsi untuk menerapkan tema
function applyTheme() {
    if (dark) {
        body.classList.add('dark-mode');
        if (btn) btn.textContent = '☀️ Light Mode';
    } else {
        body.classList.remove('dark-mode');
        if (btn) btn.textContent = '🌙 Dark Mode';
    }
}

// Terapkan tema saat halaman dimuat
applyTheme();

// Event listener untuk toggle tema
if (btn) {
    btn.addEventListener('click', function() {
        dark = !dark;
        localStorage.setItem('theme', dark ? 'dark' : 'light');
        applyTheme();
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

        const nameVal = name.value.trim();
        const emailVal = email.value.trim();
        const descVal = desc.value.trim();

        // Reset style border
        [name, email, desc].forEach(f => f.style.borderColor = '#e0e0e0');

        // Jika semua kosong
        if (!nameVal && !emailVal && !descVal) {
            alert('Semua kolom masih kosong! Mohon isi data terlebih dahulu.');
            [name, email, desc].forEach(f => f.style.borderColor = 'red');
            return;
        }

        // Validasi nama
        if (!nameVal) {
            name.style.borderColor = 'red';
            valid = false;
        }

        // Validasi email (sederhana)
        if (!emailVal || !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(emailVal)) {
            email.style.borderColor = 'red';
            valid = false;
        }

        // Validasi deskripsi/pesan
        if (!descVal) {
            desc.style.borderColor = 'red';
            valid = false;
        }

        // Tampilkan alert sesuai hasil
        if (valid) {
            alert('Pesan berhasil dikirim! Terima kasih sudah menghubungi Karina.');
            form.reset();
        } else {
            alert('Mohon lengkapi data dengan benar!');
        }
    });
}
