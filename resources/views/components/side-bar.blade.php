<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand py-3 px-3 justify-content-center_">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="h4 mb-0 fw-bold text-dark">
                Staff Management
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        @if (auth()->check())
        <li class="menu-item {{ Request::routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        @endif

        @if (auth()->check())
        @can('Users')
        <li class="menu-item {{ Request::routeIs('users.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Layouts">Users</div>
            </a>

            <ul class="menu-sub">
                @can('Add User')
                <li class="menu-item {{ Request::routeIs('users.create') ? 'active' : '' }}">
                    <a href="{{ route('users.create') }}" class="menu-link">
                        <div data-i18n="Add User">Add User</div>
                    </a>
                </li>
                @endcan

                @can('View Users')
                <li class="menu-item {{ Request::routeIs('users.index') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <div data-i18n="View Users">View Users</div>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        @endcan
        @endif

        @if (auth()->check())
        @can('Roles')
        <li class="menu-item {{ Request::routeIs('roles.*') ? 'active open' : '' }}">
            <a href="{{ route('roles.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Boxicons">Roles</div>
            </a>
        </li>
        @endcan
        @endif

        @if (auth()->check())
        @can('Permissions')
        <li class="menu-item {{ Request::routeIs('permissions.*') ? 'active open' : '' }}">
            <a href="{{ route('permissions.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div data-i18n="Boxicons">Permissions</div>
            </a>
        </li>
        @endcan
        @endif
</aside>
<!-- / Menu -->