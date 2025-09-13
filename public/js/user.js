// Toggle Menu (Hamburger)
const menuToggleBtn = document.querySelector('.hamburger');
const navMenu = document.getElementById("navMenu");
if (menuToggleBtn && navMenu) {
  menuToggleBtn.addEventListener('click', () => {
    navMenu.classList.toggle("show");
    const navMasuk = document.getElementById("navMasuk");
    if (navMasuk) navMasuk.classList.toggle("show");
  });
}

// Navbar scroll transparent → solid
const navbar = document.getElementById('navbar');
if (navbar) {
  window.addEventListener('scroll', function () {
    if (window.scrollY > 10) {
      navbar.classList.remove('navbar-transparent');
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.add('navbar-transparent');
      navbar.classList.remove('scrolled');
    }
  });
}

// Active Link Highlighting di Navbar
document.addEventListener('DOMContentLoaded', function () {
  const links = document.querySelectorAll('.menu a');
  const currentPath = window.location.pathname.split('/').pop();

  links.forEach(link => {
    const linkHref = link.getAttribute('href');
    if (linkHref === currentPath || (linkHref === "#home" && currentPath === "")) {
      link.classList.add('active');
    }
  });
});

// ==============================
// Dashboard Navigation Function
// ==============================
function showContent(contentId, event) {
    if (event) event.preventDefault();

    // Hapus active di semua menu sidebar
    document.querySelectorAll('.menu-item').forEach(item => {
        item.classList.remove('active');
    });

    // Tambahkan active di menu yang diklik
    if (event && event.currentTarget) {
        event.currentTarget.closest('.menu-item').classList.add('active');
    }

    // Sembunyikan semua konten
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active');
    });

    // Tampilkan konten yang dipilih
    const section = document.getElementById(contentId);
    if (section) {
        section.classList.add('active');
    }

    // ✅ Simpan ke localStorage supaya tetap di section ini meski reload
    localStorage.setItem("lastSection", contentId);
}

// ==============================
// Saat halaman selesai dimuat
// ==============================
document.addEventListener('DOMContentLoaded', function() {
    // Ambil section terakhir dari localStorage
    const lastSection = localStorage.getItem("lastSection") || "menu-konten";

    // Tampilkan section terakhir
    showContent(lastSection);

    // Tandai menu yang sesuai
    const activeMenu = document.querySelector(`.menu-item a[onclick*="${lastSection}"]`);
    if (activeMenu) {
        activeMenu.closest('.menu-item').classList.add('active');
    } else {
        // fallback → tandai menu pertama
        const firstMenuItem = document.querySelector('.menu-item');
        if (firstMenuItem) {
            firstMenuItem.classList.add('active');
        }
    }
});
