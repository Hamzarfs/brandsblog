<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.brands.index') }}"
                class="nav-link {{ Route::is('admin.brands.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>Brands
                    <span class="badge badge-info right">{{ $brandsCount }}</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.category.index') }}"
                class="nav-link {{ Route::is('admin.category.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>Categories
                    <span class="badge badge-info right">{{ $CategoryCount }}</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.tags.index') }}"
                class="nav-link {{ Route::is('admin.tags.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>Tags
                    <span class="badge badge-info right">{{ $tagsCount }}</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.blogs.index') }}"
                class="nav-link {{ Route::is('admin.blogs.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>Blogs
                    <span class="badge badge-info right">{{ $blogsCount }}</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
