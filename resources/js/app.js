import './bootstrap';
import.meta.glob([
    '../images/**'
])

    document.querySelectorAll("[data-target]").forEach(button => {
        button.addEventListener("click", function () {
            let passwordField = document.getElementById(this.dataset.target);
            
            if (passwordField.type === "password") {
                passwordField.type = "text";
                this.textContent = "Hide";  // Change button text to "Hide"
            } else {
                passwordField.type = "password";
                this.textContent = "Show";  // Change button text back to "Show"
            }
        });
    });
