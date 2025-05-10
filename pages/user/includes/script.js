function toggleMenu() {
    const sidebar = document.getElementById("sidebar");
    const content = document.getElementById("content");
  
    // Toggle the 'open' class to show or hide the sidebar
    sidebar.classList.toggle("open");
    content.classList.toggle("open");
  }
  