<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ $asset['img'] }}/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ $asset['img'] }}/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->is('dashboard*') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard </p>

                    </a>
                </li>

                <li class="nav-item {{ request()->is('customer*') ? ' menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('customers') }}" class="nav-link   ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Customers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('customers') }}"
                                class="nav-link {{ request()->is('customers') ? ' active' : '' }}">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Customer List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('createCustomer') }}"
                                class="nav-link {{ request()->is('customers/create') ? ' active' : '' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        @if (request()->is('customer/*/edit'))
                            <li class="nav-item">
                                <a href="{{ route('editCustomer', ['customer' => $customer->id]) }}"
                                    class="nav-link {{ request()->is('customer/*/edit') ? ' active' : '' }}">
                                    <i class="fas fa-edit nav-icon"></i>
                                    <p>Edit</p>
                                </a>
                            </li>
                        @endif



                    </ul>
                </li>

                <!-- Billing -->
                <li class="nav-item {{ request()->is('billing*') ? ' menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('billings') }}" class="nav-link   ">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>
                            Billings

                        </p>
                    </a>

                </li>


                <!-- WORK ORDER -->
                <li class="nav-item {{ request()->is('billing*') ? ' menu-is-opening menu-open' : '' }}">
                    <a href="{{ route('billings') }}" class="nav-link   ">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            Work Order

                        </p>
                    </a>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
