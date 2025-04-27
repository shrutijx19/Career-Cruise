
let wrapper = document.querySelector('.wrapper');
let loginLink = document.querySelector('.login-link');
let registerLink = document.querySelector('.register-link');
document.addEventListener("DOMContentLoaded", function () {

    loginLink.addEventListener('click', () => {
        wrapper.classList.add('active');
    });
    registerLink.addEventListener('click', () => {
        wrapper.classList.remove('active');
    });
})