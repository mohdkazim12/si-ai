
document.addEventListener('DOMContentLoaded', function () {
    // Password Toggle for Login
    const togglePassword = document.getElementById('toggle-password');
    const password = document.getElementById('password');

    if (togglePassword && password) {
        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            togglePassword.innerHTML = type === 'password' ? '<i class="ri-eye-line"></i>' : '<i class="ri-eye-off-line"></i>';
        });
    }

    // Password Toggle for Registration
    const toggleConfirmPassword = document.getElementById('toggle-confirm-password');
    const confirmPassword = document.getElementById('password_confirmation');

    if (toggleConfirmPassword && confirmPassword) {
        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            toggleConfirmPassword.innerHTML = type === 'password' ? '<i class="ri-eye-line"></i>' : '<i class="ri-eye-off-line"></i>';
        });
    }

    // Tab Switching
    const emailTab = document.getElementById('email-tab');
    const googleTab = document.getElementById('google-tab');
    const emailForm = document.getElementById('email-login-form');
    const googleForm = document.getElementById('google-login-form');

    if (emailTab && googleTab && emailForm && googleForm) {
        emailTab.addEventListener('click', function () {
            emailTab.classList.add('text-primary', 'border-b-2', 'border-primary');
            googleTab.classList.remove('text-primary', 'border-b-2', 'border-primary');
            googleTab.classList.add('text-gray-500');
            emailForm.classList.remove('hidden');
            googleForm.classList.add('hidden');
        });

        googleTab.addEventListener('click', function () {
            googleTab.classList.add('text-primary', 'border-b-2', 'border-primary');
            emailTab.classList.remove('text-primary', 'border-b-2', 'border-primary');
            emailTab.classList.add('text-gray-500');
            googleForm.classList.remove('hidden');
            emailForm.classList.add('hidden');
        });
    }

    // Role Selection
    const roleBtns = document.querySelectorAll('.role-btn');

    roleBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            roleBtns.forEach(b => b.classList.remove('border-primary', 'bg-primary/5'));
            this.classList.add('border-primary', 'bg-primary/5');
        });
    });
});