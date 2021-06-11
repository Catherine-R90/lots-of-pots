const toggle = document.querySelector(".mobile_toggle");
const menu = document.querySelector(".mobile_menu");
const logo = document.querySelector("#mobile_logo");
const cart = document.querySelector("#mobile_cart");

// TOGGLE MOBILE MENU
function toggleMenu() {
    if (menu.classList.contains("active")) {
        menu.classList.remove("active");

        // SHOW LOGO AND CART
        logo.style.display="block";
        cart.style.display="flex";

        // ADD MENU ICON
        toggle.querySelector("a").innerHTML = "<i class='fas fa-bars'></i>";        

    } else {
        menu.classList.add("active");

        // HIDE LOGO AND CART
        logo.style.display="none";
        cart.style.display="none";

        // ADD CLOSE ICON
        toggle.querySelector("a").innerHTML = "<i id='close' class='far fa-window-close'></i>";
    }
}

toggle.addEventListener("click", toggleMenu, false);

const items = document.querySelectorAll(".mobile_item");

// ACTIVATE SUBMENU
function toggleItem() {
    if (this.classList.contains("mobile_submenu-active")) {

        this.classList.remove("mobile_submenu-active");

    } else if (menu.querySelector(".mobile_submenu-avtive")) {

        menu.querySelector(".mobile_submenu-active").classList.remove("mobile_submenu-active");
        this.classList.add("mobile_submenu-active");

    } else {

        this.classList.add("mobile_submenu-active");

    }
}

for (let item of items) {
    if (item.querySelector(".mobile_submenu")) {

        item.addEventListener("click", toggleItem, false);
        item.addEventListener("keypress", toggleItem, false);
    }
}