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

function showContent(id, event) {
  // Sembunyikan semua konten
  const sections = document.querySelectorAll('.content-section');
  sections.forEach(section => section.style.display = 'none');

  // Tampilkan konten yang dipilih
  const selectedSection = document.getElementById(id);
  if (selectedSection) {
    selectedSection.style.display = 'block';
  }

  // Tambah efek active di sidebar
  const listDash = document.querySelectorAll('.list-dash');
  listDash.forEach(item => item.classList.remove('active'));

  if (event && event.currentTarget) {
    event.currentTarget.parentElement.classList.add('active');
  }
}

document.addEventListener('DOMContentLoaded', function () {
  showContent('menu-konten'); // konten default
});


// Dashboard Navigation Functions
function showContent(contentId, event) {
    event.preventDefault();
    
    // Remove active class from all menu items
    document.querySelectorAll('.menu-item').forEach(item => {
        item.classList.remove('active');
    });
    
    // Add active class to clicked menu item
    event.currentTarget.closest('.menu-item').classList.add('active');
    
    // Hide all content sections
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active');
    });
    
    // Show selected content
    document.getElementById(contentId).classList.add('active');
}

// Initialize dashboard when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Show menu content by default
    const menuKonten = document.getElementById('menu-konten');
    if (menuKonten) {
        menuKonten.classList.add('active');
    }
    
    // Set first menu item as active
    const firstMenuItem = document.querySelector('.menu-item');
    if (firstMenuItem) {
        firstMenuItem.classList.add('active');
    }
});

// Add this to your existing Laravel JavaScript file