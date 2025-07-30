// // Cek elemen sebelum pakai
// const container = document.querySelector('.container');
// const registerBtn = document.querySelector('.register-btn');
// const loginBtn = document.querySelector('.login-btn');

// if (registerBtn && loginBtn && container) {
//   registerBtn.addEventListener('click', () => {
//     container.classList.add('active');
//   });

//   loginBtn.addEventListener('click', () => {
//     container.classList.remove('active');
//   });
// }

// //Toggle Password
// function togglePassword(inputId, iconSpan) {
//   const input = document.getElementById(inputId);
//   const icon = iconSpan.querySelector('i');

//   if (input && icon) {
//     if (input.type === "password") {
//       input.type = "text";
//       icon.classList.remove('bx-show');
//       icon.classList.add('bx-hide');
//     } else {
//       input.type = "password";
//       icon.classList.remove('bx-hide');
//       icon.classList.add('bx-show');
//     }
//   }
// }

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

// Active Link Highlighting
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
