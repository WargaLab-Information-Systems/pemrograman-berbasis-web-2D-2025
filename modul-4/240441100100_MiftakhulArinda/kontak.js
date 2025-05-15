const form = document.getElementById('formProyek');

if (form) {
    form.addEventListener('submit', function(e) {
        e.preventDefault(); 

        let valid = true;

        const name = form.querySelector('#nama');
        const email = form.querySelector('#email');
        const deskripsi = form.querySelector('#deskripsi');
        const anggaran = form.querySelector('#anggaran');

        [name, email, deskripsi, anggaran].forEach(f => f.style.borderColor = '#e0e0e0');

        if (!name.value.trim()) {
            name.style.borderColor = 'red';
            valid = false;
        }

        if (!email.value.trim() || !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email.value)) {
            email.style.borderColor = 'red';
            valid = false;
        }

        if (!deskripsi.value.trim()) {
            deskripsi.style.borderColor = 'red';
            valid = false;
        }

        if (!anggaran.value.trim()) {
            anggaran.style.borderColor = 'red';
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
