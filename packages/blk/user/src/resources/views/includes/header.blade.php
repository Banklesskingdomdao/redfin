<!-- BEGIN: Header-->
<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-purple no-shadow">
            <div class="nav-wrapper">
                <ul class="navbar-list right">
                    
                    <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status"><img src="{{asset('user/assets/images/avatar/avatar-7.png')}}" alt="avatar"><i></i></span></a></li>
                </ul>
                <ul class="dropdown-content" id="profile-dropdown">
                    <li><a class="grey-text text-darken-1" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}<i class="material-icons">keyboard_tab</i></a></li>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                    </form>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- END: Header-->
