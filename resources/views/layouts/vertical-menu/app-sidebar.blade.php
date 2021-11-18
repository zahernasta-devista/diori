<!--APP-SIDEBAR-->


                <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
                <aside class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="{{ url('/' . $page='index') }}">
                            <h2>Diori</h2>
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
                    </div>
                    <div class="app-sidebar__user">
                        <div class="dropdown user-pro-body text-center">
                            <div class="user-pic">
                                <img src="{{URL::asset('assets/images/users/10.jpg')}}" alt="user-img" class="avatar-xl rounded-circle">
                            </div>
                            <div class="user-info">
                                <h6 class=" mb-0 text-dark">{{Auth::User()->name}}</h6>
                                <span class="text-muted app-sidebar__user-name text-sm">{{Auth::user()->position}}</span>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        {{ csrf_field() }}
                        <div class="sidebar-navs">

                            <ul class="nav  nav-pills-circle">

                                <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Profile" >
                                    <a class="nav-link text-center ml-8 mr-5 btn btn-primary btn-sm rounded-pill" href="{{ route('admin-profile') }}">
                                        <i class="fe fe-user text-white"></i>

                                    </a>

                                </li>

                                <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">
                                    <a class="nav-link text-center m-2 btn btn-primary btn-sm rounded-pill" href="{{ route('logout') }}">

                                        <i class="fe fe-power text-white"></i>

                                    </a>

                                </li>

                            </ul>

                        </div>
                    </form>
                    <ul class="side-menu">
                        <li><h3>Main</h3></li>
                        <li class="slide">
                           <a class="side-menu__item" href="{{ url('/' . $page='users') }}" ><i class="side-menu__icon ti-home"></i><span class="side-menu__label">Employees</span></a>
                        </li>
                            <a class="side-menu__item"  href="{{ route('projects') }}"><i class="side-menu__icon ti-layout-accordion-separated"></i><span class="side-menu__label">Projects</span></a>
                            <a class="side-menu__item"  href="{{ route('customers') }}"><i class="side-menu__icon ti-agenda"></i><span class="side-menu__label">Customers</span></a>

                        <li><h3>Elements</h3></li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-panel"></i><span class="side-menu__label">Components</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="{{route('dashboard') }}" class="slide-item"> Dashboard</a></li>
                                <li><a href="{{ route('empty') }}" class="slide-item"> Search by Date</a></li>

                            </ul>
                        </li>

                    </ul>
                </aside>
<!--/APP-SIDEBAR-->
