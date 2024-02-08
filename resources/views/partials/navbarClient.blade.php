<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Rental Buku</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                MENU
            </li>

            <li class="sidebar-item {{ request()->route()->uri == 'profile' ? 'active' : '' }}">
                <a class="sidebar-link" href="/profile">
                    <span class="align-middle">Profile</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/logout">
                    <span class="align-middle">Logout</span>
                </a>
            </li>


        </ul>


    </div>
</nav>
