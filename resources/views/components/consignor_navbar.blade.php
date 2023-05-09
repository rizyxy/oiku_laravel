<header class="header">
    <div class="logo">
        <h1>OIKU</h1>
    </div>
    <nav class="navbar">
        <a href="/consignor/product">Your Product</a>
        <a href="/consignor/transaction">Transaction</a>
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
                <h2>Consignor</h2>
            </div>
            <hr>
            <a href="/consignor/profile" class="sub-menu-link">
                <p>Profile</p>
                <span>></span>
            </a>
            <a href="/consignor/product" class="sub-menu-link">
                <p>Manage Product</p>
                <span>></span>
            </a>
            <a href="/logout" class="sub-menu-link">
                <p>Log Out</p>
                <span>></span>
            </a>
        </div>
    </div>
</header>