<nav class="navbar navbar-expand-md navbar-dark navbar-laravel" style="background: rgb(39, 49, 60);color: #fff !important;" >
    <div class="container" >

        <a class="navbar-brand" href="{{ url('/Portal') }}">
            {{ \Config::get('my_values.CLIENT') }} - Portal
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-book"></i>Learning Resources <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/timetable">
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
