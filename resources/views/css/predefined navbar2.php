<nav class="navbar navbar-default navbar-static-top">
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
                    SMAN 78
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Forum<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/forum/post') }}"><span class="glyphicon glyphicon-user"></span>Post a Thread</a></li>
                                
                                <li><a href="{{ url('/forum/show') }}"><span class="glyphicon glyphicon-user"></span>View Forum</a></li>
                                
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Assignment<span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/assignment/show') }}"><span class="glyphicon glyphicon-user"></span>View Assignment</a></li>
                                
    
                                
                            </ul>
                        </li>                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                        <li><a href="{{{ url('/login') }}}">Login</a></li>
                        <!-- <li>{!! link_to_route('get_register', 'Register') !!}</li> -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Admin <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('profile/view') }}"><span class="glyphicon glyphicon-user"></span>View Profile</a></li>
                                
                                <!-- <li><a href="{{ url('#') }}"><i class="fa fa-qq"></i>Reset Password</a></li> -->

                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                </ul>
            </div>
        </div>
    </nav>