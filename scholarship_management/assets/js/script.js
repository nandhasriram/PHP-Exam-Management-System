// Custom JavaScript

// Example of toggling sidebar on small devices
document.addEventListener("DOMContentLoaded", function () {
  const sidebarToggle = document.querySelector(".sidebar-toggle");

  sidebarToggle.addEventListener("click", function () {
    const sidebar = document.querySelector(".sidebar");
    sidebar.classList.toggle("active");
  });
});

// Example of alert for form submission
function submitFormAlert() {
  alert("Form has been submitted successfully!");
}
