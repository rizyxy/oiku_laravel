
function item(image, name, price) {
    this.image = image;
    this.name = name;
    this.price = price;
    this.count = 0;
}

function addItem(item) {

    var tempCart = [];

    var cart = JSON.parse(sessionStorage.getItem('cart'));

    for (key in cart) {
        tempCart.push(cart[key]);
    }

    if (tempCart.filter((obj) => obj.name === item.name).length === 0) {
        item.count = 1;
        tempCart.push(item);
    } else {
        var index = tempCart.map(function(e) {return e.name;}).indexOf(item.name);

        tempCart[index].count = parseInt(tempCart[index].count) + 1; 
    }

    sessionStorage.setItem('cart', JSON.stringify(tempCart));

    console.log(sessionStorage.getItem('cart'));
}

function clearCart() {
    sessionStorage.removeItem('cart');
}

function showCart() {

    console.log(sessionStorage.getItem('cart'));

}

function modifyQty(index, qty) {
    var cart = JSON.parse(sessionStorage.getItem('cart'));

    cart[index].count = qty;

    sessionStorage.setItem('cart', JSON.stringify(cart));

    location.reload()
}

function loadCart() {
    var cart = document.getElementById('cart-content');

    var cartData = JSON.parse(sessionStorage.getItem('cart'));

    if (cartData.length != 0) {
            
        for (key in cartData) {

            var name = cartData[key].name;

            cart.insertAdjacentHTML("afterend", `
            <div class="cart-box"><img src="${cartData[key].image}" alt="" class="cart-img">
            <div class="detail-box">
            <h2 class="cart-product-title">${name}</h2>
            <div class="cart-price">${cartData[key].price}</div>
            <input type="number" min="1" value="${cartData[key].count}" onchange="modifyQty(${key}, this.value)" class="cart-quantity"></div>
            <a class="remove-cart" onclick="removeCartItem(${key})">Remove</a></div>`)
        }
        
    }
}

function removeCartItem(index) {

    var cart = [];

    var cartData = JSON.parse(sessionStorage.getItem('cart'));

    for (const key in cartData) {
        if (key != index) {
            cart.push(cartData[key]);
        }
    }

    sessionStorage.setItem('cart', JSON.stringify(cart));

    console.log(sessionStorage.getItem('cart'));

    location.reload();
}

function loadCartTotal() {

    var cart = JSON.parse(sessionStorage.getItem('cart'));

    var formatter = Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'IDR'
    });

    var total = 0;

    for (const key in cart) {
        total = total + cart[key].price * cart[key].count;
    }

    document.getElementById('total-price').innerHTML = formatter.format(total);
}

function load() {
    loadCart();
    loadCartTotal();
}


