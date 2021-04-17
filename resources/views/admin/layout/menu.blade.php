<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link" menu="dashboard">
                <i class="nav-icon fas fa-home"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item" parent="admin">
            <a href="#" class="nav-link" menu="admin">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Admin
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/admin') }}" class="nav-link" menu="admin-list">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Admin List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/activity') }}" class="nav-link" menu="admin-activity">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Admin Activity</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ url('admin/aboutus') }}" class="nav-link" menu="user">
                <i class="nav-icon fas fa-users"></i>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item" parent="opportunity">
            <a href="#" class="nav-link" menu="opportunity">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                    Opportunity
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/opportunity') }}" class="nav-link" menu="opportunity-list">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Opportunity List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/opportunity-applied') }}" class="nav-link" menu="opportunity-applied">
                        <i class="far fa-circle nav-icon"></i>
                        <p>User Has Applied</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item" parent="general">
            <a href="#" class="nav-link" menu="general">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    General
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/aboutus') }}" class="nav-link" menu="about">
                        <i class="far fa-circle nav-icon"></i>
                        <p>About Us</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/contactus') }}" class="nav-link" menu="contact">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Contact Us</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item" parent="sites">
            <a href="#" class="nav-link" menu="sites">
                <i class="nav-icon fas fa-globe-europe"></i>
                <p>
                    Sites
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('admin/banner') }}" class="nav-link" menu="banner">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Banner</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('admin/news') }}" class="nav-link" menu="news">
                        <i class="far fa-circle nav-icon"></i>
                        <p>News</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-header">Authentication</li>
        <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>Logout</p>
            </a>
        </li>
    </ul>
</nav>
