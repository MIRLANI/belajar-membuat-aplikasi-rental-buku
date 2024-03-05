<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Rental Buku</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                MENU
            </li>
            <li class="sidebar-item {{ request()->route()->uri == 'dashboard' ? 'active' : '' }}">
                <a class="sidebar-link" href="/dashboard">
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ 
                                        request()->route()->uri == 'books' ||
                                        request()->route()->uri == 'books-add' ||
                                        request()->route()->uri == 'books-edit/{slug}' ? 'active' : '' }}">
                <a class="sidebar-link" href="/books">
                    <span class="align-middle">Books</span>
                </a>
            </li>
            <li class="sidebar-item {{ 
                                        request()->route()->uri == 'catagories' ||
                                        request()->route()->uri == 'catagories-add' ||
                                        request()->route()->uri == 'catagories-edit/{slug}' ||
                                        request()->route()->uri == 'catagories-delete/{slug}' ? 'active' : '' }}">
                <a class="sidebar-link" href="/catagories">
                    <span class="align-middle">Catagories</span>
                </a>
            </li>
            <li class="sidebar-item {{ 
                                        request()->route()->uri == 'users' ||
                                        request()->route()->uri == 'users-register' ||
                                        request()->route()->uri == 'users-detail/{slug}' ||
                                        request()->route()->uri == 'users-approve/{slug}' ||
                                        request()->route()->uri == 'users-ban' ||
                                        request()->route()->uri == 'users-restore/{slug}' ? 'active' : '' }}">
                <a class="sidebar-link" href="/users">
                    <span class="align-middle">Users</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->route()->uri == 'rent-log' ? 'active' : '' }}">
                <a class="sidebar-link" href="/rent-log">
                    <span class="align-middle">Rent Log</span>
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
