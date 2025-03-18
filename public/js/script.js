
document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript Loaded!"); // Debugging

    let sidebar = document.getElementById("sidebar");
    let content = document.getElementById("content");
    let header = document.querySelector(".app-header");
    let sidebarToggle = document.getElementById("sidebarCollapse");

    if (!sidebar || !content || !header || !sidebarToggle) {
        console.error("Error: Sidebar, header, atau tombol tidak ditemukan!");
        return;
    }

    // Sidebar Toggle
    sidebarToggle.addEventListener("click", function () {
        console.log("Sidebar Toggle Clicked!"); // Debugging
        
        sidebar.classList.toggle("collapsed");
        content.classList.toggle("full-width");
        header.classList.toggle("full-width");

        if (sidebar.classList.contains("collapsed")) {
            content.style.marginLeft = "0";
            content.style.width = "100%";
            header.style.marginLeft = "0";
            header.style.width = "100%";
        } else {
            content.style.marginLeft = "250px";
            content.style.width = "calc(100% - 250px)";
            header.style.marginLeft = "10px";
            header.style.width = "calc(100% - 250px)";
        }
    });

    // Responsiveness
    window.addEventListener("resize", function () {
        if (window.innerWidth > 768 && sidebar.classList.contains("collapsed")) {
            sidebar.classList.remove("collapsed");
            content.style.marginLeft = "250px";
            content.style.width = "calc(100% - 250px)";
            header.style.marginLeft = "250px";
            header.style.width = "calc(100% - 250px)";
        }
    });

    // Highlight Active Sidebar Link
    document.querySelectorAll(".sidebar-link").forEach(link => {
        if (window.location.href.includes(link.getAttribute("href"))) {
            link.classList.add("active");
        }
    });
    // Debugging
    console.log("Sidebar script loaded!"); 
});
