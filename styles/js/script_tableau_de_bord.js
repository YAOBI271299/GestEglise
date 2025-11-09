const body = document.querySelector("body"),
    modeSombre = body.querySelector(".mode-sombre"),
    sidebar = body.querySelector("nav"),
    sidebarToggle = body.querySelector(".sidebar-toggle"),
    liensComptabilite = body.querySelector(".liens-comptabilité"),
    sousMenu = body.querySelector(".sous-menu");

// --- Mode sombre ---
modeSombre.addEventListener("click", () => {
    body.classList.toggle("sombre");
});

// --- Réduire / ouvrir la sidebar ---
sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});

// --- Ouvrir / fermer le sous-menu Comptabilité ---
liensComptabilite.addEventListener("click", (e) => {
    e.preventDefault(); // Empêche la redirection du lien
    sousMenu.classList.toggle("open");
});




