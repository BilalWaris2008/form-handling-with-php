// const form = document.getElementById('registerForm');
// const password = document.getElementById('password');
// const confirmPassword = document.getElementById('confirmPassword');
// const passwordStrength = document.getElementById('passwordStrength');

// // Password strength checker
// password.addEventListener('input', function () {
//     const value = password.value;
//     let strength = '';
//     let className = '';

//     if (value.length < 6) {
//         strength = 'Weak';
//         className = 'strength-weak';
//     } else if (value.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/)) {
//         strength = 'Strong';
//         className = 'strength-strong';
//     } else {
//         strength = 'Medium';
//         className = 'strength-medium';
//     }

//     passwordStrength.textContent = 'Strength: ' + strength;
//     passwordStrength.className = 'password-strength ' + className;
// });

// // Form validation
// form.addEventListener('submit', function (event) {
//     event.preventDefault();
//     event.stopPropagation();

//     let isValid = true;

//     // Password length validation
//     if (password.value.length < 6) {
//         password.classList.add('is-invalid');
//         isValid = false;
//     } else {
//         password.classList.remove('is-invalid');
//     }

//     // Confirm password match
//     if (password.value !== confirmPassword.value) {
//         confirmPassword.classList.add('is-invalid');
//         isValid = false;
//     } else {
//         confirmPassword.classList.remove('is-invalid');
//     }

//     // Bootstrap validation
//     if (!form.checkValidity()) {
//         isValid = false;
//     }

//     if (isValid) {
//         alert('Registration Successful!');
//         form.reset();
//         passwordStrength.textContent = '';
//     }

//     form.classList.add('was-validated');
// });
