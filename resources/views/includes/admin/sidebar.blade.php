<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">ADMIN PANEL</li>
        <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
                <i class="fas fa-solid fa-comment"></i>
                <p>
                    Posts
                    <span class="badge badge-info right">{{$posts->total()}}</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
