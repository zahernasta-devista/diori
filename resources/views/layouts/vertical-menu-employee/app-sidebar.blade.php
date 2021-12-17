<!--APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{ url('/' . $page='dashboard') }}">
            <h2 class="text-success">Diori</h2>
        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{URL::asset('assets/images/users/10.jpg')}}" alt="user-img" class="avatar-xl rounded-circle">
            </div>
            <div class="user-info">
                <h6 class=" mb-0 text-dark">{{Auth::user()->name}}</h6>
                <span class="text-muted app-sidebar__user-name text-sm">{{Auth::user()->position}}</span>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        {{ csrf_field() }}
    <div class="sidebar-navs">
        <ul class="nav  nav-pills-circle">
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Profile" >
                <a class="nav-link text-center ml-8 mr-5 btn btn-success btn-sm rounded-pill" href="{{ route('employee-profile') }}">
                    <i class="fe fe-user text-white "></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">
                <button class="nav-link text-center m-2 btn btn-success btn-sm rounded-pill py-3 px-3">
                    <i class="fe fe-power text-white"></i>
                </button>
            </li>
        </ul>
    </div>
    </form>
    <ul class="side-menu">
        <li><h3>Menu</h3></li>
        <li class="slide">
            <a class="side-menu__item"  href="{{ route('dashboard') }}"><i class="side-menu__icon ti-dashboard"></i><span class="side-menu__label">Dashboard</span></a>
            <a class="side-menu__item"  href="{{ route('work-log') }}"><i class="side-menu__icon ti-timer"></i><span class="side-menu__label-">Work Log</span></a>
            <a class="side-menu__item"  href="{{ route('calendar') }}"><i class="side-menu__icon ti-calendar"></i><span class="side-menu__label">Calendar</span></a>
    </ul>
</aside>
<!--/APP-SIDEBAR-->
