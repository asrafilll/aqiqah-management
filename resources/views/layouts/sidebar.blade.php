<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item {{\Request::is('order*') ? 'menu-open' : ''}}" class="menu @yield('order')">
            <a href="#" class="nav-link @yield('order')">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Order Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="padding-left: 25px;">
                <li class="nav-item">
                    <a href="{{route('order.create')}}" class="nav-link @yield('order')" style="width: 100%">
                        <p>New Order</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('order.index') }}" class="nav-link" style="width: 100%">
                        <p>Order List</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <p>
                    Roles
                </p>
            </a>
        </li>   
        {{-- <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users-cog"></i>
                <a href="{{route('admin.create')}}" class="nav-link @yield('order')" style="width: 100%">
                    <p>User</p>
                </a>
            </a>
        </li>    --}}
    </ul>
</nav>