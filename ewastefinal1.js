// JavaScript for "Back to Top" Button
const upButton = document.getElementById("upButton");

// Show button when scrolling down
window.onscroll = function () {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        upButton.style.display = "block";
    } else {
        upButton.style.display = "none";
    }
};

// Scroll to top when button is clicked
upButton.onclick = function () {
    window.scrollTo({ top: 0, behavior: "smooth" });
};

document.addEventListener("DOMContentLoaded", () => {
    const toggleFormLink = document.getElementById("toggleForm");
    const formTitle = document.getElementById("formTitle");
    const formToggleText = document.getElementById("formToggleText");
    const loginForm = document.getElementById("loginForm");
    const signupForm = document.getElementById("signupForm");

    toggleFormLink.addEventListener("click", (event) => {
        event.preventDefault(); // Prevent the default behavior of the link

        if (loginForm.classList.contains("hidden")) {
            // Show the login form
            loginForm.classList.remove("hidden");
            signupForm.classList.add("hidden");
            formTitle.textContent = "Log in";
            formToggleText.innerHTML = `New to site? <a href="#" id="toggleForm">Sign up</a>`;
        } else {
            // Show the signup form
            loginForm.classList.add("hidden");
            signupForm.classList.remove("hidden");
            formTitle.textContent = "Sign up";
            formToggleText.innerHTML = `Already have an account? <a href="#" id="toggleForm">Log in</a>`;
        }
    });
});