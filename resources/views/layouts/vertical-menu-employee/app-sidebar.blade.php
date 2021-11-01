<!--APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{ url('/' . $page='index2') }}">
            <h2>Diori</h2>
        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{URL::asset('assets/images/users/10.jpg')}}" alt="user-img" class="avatar-xl rounded-circle">
            </div>
            <div class="user-info">
                <h6 class=" mb-0 text-dark">Alwan Mazen</h6>
                <span class="text-muted app-sidebar__user-name text-sm">Intern</span>
            </div>
        </div>
    </div>
    <div class="sidebar-navs">
        <ul class="nav  nav-pills-circle">
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Profile" >
                <a class="nav-link text-center m-2" href="{{ url('/' . $page='profile/employee') }}">
                    <i class="fe fe-user"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">
                <a class="nav-link text-center m-2" href="{{ url('/' . $page='login') }}">
                    <i class="fe fe-power"></i>
                </a>
            </li>
        </ul>
    </div>
    <ul class="side-menu">
        <li><h3>Menu</h3></li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-panel"></i><span class="side-menu__label">Elements</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{ url('/' . $page='index/employee') }}" class="slide-item"> Dashboard</a></li>
                <li><a href="{{ url('/' . $page='worklog') }}" class="slide-item"> Work Log</a></li>
                <li><a href="{{ url('/' . $page='calendar2') }}" class="slide-item"> Calendar</a></li>
            </ul>
        </li>

    </ul>
</aside>
<!--/APP-SIDEBAR-->
