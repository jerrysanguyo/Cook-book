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

const userMenuButton = document.getElementById('user-menu-button');
const userMenu = document.getElementById('user-menu');

userMenuButton.addEventListener('click', () => {
    userMenu.classList.toggle('hidden');
});

// Close the dropdown if clicking outside
document.addEventListener('click', (event) => {
    if (!userMenu.contains(event.target) && !userMenuButton.contains(event.target)) {
        userMenu.classList.add('hidden');
    }
});
const ingredientMenuButton = document.getElementById('ingredient-menu-button');
const ingredientMenu = document.getElementById('ingredient-menu');

ingredientMenuButton.addEventListener('click', () => {
    ingredientMenu.classList.toggle('hidden');
});

// Close the dropdown if clicking outside
document.addEventListener('click', (event) => {
    if (!ingredientMenu.contains(event.target) && !ingredientMenuButton.contains(event.target)) {
        ingredientMenu.classList.add('hidden');
    }
});