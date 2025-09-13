// Tunggu sampai seluruh elemen HTML selesai dimuat
window.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('toggle-theme');
  
    // Pastikan tombolnya memang ada
    if (!toggleButton) {
      console.error("Tombol dengan ID 'toggle-theme' tidak ditemukan!");
      return;
    }
  
    // Cek status tema dari localStorage
    if (localStorage.getItem('theme') === 'dark') {
      document.documentElement.classList.add('dark');
      toggleButton.textContent = '☀️ Light Mode';
    } else {
      document.documentElement.classList.remove('dark');
      toggleButton.textContent = '🌙 Dark Mode';
    }
  
    // Tambahkan event listener untuk toggle
    toggleButton.addEventListener('click', () => {
      const htmlEl = document.documentElement;
  
      if (htmlEl.classList.contains('dark')) {
        htmlEl.classList.remove('dark');
        localStorage.setItem('theme', 'light');
        toggleButton.textContent = '🌙 Dark Mode';
      } else {
        htmlEl.classList.add('dark');
        localStorage.setItem('theme', 'dark');
        toggleButton.textContent = '☀️ Light Mode';
      }
    });
  });
  
