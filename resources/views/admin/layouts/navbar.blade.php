<div class="navbar-custom">
    <div class="d-flex align-items-center">
        <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
        <div class="logo">TealAdmin</div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
        class="btn btn-logout btn-sm">
        Logout
    </a>
</div>
