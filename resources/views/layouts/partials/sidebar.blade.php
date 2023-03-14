<aside id="sidebar_left" class="nano nano-light affix">
    <!-- Sidebar Left Wrapper  -->
    <div class="sidebar-left-content nano-content">

        <!-- Sidebar Header -->
        <header class="sidebar-header">

            <!-- Sidebar - Author -->
            <div class="sidebar-widget author-widget">
                <div class="media">
                    <a class="media-left profile-online" href="#">
                        <img src="{{\Auth::user()->profile_pic}}"  class="img-responsive" alt="">
                    </a>

                    <div class="media-body">
                        <div>Welcome</div>
                        <div class="media-author">{{\Auth::user()->first_name}}</div>
                    </div>
                </div>
            </div>

        </header>
        <!-- /Sidebar Header -->

        <!-- Sidebar Menu  -->
        <ul class="nav sidebar-menu">
            <li class="active">
                <a href="/">
                    <span class="sidebar-title">Dashboards</span>
                    <span class="sb-menu-icon fa fa-home"></span>
                </a>
            </li>
            @can('view roles')
                <li>
                    <a class="accordion-toggle" href="{{route('roles.index')}}">
                        <span class="sidebar-title">Roles</span>
                        <span class="caret"></span>
                        <span class="sb-menu-icon fa fa fa-group"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="{{route('roles.index')}}">
                                All Roles 
                            </a>
                        </li>
                        @can('create roles')
                            <li>
                                <a href="{{route('roles.create')}}">
                                    Create Role 
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view users')
                <li>
                    <a class="accordion-toggle" href="{{route('users.index')}}">
                        <span class="sidebar-title">Users</span>
                        <span class="caret"></span>
                        <span class="sb-menu-icon fa fa-user"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="{{route('users.index')}}">
                                All Users 
                            </a>
                        </li>
                        @can('create users')
                            <li>
                                <a href="{{route('users.create')}}">
                                    Create User 
                                </a>
                            </li>
                         @endcan
                    </ul>
                </li>
            @endcan
            @can('view courses')
                <li>
                    <a class="accordion-toggle" href="{{route('courses.index')}}">
                        <span class="sidebar-title">Courses</span>
                        <span class="caret"></span>
                        <span class="sb-menu-icon fa fa-book"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="{{route('courses.index')}}">
                                All Courses 
                            </a>
                        </li>
                        @can('create courses')
                            <li>
                                <a href="{{route('courses.create')}}">
                                    Create Course 
                                </a>
                            </li>
                         @endcan
                    </ul>
                </li>
            @endcan
            @can('view subjects')
                <li>
                    <a class="accordion-toggle" href="{{route('subjects.index')}}">
                        <span class="sidebar-title">Subjects</span>
                        <span class="caret"></span>
                        <span class="sb-menu-icon fa fa-file"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="{{route('subjects.index')}}">
                                All Subjects 
                            </a>
                        </li>
                        @can('create subjects')
                            <li>
                                <a href="{{route('subjects.create')}}">
                                Create Subject
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view instructors')
                <li>
                    <a class="accordion-toggle" href="{{route('instructors.index')}}">
                        <span class="sidebar-title">Instructors</span>
                        <span class="caret"></span>
                        <span class="sb-menu-icon fa fa-group"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="{{route('instructors.index')}}">
                                All Instructors 
                            </a>
                        </li>
                        @can('create instructors')
                            <li>
                                <a href="{{route('instructors.create')}}">
                                Create Instructor
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view students')
                <li>
                    <a class="accordion-toggle" href="{{route('students.index')}}">
                        <span class="sidebar-title">Students</span>
                        <span class="caret"></span>
                        <span class="sb-menu-icon fa fa-group"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="{{route('students.index')}}">
                                All Students 
                            </a>
                        </li>
                        @can('create students')
                            <li>
                                <a href="{{route('students.create')}}">
                                Create Student
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view schedules')
                <li>
                    <a class="accordion-toggle" href="{{route('schedules.index')}}">
                        <span class="sidebar-title">Schedules</span>
                        <span class="caret"></span>
                        <span class="sb-menu-icon fa fa-calendar"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="{{route('schedules.index')}}">
                                All Schedules 
                            </a>
                        </li>
                        @can('create schedules')
                            <li>
                                <a href="{{route('schedules.create')}}">
                                Create Schedule
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('view road tests')
            <li>
                <a class="accordion-toggle" href="{{route('road-tests.index')}}">
                    <span class="sidebar-title">Road Tests</span>
                    <span class="caret"></span>
                    <span class="sb-menu-icon fa fa-flag-o"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{route('road-tests.index')}}">
                            All Road Tests 
                        </a>
                    </li>
                    @can('create road tests')
                        <li>
                            <a href="{{route('road-tests.create')}}">
                            Create Road Test 
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

            @can('view pdf forms')
                <li>
                    <a class="accordion-toggle" href="{{route('pdf-forms.index')}}">
                        <span class="sidebar-title">Pdf Forms</span>
                        <span class="caret"></span>
                        <span class="sb-menu-icon fa fa-file"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="{{route('pdf-forms.index')}}">
                                All Pdf Forms 
                            </a>
                        </li>
                        @can('create courses')
                            <li>
                                <a href="{{route('pdf-forms.create')}}">
                                    Upload Pdf form 
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

        </ul>
        <!-- /Sidebar Menu  -->

    </div>
    <!-- /Sidebar Left Wrapper  -->

</aside>