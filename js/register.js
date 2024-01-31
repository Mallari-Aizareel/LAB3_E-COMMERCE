

function togglePasswordVisibility() {
    const passwordInput = document.getElementById("floatingPassword");
    const passwordIcon = document.querySelector(".password__show-password img");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordIcon.style.color = "blue";
    } else {
        passwordInput.type = "password";
        passwordIcon.style.color = "black";
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const passwordIcon = document.querySelector(".password__show-password img");
    passwordIcon.addEventListener('click', togglePasswordVisibility);
});
