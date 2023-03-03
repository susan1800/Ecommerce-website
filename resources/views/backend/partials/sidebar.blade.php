<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar" style="overflow: auto;">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>



    </ul>
</aside>
