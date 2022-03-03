<!--APP-SIDEBAR-->
<a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" id="sidebarbutton" href="#"></a><!-- sidebar-toggle-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{ url('/' . ($page = 'dashboard')) }}">
            <h2 class="text-purple-gradient">Diori</h2>
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar"  id="sidebarbutton" href="#"></a>
            <!-- sidebar-toggle-->
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-info">
                <h6 class=" mb-0 text-dark"><i id="profilepicture" class="fa fa-user-circle-o fa-sm text-black fs-30 mr-2 mt-2"></i>{{ Auth::user()->name }}</h6>
                <span class="text-muted app-sidebar__user-name text-sm">{{ Auth::user()->position }}</span>
            </div>
        </div>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        {{ csrf_field() }}
        <div class="sidebar-navs">

            <ul class="nav  nav-pills-circle">

                <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Profile" >
                    <a class=" nav-link text-center ml-8 mr-5 btn btn-purple-gradient btn-sm rounded-pill py-3 px-3" href="{{ route('employee-profile') }}">
                        <i class="fe fe-user text-white"></i>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">
                    <button  class="nav-link text-center m-2 btn btn-purple-gradient btn-sm rounded-pill py-3 px-3">
                        <i class="fe fe-power text-white"></i>
                    </button>
                </li>
            </ul>

        </div>
    </form>
    <ul class="side-menu">
        <li>
            <span class="side-menu__label">MENU</span>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('dashboard-employee') }}"><i
                    class="side-menu__icon ti-dashboard"></i><span class="side-menu__label">Dashboard</span></a>
            @php
                use Carbon\Carbon;
                    $currentMonth = Carbon::now()->format('m');
                    $currentYear = Carbon::now()->format('Y');
            @endphp
            <a class="side-menu__item" href="{{ route('extract-history',['month'=>$currentMonth,'year'=>$currentYear]) }}"><i class="side-menu__icon ti-home"></i><span
                        class="side-menu__label">History</span></a>
            <a class="side-menu__item" href="{{ route('calendar') }}"><i class="side-menu__icon ti-calendar"></i><span
                    class="side-menu__label">Calendar</span></a>
        </li>
        @if(Auth::user()->getRoleNames()[0] !== "employee")
        <li>
            <span class="side-menu__label">ACCESS</span>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('dashboard-admin') }}"><i
                        class="side-menu__icon ti-bookmark"></i><span class="side-menu__label">Switch to Admin</span></a>

        </li>
        @endif
    </ul>
</aside>
<!--/APP-SIDEBAR-->
