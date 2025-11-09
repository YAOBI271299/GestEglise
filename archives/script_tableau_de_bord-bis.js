document.addEventListener("DOMContentLoaded", () => {
    const body = document.body;
    const modeToggle = document.querySelector(".mode-sombre");

    if (!modeToggle) {
        console.error("⚠️ Élément .mode-sombre introuvable !");
        return;
    }

    modeToggle.addEventListener("click", (e) => {
        e.preventDefault(); // empêche le lien de recharger la page
        body.classList.toggle("sombre");

        // Sauvegarde du choix dans le localStorage
        if (body.classList.contains("sombre")) {
            localStorage.setItem("theme", "sombre");
        } else {
            localStorage.setItem("theme", "clair");
        }
    });

    // Appliquer le dernier thème choisi
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "sombre") {
        body.classList.add("sombre");
    }
});
