// =====================
// Login / Register Form Toggle
// =====================
const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

if (registerBtn && loginBtn && container) {
  registerBtn.addEventListener('click', () => {
    container.classList.add('active');
  });

  loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
  });
}

// =====================
// Toggle Password
// =====================
function togglePassword(inputId, iconSpan) {
  const input = document.getElementById(inputId);
  const icon = iconSpan.querySelector('i');

  if (input && icon) {
    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove('bx-show');
      icon.classList.add('bx-hide');
    } else {
      input.type = "password";
      icon.classList.remove('bx-hide');
      icon.classList.add('bx-show');
    }
  }
}

// =====================
// Toggle Menu (Hamburger)
// =====================
const menuToggleBtn = document.querySelector('.hamburger');
const navMenu = document.getElementById("navMenu");
if (menuToggleBtn && navMenu) {
  menuToggleBtn.addEventListener('click', () => {
    navMenu.classList.toggle("show");
    const navMasuk = document.getElementById("navMasuk");
    if (navMasuk) navMasuk.classList.toggle("show");
  });
}

// =====================
// Navbar Scroll Effect
// =====================
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

// =====================
// Active Link Highlighting (Public Menu)
// =====================
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

// =====================
// Dashboard Navigation Functions
// =====================
function showContent(contentId, event = null) {
  if (event) event.preventDefault();

  // Hapus active dari semua menu
  document.querySelectorAll('.menu-item').forEach(item => {
    item.classList.remove('active');
  });

  // Tambah active ke menu yang diklik
  if (event && event.currentTarget) {
    event.currentTarget.closest('.menu-item').classList.add('active');
  }

  // Sembunyikan semua section
  document.querySelectorAll('.content-section').forEach(section => {
    section.classList.remove('active');
  });

  // Tampilkan section sesuai id
  const target = document.getElementById(contentId);
  if (target) {
    target.classList.add('active');
  }

  // Simpan section terakhir ke localStorage
  localStorage.setItem("lastSection", contentId);
}

// =====================
// Initialize Dashboard
// =====================
document.addEventListener('DOMContentLoaded', function () {
  // Ambil section terakhir dari localStorage, default "menu-konten"
  let lastSection = localStorage.getItem("lastSection") || "menu-konten";

  // Tampilkan kembali section terakhir
  showContent(lastSection);

  // Tandai menu yang sesuai dengan section terakhir
  const activeMenu = document.querySelector(`.menu-item a[onclick*="${lastSection}"]`);
  if (activeMenu) {
    activeMenu.parentElement.classList.add("active");
  } else {
    // Kalau ga ada, set default menu pertama
    const firstMenuItem = document.querySelector('.menu-item');
    if (firstMenuItem) firstMenuItem.classList.add('active');
  }
});
