// ===== Script Interaktif EventGo =====

// Navbar shrink saat scroll
window.addEventListener("scroll", function () {
  const navbar = document.querySelector(".navbar");
  if (window.scrollY > 50) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});

// Smooth scroll ke bagian halaman
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute("href"));
    if (target) {
      window.scrollTo({
        top: target.offsetTop - 70,
        behavior: "smooth"
      });
    }
  });
});

// Alert untuk tombol beli tiket
document.addEventListener("DOMContentLoaded", function () {
  const buyButtons = document.querySelectorAll(".btn-buy");
  buyButtons.forEach(button => {
    button.addEventListener("click", () => {
      alert("Terima kasih! Lanjutkan proses pemesanan tiket Anda 🎟️");
    });
  });
});

// Dark mode toggle
const toggle = document.querySelector("#darkModeToggle");
if (toggle) {
  toggle.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
    toggle.textContent = document.body.classList.contains("dark-mode")
      ? "☀️ Light Mode"
      : "🌙 Dark Mode";
  });
}

// Animasi fade-in sederhana untuk elemen yang muncul di layar
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add("fade-in");
    }
  });
});
document.querySelectorAll(".fade-section").forEach(el => observer.observe(el));
