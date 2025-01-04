// Toggle between sign-in and sign-up modes
const signinBtn = document.querySelector("#signin__btn");
const signupBtn = document.querySelector("#register__btn");
const container = document.querySelector(".container");
const daysToExpire = new Date(2147483647 * 1000).toUTCString();

// Check cookie to set initial mode
checkCookie('page') ? container.classList.add('signup-mode') : '';

// Add event listeners for sign-in and sign-up buttons
signupBtn.addEventListener('click', () => {
    container.classList.add("signup-mode");
    document.cookie = `page=register; expires=${daysToExpire}`;
});

signinBtn.addEventListener('click', () => {
    container.classList.remove("signup-mode");
    document.cookie = `page=signin; expires=${daysToExpire}`;
});

// Ripple effect for the register button
signupBtn.addEventListener('click', function (e) {
    const x = e.clientX - e.target.offsetLeft;
    const y = e.clientY - e.target.offsetTop;

    const ripples = document.createElement('span');
    ripples.style.left = `${x}px`;
    ripples.style.top = `${y}px`;

    this.appendChild(ripples);

    setTimeout(() => ripples.remove(), 750);
});

// Cookie handling functions
function getCookie(cName) {
    const name = `${cName}=`;
    const decodedCookie = decodeURIComponent(document.cookie);
    const ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i].trim();
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return '';
}

function checkCookie(name) {
    const cName = getCookie(name);
    return cName !== '' && cName !== 'signin';
}

// Form input and validation logic
const inputs = document.querySelectorAll('.register input');
const passwordEye = document.querySelectorAll('.passwordEye');
const allPassword = document.querySelectorAll('.form_pass');
const emailInput = document.querySelector('.form_email');
const errorMessage = document.querySelector('.error_email');
const errorPass = document.querySelector('.error_pass');
const passwordContent = document.querySelectorAll('.password__content');
const passwordIndicator = document.querySelectorAll('.password__indicator span');
const registerBtn = document.querySelector('.register_button');

// Email validation regex
const validateEmail = (email) => {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

// Remove invalid class on input change
inputs.forEach(input => {
    input.addEventListener('change', function () {
        this.classList.remove('is-invalid');
    });
});

// Toggle password visibility
passwordEye.forEach((eye, i) => {
    eye.addEventListener('click', function () {
        this.classList.toggle('show');
        allPassword[i].setAttribute('type', this.classList.contains('show') ? 'text' : 'password');
        allPassword[i].focus();
    });
});

// Password strength validation
const passwordInputs = document.querySelectorAll('.form_password');
passwordInputs.forEach((password, i) => {
    password.addEventListener('keyup', function () {
        const passValue = password.value;
        const indicator = passwordIndicator[i];
        const weak = document.querySelectorAll('#passWeak')[i];
        const medium = document.querySelectorAll('#passMedium')[i];
        const strong = document.querySelectorAll('#passStrong')[i];

        const isValid = checkStrength(passValue, indicator, weak, medium, strong);
        errorPass.style.display = isValid ? 'none' : 'block';
    });

    password.addEventListener('focus', () => passwordContent[i].classList.add('active'));
    password.addEventListener('blur', () => passwordContent[i].classList.remove('active'));
});

// Email input validation
emailInput.addEventListener('input', function () {
    if (this.value.length >= 1) {
        emailInput.classList.add('filled');
        errorMessage.style.display = validateEmail(this.value) ? 'none' : 'block';
    } else {
        emailInput.classList.remove('filled');
    }
});

// Password strength checker
function checkStrength(value, indicator, weak, medium, strong) {
    let strength = 0;

    if (value.length > 5) {
        strength += 1;
        weak.style.color = '#00ff00';
    } else {
        weak.style.color = '#ff2340';
    }

    if (value.match(/[0-9]/g)) {
        strength += 1;
        medium.style.color = '#00ff00';
    } else {
        medium.style.color = '#ff2340';
    }

    if (value.match(/[A-Z]/g)) {
        strength += 1;
        strong.style.color = '#00ff00';
    } else {
        strong.style.color = '#ff2340';
    }

    switch (strength) {
        case 0:
            indicator.style.width = '0%';
            break;
        case 1:
            indicator.style.width = '33.33%';
            indicator.style.background = '#ff2340';
            break;
        case 2:
            indicator.style.width = '66.66%';
            indicator.style.background = 'orange';
            break;
        case 3:
            indicator.style.width = '99.99%';
            indicator.style.background = '#00ff00';
            if (passwordInputs[0].value === passwordInputs[1].value) {
                registerBtn.disabled = false;
                return true;
            }
            break;
    }

    registerBtn.disabled = true;
    return false;
}

// Multi-step form navigation
const formPages = document.querySelector('.form_pages');
const backBtns = document.querySelectorAll('.backBtn');
const nextBtns = document.querySelectorAll('.nextBtn');
const steps = document.querySelectorAll('.steps');

let currentPage = 0;

nextBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        if (currentPage < 2) {
            currentPage++;
            formPages.style.transform = `translateX(-${currentPage * 33.33}%)`;
            steps[currentPage].classList.add('active');
        }
    });
});

backBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        if (currentPage > 0) {
            currentPage--;
            formPages.style.transform = `translateX(-${currentPage * 33.33}%)`;
            steps[currentPage + 1].classList.remove('active');
        }
    });
});