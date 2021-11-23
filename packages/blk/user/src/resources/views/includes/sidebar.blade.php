<!-- BEGIN: SideNav-->
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="#!"><img class="show-on-medium-and-down hide-on-med-and-up" alt="materialize logo"/><span class="logo-text hide-on-med-and-down">{{config('app.name')}}</span></a></h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="#bold" ><a  href="{{url('/dashboard')}}" class=" {{ request()->is('dashboard*') ? 'active' : ''}}"><i class="material-icons dp48">face</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
        </li>
        <li class="#bold"><a  href="{{url('/kyc')}}" class=" {{ request()->is('kyc*') ? 'active' : ''}}"><i class="material-icons dp48">chrome_reader_mode</i><span class="menu-title" data-i18n="Dashboard">Kyc Management</span></a>
        </li>
        <li class="#bold"><a  href="{{url('/loan')}}" class=" {{ request()->is('loan*') ? 'active' : ''}}"><i class="material-icons dp48">content_paste</i><span class="menu-title" data-i18n="Dashboard">Loan Request </span></a>
        </li>
        <li class="#bold"><a  href="{{url('/your-loans')}}" class=" {{ request()->is('your-loans*') ? 'active' : ''}}"><i class="material-icons dp48">add_to_queue</i><span class="menu-title" data-i18n="Dashboard">Your Loans </span></a>
        </li>
    </ul>
</aside>
    
<!-- END: SideNav-->    
