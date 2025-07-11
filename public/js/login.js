const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

registerBtn.addEventListener('click', () => {
    container.classList.add('active');
});

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
});

function togglePassword(inputId, iconSpan) {
  const input = document.getElementById(inputId);
  const icon = iconSpan.querySelector('i');

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
