// Toggle Sidebar
function toggleSidebar() {
  const sidebar = document.querySelector(".sidebar");
  sidebar.classList.toggle("active");
}

// Confirmation Dialog for Delete Actions
function confirmDelete() {
  return confirm("Are you sure you want to delete this record?");
}
