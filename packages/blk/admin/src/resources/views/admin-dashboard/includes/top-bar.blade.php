<nav class="drawer accordion drawer-light bg-white" id="drawerAccordion">
    <div class="drawer-menu">
        <div class="nav">
            <div class="drawer-menu-divider d-sm-none"></div>
            <div class="drawer-menu-heading">Admin</div>
            <a class="nav-link mdc-ripple-upgraded {{ request()->is('users/list*') ? 'active' : '' }}"  href="{{url('/users/list')}}">
                <div class="nav-link-icon"><i class="material-icons">account_circle</i></div>
                User Management
            </a>
            <a class="nav-link mdc-ripple-upgraded {{ request()->is('admin/kyc-list*') ? 'active' : ''}}" href="{{url('/admin/kyc-list')}}">
                <div class="nav-link-icon"><i class="material-icons">description</i></div>
                KYC Management
            </a>
            <a class="nav-link mdc-ripple-upgraded {{ request()->is('admin/request-list*') ? 'active' : '' }}" href="{{url('/admin/request-list')}}">
                <div class="nav-link-icon"><i class="material-icons">view_compact</i></div>
                Initial Enquiry Management
            </a>
            <a class="nav-link mdc-ripple-upgraded {{ request()->is('admin/approved*') ? 'active' : '' }}" href="{{url('/admin/approved')}}">
                <div class="nav-link-icon"><i class="material-icons">widgets</i></div>
                Approved Loans
            </a>
        </div>
    </div>
</nav>
