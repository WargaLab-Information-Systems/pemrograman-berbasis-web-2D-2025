document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formProyek");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const nama = document.getElementById("nama");
        const email = document.getElementById("email");
        const deskripsi = document.getElementById("deskripsi");
        const anggaran = document.getElementById("anggaran");

        let isValid = true;
        let messages = [];

        // Validasi Nama
        if (nama.value.trim() === "") {
            isValid = false;
            messages.push("Nama lengkap harus diisi.");
        }

        // Validasi Email
        if (email.value.trim() === "") {
            isValid = false;
            messages.push("Alamat email harus diisi.");
        } else if (!validateEmail(email.value)) {
            isValid = false;
            messages.push("Alamat email tidak valid.");
        }

        // Validasi Deskripsi
        if (deskripsi.value.trim() === "") {
            isValid = false;
            messages.push("Deskripsi proyek harus diisi.");
        }

        // Validasi Anggaran
        if (anggaran.value.trim() === "") {
            isValid = false;
            messages.push("Kisaran anggaran harus diisi.");
        } else if (isNaN(anggaran.value) || Number(anggaran.value) <= 0) {
            isValid = false;
            messages.push("Anggaran harus berupa angka positif.");
        }

        if (!isValid) {
            alert(messages.join("\n"));
        } else {
            alert("Form berhasil dikirim!"); 
            form.reset(); 
        }
    });

    // Fungsi validasi email
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }
});
