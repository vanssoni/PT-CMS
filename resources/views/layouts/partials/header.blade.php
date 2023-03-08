 <header class="navbar navbar-fixed-top">
    <div class="navbar-logo-wrapper dark bg-dark">
        <a class="navbar-logo-image" href="/">
            <img src="/assets/img/logo.png" alt="" class="sb-l-o-logo">
            <img src="/assets/img/logo_small.png" alt="" class="sb-l-m-logo">
        </a>
    </div>
    <span id="sidebar_left_toggle" class="ad ad-lines navbar-nav navbar-left"></span>
    <form class="navbar-form navbar-left search-form square" role="search">
        <div class="input-group add-on">

            <input type="text" class="form-control" placeholder="Search" onfocus="this.placeholder=''"
                   onblur="this.placeholder='Search'">

            <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>

        </div>
    </form>
    <ul class="nav navbar-nav navbar-left">
        <li class="dropdown dropdown-fuse hidden-xs">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Quick Actions
                <span class="fa fa-chevron-down"></span>
            </a>
            <ul class="dropdown-menu w230" role="menu">
                {{-- @can('create users') --}}
                    <li><a href="{{route('users.create')}}">Create User</a></li>
                {{-- @endcan --}}
                {{-- @can('create students') --}}
                    <li><a href="{{route('students.create')}}">Create Student</a></li>
                {{-- @endcan --}}
                {{-- @can('create campus')
                    <li><a href="#">Create Campus</a></li>
                @endcan --}}
                {{-- @can('view students') --}}
                    <li class="divider"></li>
                    <li><a href="{{route('students.index')}}">Enrolled Students</a></li>
                {{-- @endcan --}}
            </ul>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown dropdown-fuse">
            <a href="#" class="dropdown-toggle mln" data-toggle="dropdown">
                <span class="hidden-xs hidden-sm"><span class="name">{{\Auth::user()->first_name}}</span> </span>
                <span class="fa fa-caret-down hidden-xs hidden-sm"></span>
                <span class="profile-online">
                    <img src="{{\Auth::user()->profile_pic}}" alt="avatar">
                </span>
            </a>
            <ul class="dropdown-menu list-group keep-dropdown w190" role="menu">
                <li class="list-group-item">
                    <a href="/profile">
                        Profile
                        <span class="fa fa-user"></span> 
                    </a>
                </li>
                <!-- <li class="list-group-item">
                    <a href="#">
                        Settings
                        <span class="fa fa-cog"></span> 
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        My Calendar
                        <span class="fa fa-calendar-o"></span> 
                    </a>
                </li>
                <li class="divider"></li>
                <li class="list-group-item">
                    <a href="#">
                        Help
                        <span class="fa fa-question-circle"></span> 
                    </a>
                </li> -->
                <li class="list-group-item">
                    <a href="{{ route('logout') }}">
                        Logout
                        <span class="fa fa-sign-out"></span> 
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right mr25">
        <li class="dropdown dropdown-fuse">
            <div class="navbar-btn btn-group">
                <button data-toggle="dropdown" class="btn dropdown-toggle">
                    <span class="fa fa-bell fs16"></span>
                </button>
                <button data-toggle="dropdown" class="btn dropdown-toggle fs10 bg-color-2 visible-xl">
                    8
                </button>
                <div class="dropdown-menu keep-dropdown w370 animated animated-shorter fadeIn activity-container timeline-container" role="menu">
                    <div class="panel activity-content mbn">
                        <div class="panel-menu">
                            <span class="panel-title fw600"> Activity reports</span>
                        </div>
                        <div class="panel-body scroller-navbar pn">
                            <ol class="timeline-list">
                                <li class="timeline-item">
                                    <div class="timeline-icon bg-timeline-massage">
                                        <span class="fa fa-envelope"></span>
                                    </div>
                                    <div class="timeline-desc">
                                        <b>John Doe</b> 
                                        Sent you a message.
                                        <a href="#">View now</a>
                                    </div>
                                    <div class="timeline-date">11:15am</div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-icon bg-timeline-info">
                                        <span class="fa fa-info"></span>
                                    </div>
                                    <div class="timeline-desc">
                                        <b>Admin</b> 
                                        created invoice:
                                        <a href="#">iPad Air</a>
                                    </div>
                                    <div class="timeline-date">9:59am</div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-icon bg-timeline-info">
                                        <span class="fa fa-info"></span>
                                    </div>
                                    <div class="timeline-desc">
                                        <b>Admin</b> 
                                        created invoice:
                                        <a href="#">iPhone 6s</a>
                                    </div>
                                    <div class="timeline-date">11:15am</div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-icon bg-timeline-massage">
                                        <span class="fa fa-envelope"></span>
                                    </div>
                                    <div class="timeline-desc">
                                        <b>Lara Johnes</b> Sent you a message.
                                        <a href="#">View now</a>
                                    </div>
                                    <div class="timeline-date">3:18pm</div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-icon bg-timeline-massage">
                                        <span class="fa fa-envelope"></span>
                                    </div>
                                    <div class="timeline-desc">
                                        <b>John Doe</b> 
                                        Sent you a message.
                                        <a href="#">View now</a>
                                    </div>
                                    <div class="timeline-date">11:15am</div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-icon bg-timeline-info">
                                        <span class="fa fa-info"></span>
                                    </div>
                                    <div class="timeline-desc">
                                        <b>Admin</b> 
                                        created invoice:
                                        <a href="#">iPad Air</a>
                                    </div>
                                    <div class="timeline-date">9:59am</div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-icon bg-timeline-info">
                                        <span class="fa fa-info"></span>
                                    </div>
                                    <div class="timeline-desc">
                                        <b>Admin</b> 
                                        created invoice:
                                        <a href="#">iPhone 6s</a>
                                    </div>
                                    <div class="timeline-date">11:15am</div>
                                </li>
                                <li class="timeline-item">
                                    <div class="timeline-icon bg-timeline-massage">
                                        <span class="fa fa-envelope"></span>
                                    </div>
                                    <div class="timeline-desc">
                                        <b>Lara Johnes</b> Sent you a message.
                                        <a href="#">View now</a>
                                    </div>
                                    <div class="timeline-date">3:18pm</div>
                                </li>
                            </ol>
                        </div>
                        <div class="panel-footer text-center">
                            <a href="#" class="btn"> View All </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</header>