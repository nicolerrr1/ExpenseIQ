document.addEventListener('DOMContentLoaded', () => {

    const password = document.getElementById('password');

    if (!password) return;

    const bar = document.getElementById('strength-bar');
    const text = document.getElementById('strength-text');
    const rules = document.getElementById('password-rules');

    const lengthRule = document.getElementById('rule-length');
    const upperRule = document.getElementById('rule-upper');
    const numberRule = document.getElementById('rule-number');
    const symbolRule = document.getElementById('rule-symbol');

    password.addEventListener('input', () => {

        const value = password.value;

        let score = 0;

        const hasLength = value.length >= 8;
        const hasUpper = /[A-Z]/.test(value);
        const hasNumber = /\d/.test(value);
        const hasSymbol = /[^A-Za-z0-9]/.test(value);

        lengthRule.style.display = hasLength ? 'none' : 'list-item';
        upperRule.style.display = hasUpper ? 'none' : 'list-item';
        numberRule.style.display = hasNumber ? 'none' : 'list-item';
        symbolRule.style.display = hasSymbol ? 'none' : 'list-item';

        if (hasLength) score++;
        if (hasUpper) score++;
        if (hasNumber) score++;
        if (hasSymbol) score++;

        if (score <= 1) {

            text.innerHTML = "Weak";
            text.className = "text-red-600";

            bar.style.width = "25%";
            bar.className = "bg-red-500 h-2 rounded-full transition-all duration-300";

        } else if (score <= 3) {

            text.innerHTML = "Medium";
            text.className = "text-yellow-600";

            bar.style.width = "65%";
            bar.className = "bg-yellow-500 h-2 rounded-full transition-all duration-300";

        } else {

            text.innerHTML = "Strong";
            text.className = "text-green-600";

            bar.style.width = "100%";
            bar.className = "bg-green-500 h-2 rounded-full transition-all duration-300";

        }

        if (score === 4) {

            rules.style.display = "none";

        } else {

            rules.style.display = "block";

        }

        if (confirmPassword && confirmPassword.value.length > 0) {

            if (password.value === confirmPassword.value) {

                confirmMessage.textContent = "✔ Passwords match";
                confirmMessage.className =
                    "mt-2 text-sm font-medium text-green-600";

            } else {

                confirmMessage.textContent = "✖ Passwords do not match";
                confirmMessage.className =
                    "mt-2 text-sm font-medium text-red-600";

            }

        }

    });
    const confirmPassword = document.getElementById('confirm-password');
    const confirmMessage = document.getElementById('confirm-message');

    if (confirmPassword) {

        confirmPassword.addEventListener('input', () => {

            if (confirmPassword.value.length === 0) {

                confirmMessage.classList.add('hidden');
                return;

            }

            confirmMessage.classList.remove('hidden');

            if (password.value === confirmPassword.value) {

                confirmMessage.textContent = "✔ Passwords match";
                confirmMessage.className =
                    "mt-2 text-sm font-medium text-green-600";

            } else {

                confirmMessage.textContent = "✖ Passwords do not match";
                confirmMessage.className =
                    "mt-2 text-sm font-medium text-red-600";

            }

        });

    }

    // Show / Hide Password
    const togglePassword = document.getElementById('toggle-password');
    const passwordIcon = document.getElementById('password-icon');

    if (togglePassword) {

        togglePassword.addEventListener('click', () => {

            const isHidden = password.type === 'password';

            password.type = isHidden ? 'text' : 'password';

            passwordIcon.className = isHidden
                ? 'fa-solid fa-eye-slash'
                : 'fa-solid fa-eye';

        });

    }

    const toggleConfirmPassword = document.getElementById('toggle-confirm-password');
    const confirmPasswordIcon = document.getElementById('confirm-password-icon');

    if (toggleConfirmPassword) {

        toggleConfirmPassword.addEventListener('click', () => {

            const isHidden = confirmPassword.type === 'password';

            confirmPassword.type = isHidden ? 'text' : 'password';

            confirmPasswordIcon.className = isHidden
                ? 'fa-solid fa-eye-slash'
                : 'fa-solid fa-eye';

        });

    }
});