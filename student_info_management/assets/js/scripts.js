// Basic script for toggling visibility of elements
document.addEventListener("DOMContentLoaded", function () {
  // Example function to toggle visibility of an element
  function toggleVisibility(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
      element.style.display =
        element.style.display === "none" ? "block" : "none";
    }
  }

  // Example usage
  document
    .getElementById("toggleButton")
    ?.addEventListener("click", function () {
      toggleVisibility("content");
    });
});
