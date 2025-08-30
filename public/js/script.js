// ============================
// Toggle Register / Login Form
// ============================
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

// ============================
// Toggle Password
// ============================
function togglePassword(inputId, iconSpan) {
  const input = document.getElementById(inputId);
  const icon = iconSpan.querySelector('i');

  if (input && icon) {
    if (input.type === "password") {
      input.type = "text";
      icon.classList.replace('bx-show', 'bx-hide');
    } else {
      input.type = "password";
      icon.classList.replace('bx-hide', 'bx-show');
    }
  }
}

// ============================
// Toggle Menu (Hamburger)
// ============================
const menuToggleBtn = document.querySelector('.hamburger');
const navMenu = document.getElementById("navMenu");
if (menuToggleBtn && navMenu) {
  menuToggleBtn.addEventListener('click', () => {
    navMenu.classList.toggle("show");
    const navMasuk = document.getElementById("navMasuk");
    if (navMasuk) navMasuk.classList.toggle("show");
  });
}

// ============================
// Navbar scroll → solid
// ============================
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

// ============================
// Active Link Highlight (Navbar)
// ============================
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

// ============================
// Dashboard Navigation
// ============================
function showContent(contentId, event) {
  if (event) event.preventDefault();

  // Remove active class from all menu items
  document.querySelectorAll('.menu-item').forEach(item => {
    item.classList.remove('active');
  });

  // Add active class to clicked menu item
  if (event) event.currentTarget.closest('.menu-item').classList.add('active');

  // Hide all sections
  document.querySelectorAll('.content-section').forEach(section => {
    section.classList.remove('active');
  });

  // Show selected section
  document.getElementById(contentId).classList.add('active');

  // Simpan ke localStorage
  localStorage.setItem('activeSection', contentId);
}

// ============================
// Init Dashboard
// ============================
document.addEventListener('DOMContentLoaded', function () {
  const activeSection = localStorage.getItem('activeSection') || 'menu-konten';

  // Tampilkan konten terakhir
  document.querySelectorAll('.content-section').forEach(sec => sec.classList.remove('active'));
  document.getElementById(activeSection).classList.add('active');

  // Highlight sidebar menu terakhir
  document.querySelectorAll('.menu-item').forEach(item => item.classList.remove('active'));
  const activeLink = document.querySelector(`a[onclick*="${activeSection}"]`);
  if (activeLink) activeLink.closest('.menu-item').classList.add('active');
});
