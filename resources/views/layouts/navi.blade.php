<nav class="navbar navbar-expand-md navbar-dark navbar-laravel" style="background: rgb(39, 49, 60);color: #fff !important;" >
    <div class="container" >
        @if(isset($user_permission) && in_array('portal', $user_permission))
            <a class="navbar-brand" href="{{ url('/Portal') }}">
                The Institute
            </a>
        @else
            <a class="navbar-brand" href="{{ url('/') }}">
                The Institute
            </a>
        @endif
        @php
            $user_permission = App\Role::getAllMyPermission(\Auth::user()->role_id);

        @endphp

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @if(in_array('list-user', $user_permission) || in_array('list-student', $user_permission))
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-users"></i> People <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(in_array('list-user', $user_permission))
                                <a class="dropdown-item" href="/users">
                                    Manage Users
                                </a>
                            @endif

                            @if(in_array('list-student', $user_permission))
                                <a class="dropdown-item" href="/students">
                                    Manage Students
                                </a>
                            @endif
                        </div>
                    </li>
                @endif

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-building"></i> Academics <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/grades">
                            Manage Grades
                        </a>
                        <a class="dropdown-item" href="/subjects">
                            Manage Subjects
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-book"></i>Learning Resources <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/grades">
                            Timetable
                        </a>
                        <a class="dropdown-item" href="/calender">
                            Calender
                        </a>
                        <a class="dropdown-item" href="/ebooks">
                            E-books
                        </a>
                    </div>
                </li>
                @if(in_array('list-module', $user_permission))
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-cogs"></i> Settings <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/modules">
                                Modules
                            </a>
                            <a class="dropdown-item" href="/roles">
                                Access & Permissions
                            </a>
                            <a class="dropdown-item" href="/">
                                Audit Settings
                            </a>
                        </div>
                    </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest

                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user"></i> {{ Auth::user()->first_name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="">
                                {{\Auth::user()->getRole(\Auth::user()->role_id)}}
                            </a>
                            <a class="dropdown-item" href="/profile/{{ \Auth::user()->id }}">
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="">
                                {{ __('Change Password') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                {{ __('Logout') }}
                            </a>
                        </div>

                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
