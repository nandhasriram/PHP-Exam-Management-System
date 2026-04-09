// Example of simple form validation
document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  form.addEventListener("submit", function (event) {
    let email = document.querySelector('input[name="email"]').value;
    let password = document.querySelector('input[name="password"]').value;

    if (email === "" || password === "") {
      alert("Please fill out all required fields.");
      event.preventDefault(); // Stop form submission if fields are empty
    }
  });
});
