<div>
    <nav class="navbar navbar-default navbar-fixed-top ">
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
                    Numidia Jobs
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img  src="{{ asset('storage/' . Auth::user()->photo) }}" alt="an image here" style="hight:30px; width:30px; border-radius: 100px;" >
                              {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>

                                       <a href="/profile/{{auth()->id()}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>My Profile</a>
                                       <a href="/cvs/{{auth()->id()}} /cvs"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>My Cv's</a>
                                       <a href="/cvs/create"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Create New CV</a>
                                       <a href="/profile/{{auth()->id()}}/edit"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Edit profile</a>
                                       <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                         <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>  Logout
                                       </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
