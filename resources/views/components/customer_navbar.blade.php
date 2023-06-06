<header class="header">
    <div class="logo">
        <h1>OIKU</h1>
    </div>
    <nav class="navbar">
        <a href="/customer/home">Home</a>
        <a href="/customer/catalog">Products</a>
        <a href="/customer/order">Order</a>
        <a href="/customer/history">History Order</a>
    </nav>
    <div class="menu-list">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="profile-down">
            <img src="{{ asset('storage/'.auth()->user()->profile_pic) }}" onclick="toggleMenu()">
        </div>
    </div>
    <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
            <div class="user-info">
                <img src="{{ asset('storage/'.auth()->user()->profile_pic) }}">
                <h2>{{ Auth::user()->name }}</h2>
            </div>
            <hr>
            <a href="/customer/profile" class="sub-menu-link">
                <p>Profile</p>
                <span>></span>
            </a>
            <a href="/logout" onclick="return clearCart()" class="sub-menu-link">
                <p>Log Out</p>
                <span>></span>
            </a>
        </div>
    </div>
</header>