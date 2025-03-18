document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript Loaded!"); // Debugging

    let sidebar = document.getElementById("sidebar");
    let content = document.getElementById("content");
    let sidebarToggle = document.getElementById("sidebarCollapse");

    if (!sidebar || !content || !sidebarToggle) {
        console.error("Error: Sidebar atau tombol tidak ditemukan!");
        return;
    }

    sidebarToggle.addEventListener("click", function () {
        console.log("Sidebar Toggle Clicked!"); // Debugging
        
        sidebar.classList.toggle("collapsed");
        content.classList.toggle("full-width");
    });
});
