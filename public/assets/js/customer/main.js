let menu = document.querySelector("#menu-btn")
let navbar = document.querySelector(".navbar")
let subMenu = document.getElementById("subMenu")

menu.onclick = () =>{
    menu.classList.toggle("fa-times")
    navbar.classList.toggle("active")
}


window.onscroll = () =>{
    menu.classList.remove("fa-times")
    navbar.classList.remove("active")
}

function toggleMenu(){
    subMenu.classList.toggle("open-menu");
}
function changeQuantity(change) {
    var quantityInput = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityInput.value);
    var newQuantity = currentQuantity + change;
    if (newQuantity >= 1) {
        quantityInput.value = newQuantity;
    }
}