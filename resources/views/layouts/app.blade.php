<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
        *{
            font-family: "Segoe UI";
            font-weight: 200;
        }
        body{
            background: #f2f2f2;

        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top ">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/idea.svg" alt="logo" width="30px" height="30px">
                    </a>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <b>{{ config('app.name', 'Laravel') }}</b>
                    </a>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav ">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}" class="">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @elseif(isMentor())
                            <li><a href="{{ route('createCourse') }}">New course</a></li>
                            <li><a href="{{ route('courses') }}">My courses</a></li>
                            <li><a href="#">Students</a></li>
                        @elseif(isAdmin())
                            <li><a href="{{ route('ReviewCV') }}">Mentors</a></li>
                            <li><a href="{{ route('Allcourses') }}">Courses</a></li>
                            <li><a href="{{ route('Allstudents') }}">Students</a></li>
                        @esleif(isStudent())
                            <li><a href="{{ route('courseLibrary') }}">Library</a></li>
                            <li><a href="{{ route('courseLibrary') }}">My courses</a></li>
                        @endif


                          @if(Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                          @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        {{--<script src="/js/app.js"></script>--}}
    </div>
</body>
</html>
