<div class="app-menu">

    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="/" class="logo-light">
            <img src="/assets/images/logo-light.png" alt="logo" class="logo-lg">
            <img src="/assets/images/logo-sm.png" alt="small logo" class="logo-sm">
        </a>

        <!-- Brand Logo Dark -->
        <a href="/" class="logo-dark">
            <img src="/assets/images/logo-dark.png" alt="dark logo" class="logo-lg">
            <img src="/assets/images/logo-sm.png" alt="small logo" class="logo-sm">
        </a>
    </div>

    <!-- menu-left -->
    <div class="scrollbar">
        <!--- Menu -->
        <ul class="menu">

            <li class="menu-title">Navigation</li>

            <li class="menu-item">
                <a href="/"  class="menu-link">
                    <span class="menu-icon"><i data-feather="airplay"></i></span>
                    <span class="menu-text"> Dashboard</span>
                </a>
            </li>

            @can('view roles')
                <li class="menu-item">
                    <a href="#roleMenu" data-bs-toggle="collapse" class="menu-link {{isParentRoute('roles')}}">
                        <span class="menu-icon"> <i class=" fas fa-user-tag"></i></span>
                        <span class="menu-text"> Roles </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="roleMenu">
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="{{route('roles.index')}}" class="menu-link {{ isActiveRoute('roles.index') }}">
                                    <span class="menu-text">All Roles</span>
                                </a>
                            </li>
                            @can('create roles')
                                <li class="menu-item">
                                    <a href="{{route('roles.create')}}" class="menu-link {{ isActiveRoute('roles.create') }}">
                                        <span class="menu-text">Create Role</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
            @can('view users')
                <li class="menu-item">
                    <a href="#userMenu" data-bs-toggle="collapse" class="menu-link {{isParentRoute('users')}}">
                        <span class="menu-icon"> <i class="fas fa-users"></i></span>
                        <span class="menu-text"> Users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="userMenu">
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="{{route('users.index')}}" class="menu-link {{ isActiveRoute('users.index') }}">
                                    <span class="menu-text">All Users</span>
                                </a>
                            </li>
                            @can('create users')
                                <li class="menu-item">
                                    <a href="{{route('users.create')}}" class="menu-link {{ isActiveRoute('users.create') }}">
                                        <span class="menu-text">Create User</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
            @can('view courses')
                <li class="menu-item">
                    <a href="#courseMenu" data-bs-toggle="collapse" class="menu-link {{isParentRoute('courses')}}">
                        <span class="menu-icon"> <i class=" fas fa-book"></i></span>
                        <span class="menu-text"> Courses </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="courseMenu">
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="{{route('courses.index')}}" class="menu-link {{ isActiveRoute('courses.index') }}">
                                    <span class="menu-text">All Courses</span>
                                </a>
                            </li>
                            @can('create courses')
                                <li class="menu-item">
                                    <a href="{{route('courses.create')}}" class="menu-link {{ isActiveRoute('courses.create') }}">
                                        <span class="menu-text">Create Course</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
            @can('view subjects')
                <li class="menu-item">
                    <a href="#subjectMenu" data-bs-toggle="collapse" class="menu-link {{isParentRoute('subjects')}}">
                        <span class="menu-icon"> <i class="fas fa-book-open"></i></span>
                        <span class="menu-text"> Subjects </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="subjectMenu">
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="{{route('subjects.index')}}" class="menu-link {{ isActiveRoute('subjects.index') }}">
                                    <span class="menu-text">All Subjects</span>
                                </a>
                            </li>
                            @can('create subjects')
                                <li class="menu-item">
                                    <a href="{{route('subjects.create')}}" class="menu-link {{ isActiveRoute('subjects.create') }}">
                                        <span class="menu-text">Create Subject</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
            @can('view instructors')
                <li class="menu-item">
                    <a href="#instructorMenu" data-bs-toggle="collapse" class="menu-link {{isParentRoute('instructors')}}">
                        <span class="menu-icon"><i class=" fas fa-user-tie me-1"></i></span>
                        <span class="menu-text"> Instructors </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="instructorMenu">
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="{{route('instructors.index')}}" class="menu-link {{ isActiveRoute('instructors.index') }}">
                                    <span class="menu-text">All Instructors</span>
                                </a>
                            </li>
                            @can('create instructors')
                                <li class="menu-item">
                                    <a href="{{route('instructors.create')}}" class="menu-link {{ isActiveRoute('instructors.create') }}">
                                        <span class="menu-text">Create Instructor</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
            @can('view students')
                <li class="menu-item">
                    <a href="#studentMenu" data-bs-toggle="collapse" class="menu-link {{isParentRoute('students')}}">
                        <span class="menu-icon"><i class= "fas fa-user-graduate me-1"></i></i></span>
                        <span class="menu-text"> Students </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="studentMenu">
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="{{route('students.index')}}" class="menu-link {{ isActiveRoute('students.index') }}">
                                    <span class="menu-text">All Students</span>
                                </a>
                            </li>
                            @can('create students')
                                <li class="menu-item">
                                    <a href="{{route('students.create')}}" class="menu-link {{ isActiveRoute('students.create') }}">
                                        <span class="menu-text">Create Student</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
            @can('view schedules')
                <li class="menu-item">
                    <a href="#scheduleMenu" data-bs-toggle="collapse" class="menu-link {{isParentRoute('schedules')}}">
                        <span class="menu-icon"> <i class=" fas fa-calendar"></i></span>
                        <span class="menu-text"> Schedules </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="scheduleMenu">
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="{{route('schedules.index')}}" class="menu-link {{ isActiveRoute('schedules.index') }}">
                                    <span class="menu-text">All Schedules</span>
                                </a>
                            </li>
                            @can('create schedules')
                                <li class="menu-item">
                                    <a href="{{route('schedules.create')}}" class="menu-link {{ isActiveRoute('schedules.create') }}">
                                        <span class="menu-text">Create Schedule</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
            @can('view road tests')
                <li class="menu-item">
                    <a href="#roadTestMenu" data-bs-toggle="collapse" class="menu-link {{isParentRoute('road-tests')}}">
                        <span class="menu-icon"> <i class="fas fa-car"></i></span>
                        <span class="menu-text">  Road Tests  </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="roadTestMenu">
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="{{route('road-tests.index')}}" class="menu-link {{ isActiveRoute('road-tests.index') }}">
                                    <span class="menu-text"> All Road Tests </span>
                                </a>
                            </li>
                            @can('create road tests')
                                <li class="menu-item">
                                    <a href="{{route('road-tests.create')}}" class="menu-link {{ isActiveRoute('road-tests.create') }}">
                                        <span class="menu-text">Create Road Test</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
            @can('view pdf forms')
                <li class="menu-item">
                    <a href="#pdfFormMenu" data-bs-toggle="collapse" class="menu-link {{isParentRoute('pdf-forms')}}">
                        <span class="menu-icon"> <i class="fab fa-wpforms"></i></span>
                        <span class="menu-text">  Pdf Forms  </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="pdfFormMenu">
                        <ul class="sub-menu">
                            <li class="menu-item">
                                <a href="{{route('pdf-forms.index')}}" class="menu-link {{ isActiveRoute('pdf-forms.index') }}">
                                    <span class="menu-text"> All Pdf Forms </span>
                                </a>
                            </li>
                            @can('create pdf forms')
                                <li class="menu-item">
                                    <a href="{{route('pdf-forms.create')}}" class="menu-link {{ isActiveRoute('pdf-forms.create') }}">
                                        <span class="menu-text"> Upload Pdf form </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
            @endcan
        </ul>
        <!--- End Menu -->
        <div class="clearfix"></div>
    </div>
</div>

    