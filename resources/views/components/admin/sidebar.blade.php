<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('admin.users*')?'active':'collapsed' }}  " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsUsers"
                aria-expanded="false" aria-controls="collapseLayoutsUsers">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                Users
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->routeIs('admin.users*')?'show':'' }}" id="collapseLayoutsUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('admin.users.index')?'active':'' }}" href="{{ route('admin.users.index') }}">Users List</a>
                    <a class="nav-link {{ request()->routeIs('admin.users.create')?'active':'' }}" href="{{ route('admin.users.create') }}">Create a New User</a>
                </nav>
            </div>
            <a class="nav-link {{ request()->routeIs('admin.customers*')?'active':'collapsed' }}  " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2"
                aria-expanded="false" aria-controls="collapseLayouts2">
                <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden=""></i></i></div>
                Customers
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->routeIs('admin.customers*')?'show':'' }}" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('admin.customers.index')?'active':'' }}" href="{{ route('admin.customers.index') }}">Customer List</a>
                    <a class="nav-link {{ request()->routeIs('admin.customers.create')?'active':'' }}" href="{{ route('admin.customers.create') }}">Register a New Customer</a>
                </nav>
            </div>
            <a class="nav-link {{ request()->routeIs('admin.menu_categories*')?'active':'collapsed' }}  " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3"
                aria-expanded="false" aria-controls="collapseLayouts3">
                <div class="sb-nav-link-icon"><i class="fas fa-columns" aria-hidden=""></i></i></div>
                Menu Category
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->routeIs('admin.menu_categories*')?'show':'' }}" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('admin.menu-categories.index')?'active':'' }}" href="{{ route('admin.menu-categories.index') }}">Menu Category List</a>
                    <a class="nav-link {{ request()->routeIs('admin.menu-categories.create')?'active':'' }}" href="{{ route('admin.menu-categories.create') }}">Add a New Menu Category</a>
                </nav>
            </div>
            <a class="nav-link {{ request()->routeIs('admin.menu_items')?'active':'collapsed' }}  " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts4"
                aria-expanded="false" aria-controls="collapseLayouts4">
                <div class="sb-nav-link-icon"><i class="fa fa-cutlery" aria-hidden="true"></i></div>
                Menu Items
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->routeIs('admin.menu_items*')?'show':'' }}" id="collapseLayouts4" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('admin.menu-items.index')?'active':'' }}" href="{{ route('admin.menu-items.index') }}">Menu Items List</a>
                    <a class="nav-link {{ request()->routeIs('admin.menu-items.create')?'active':'' }}" href="{{ route('admin.menu-items.create') }}">Add a New Menu Item</a>
                </nav>
            </div>
            <a class="nav-link {{ request()->routeIs('admin.table_reservations')?'active':'collapsed' }}  " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts5"
                aria-expanded="false" aria-controls="collapseLayouts5">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Table Reservations
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->routeIs('admin.table_reservations*')?'show':'' }}" id="collapseLayouts5" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('admin.table-reservations.index')?'active':'' }}" href="{{ route('admin.table-reservations.index') }}">View All Table Reservations</a>
                    <a class="nav-link {{ request()->routeIs('admin.table-reservations.create')?'active':'' }}" href="{{ route('admin.table-reservations.create') }}">Create a New Table Reservation</a>
                </nav>
            </div>
            <a class="nav-link {{ request()->routeIs('admin.room_types')?'active':'collapsed' }}  " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts6"
                aria-expanded="false" aria-controls="collapseLayouts6">
                <div class="sb-nav-link-icon"><i class="fas fa-hotel"></i></div>
                Room Types
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->routeIs('admin.room_types*')?'show':'' }}" id="collapseLayouts6" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('admin.room-types.index')?'active':'' }}" href="{{ route('admin.room-types.index') }}">View All Room Types</a>
                    <a class="nav-link {{ request()->routeIs('admin.room-types.create')?'active':'' }}" href="{{ route('admin.room-types.create') }}">Create a New Room Type</a>
                </nav>
            </div>
            <a class="nav-link {{ request()->routeIs('admin.room_reservations')?'active':'collapsed' }}  " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts7"
                aria-expanded="false" aria-controls="collapseLayouts7">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-bed"></i></div>
                Room Reservations
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse {{ request()->routeIs('admin.room_reservations*')?'show':'' }}" id="collapseLayouts7" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('admin.room-reservations.index')?'active':'' }}" href="{{ route('admin.room-reservations.index') }}">View All Room Reservations</a>
                    <a class="nav-link {{ request()->routeIs('admin.room-reservations.create')?'active':'' }}" href="{{ route('admin.room-reservations.create') }}">Create a New Room Reservation</a>
                </nav>
            </div>


            <div class="sb-sidenav-menu-heading">Interface</div>

        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ auth()->user()->name }}
    </div>
</nav>