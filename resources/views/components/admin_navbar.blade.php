<header class="header">
    <div class="logo">
        <h1>OIKU</h1>
    </div>
    <nav class="navbar">
        <a href="/admin/home">Products</a>
        <a href="/admin/take-order">Take Order</a>
        <a href="/admin/consignor">Consignor</a>
        <a href="/admin/customer">Customer</a>
        <a href="/admin/transaction">Transaction</a>
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
            <a href="/admin/home" class="sub-menu-link">
                <p>Manage Products</p>
                <span>></span>
            </a>
            <a href="/admin/take-order" class="sub-menu-link">
                <p>Take Order</p>
                <span>></span>
            </a>
            <a href="/admin/add-consignor" class="sub-menu-link">
                <p>Add Consignor</p>
                <span>></span>
            </a>
            <a href="/logout" class="sub-menu-link">
                <p>Log Out</p>
                <span>></span>
            </a>
        </div>
    </div>
</header>