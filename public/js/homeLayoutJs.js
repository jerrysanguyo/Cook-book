const menuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

menuButton.addEventListener('click', () => {
    if (mobileMenu.classList.contains('max-h-0')) {
        // Open the menu
        mobileMenu.classList.remove('max-h-0');
        mobileMenu.classList.add('max-h-screen');
    } else {
        // Close the menu
        mobileMenu.classList.remove('max-h-screen');
        mobileMenu.classList.add('max-h-0');
    }
});

// Dropdown menu and actions dropdown
document.addEventListener("DOMContentLoaded", function () {
    const menus = [
        { button: "user-menu-button", menu: "user-menu" },
        { button: "ingredient-menu-button", menu: "ingredient-menu" }
    ];
    
    const dropdownButtons = document.querySelectorAll(".dropdown-toggle");
    let activeMenu = null;

    function toggleMenu(btn, menuEl) {
        event.stopPropagation();
        if (activeMenu && activeMenu !== menuEl) activeMenu.classList.add("hidden");
        menuEl.classList.toggle("hidden");
        activeMenu = menuEl.classList.contains("hidden") ? null : menuEl;
    }

    menus.forEach(({ button, menu }) => {
        const btn = document.getElementById(button);
        const menuEl = document.getElementById(menu);
        btn.addEventListener("click", () => toggleMenu(btn, menuEl));
    });

    dropdownButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            const dropdownMenu = document.getElementById(button.getAttribute("data-dropdown"));
            toggleMenu(button, dropdownMenu);
        });
    });

    document.addEventListener("click", () => {
        if (activeMenu) {
            activeMenu.classList.add("hidden");
            activeMenu = null;
        }
    });
});