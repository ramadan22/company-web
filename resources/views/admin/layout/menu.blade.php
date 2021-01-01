<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ url('admin/aboutus') }}" class="nav-link" menu="about">
                <i class="nav-icon fas fa-user"></i>
                <p>Admin</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('admin/aboutus') }}" class="nav-link" menu="about">
                <i class="nav-icon fas fa-users"></i>
                <p>Users</p>
            </a>
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
        <li class="nav-header">Content</li>
        <li class="nav-item">
            <a href="{{ url('admin/banner') }}" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>Banner</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('admin/news') }}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>News</p>
            </a>
        </li>
    </ul>
</nav>
