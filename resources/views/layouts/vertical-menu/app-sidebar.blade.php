<!--APP-SIDEBAR-->
                <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar"  id="sidebarbutton" href="#"></a><!-- sidebar-toggle-->
                <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
                <aside class="app-sidebar" >
                    <div class="side-header">
                        <a class="header-brand1" href="{{ url('/' . $page='dashboard') }}">
                            <h2 class="text-purple-gradient">Diori</h2>
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar"  id="sidebarbutton" href="#"></a><!-- sidebar-toggle-->
                    </div>
                    <div class="app-sidebar__user">
                        <div class="dropdown user-pro-body text-center">
                            <div class="user-info">
                                <h6 class=" mb-0 text-dark" ><i id="profilepicture" class="fa fa-user-circle-o fa-sm text-black fs-30 mr-2 mt-2"></i>{{Auth::User()->name}} </h6>
                                <span class="text-muted app-sidebar__user-name text-sm">{{Auth::user()->position}}</span>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        {{ csrf_field() }}
                        <div class="sidebar-navs">
                            <ul class="nav nav-pills-circle">
                                <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Profile" >
                                    <a class="nav-link text-center mr-5 ml-8 btn btn-purple-gradient btn-sm rounded-pill py-3 px-3" href="{{ route('admin-profile') }}">
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
                        <li class="slide">
                            <span class="side-menu__label">MAIN</span>

                        </li>
                        @php
                            use Carbon\Carbon;
                                $currentMonth = Carbon::now()->format('m');
                                $currentYear = Carbon::now()->format('Y');
                         @endphp
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="{{route('dashboard-admin') }}"><i class="side-menu__icon ti-dashboard"></i><span class="side-menu__label">Dashboard</span></a>
                            <a class="side-menu__item" data-toggle="slide" href="{{route('filters',['month'=>$currentMonth,'year'=>$currentYear]) }}"><i class="side-menu__icon ti-search"></i><span class="side-menu__label">Summary</span></a>

                        </li>
                        <li>
                        <span class="side-menu__label">ELEMENTS</span>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item"  href="{{ route('admins') }}"><i class="side-menu__icon ti-key"></i><span class="side-menu__label">Admins</span></a>
                           <a class="side-menu__item" href="{{ url('/' . $page='users') }}" ><i class="side-menu__icon ti-home"></i><span class="side-menu__label">Employees</span></a>
                            <a class="side-menu__item"  href="{{ route('projects') }}"><i class="side-menu__icon ti-layout-accordion-separated"></i><span class="side-menu__label">Projects</span></a>
                            <a class="side-menu__item"  href="{{ route('customers') }}"><i class="side-menu__icon ti-agenda"></i><span class="side-menu__label">Customers</span></a>
                        </li>
                        <li>
                            <span class="side-menu__label">ACCESS</span>
                        </li>
                        <li class="slide">
                        <a class="side-menu__item" href="{{route('dashboard-employee')}}"><i class="side-menu__icon ti-bookmark"></i><span class="side-menu__label">Switch to Employee</span></a>
                        <a class="side-menu__item" href="{{route('employee-project-page',Auth::user()->id)}}" ><i class="side-menu__icon ti-file"></i><span class="side-menu__label">Assign</span></a>
                        </li>
                    </ul>
                </aside>
<!--/APP-SIDEBAR-->
