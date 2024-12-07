// Toggle between Sign In and Sign Up forms
function toggleForm(formType) {
    const signInForm = document.getElementById('signInForm');
    const signUpForm = document.getElementById('signUpForm');
    const signInBtn = document.getElementById('signInBtn');
    const signUpBtn = document.getElementById('signUpBtn');

    if (formType === 'signIn') {
        signInForm.style.display = 'block';
        signUpForm.style.display = 'none';
        signInBtn.classList.add('active');
        signUpBtn.classList.remove('active');
    } else {
        signInForm.style.display = 'none';
        signUpForm.style.display = 'block';
        signInBtn.classList.remove('active');
        signUpBtn.classList.add('active');
    }
}

// Handle login
function login() {
    const email = document.getElementById('signInEmail').value;
    const password = document.getElementById('signInPassword').value;

    if (email && password) {
        alert('Login successful!');
        window.location.href = 'webpage.html';
    } else {
        alert('Please fill in all fields.');
    }
}


// Handle sign-up
function signUp() {
    const email = document.getElementById('signUpEmail').value;
    const password = document.getElementById('signUpPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (email && password && confirmPassword) {
        if (password === confirmPassword) {
            alert('Account created successfully!');
            toggleForm('signIn');
        } else {
            alert('Passwords do not match.');
        }
    } else {
        alert('Please fill in all fields.');
    }
}
