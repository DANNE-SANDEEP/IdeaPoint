const forms = document.querySelector(".forms"),
      pwShowHide = document.querySelectorAll(".eye-icon"),
      links = document.querySelectorAll(".link");

pwShowHide.forEach(eyeIcon =>{
    eyeIcon.addEventListener("click", () =>{
        let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password")

        pwFields.forEach(password => {
            if(password.type === "password"){
                password.type = "text";
                eyeIcon.classList.replace("bi-eye-slash", "bi-eye");
                return;
            }
            else{
            password.type = "password";
            eyeIcon.classList.replace("bi-eye", "bi-eye-slash");
        }
        })
    })
})

links.forEach(link => {
    link.addEventListener("click", e => {
        e.preventDefault();
        forms.classList.toggle("show-signup");
    })
})

document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const emailField = document.querySelector('input[type="email"]');
    const passwordField = document.querySelector('input[type="password"]');
    const errorMsg = document.createElement('div');
    errorMsg.style.color = 'red';
    errorMsg.style.marginTop = '10px';

    form.appendChild(errorMsg);

    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent form from submitting

        const defaultUsername = 'sandeep_danne';
        const defaultPassword = 'admin';

        const enteredUsername = emailField.value;
        const enteredPassword = passwordField.value;

        if (enteredUsername === defaultUsername && enteredPassword === defaultPassword) {
            window.location.href = 'nextpage.html'; // Redirect to the next page
        } else {
            errorMsg.textContent = 'Wrong credentials. Please try again.';
        }
    });
});
