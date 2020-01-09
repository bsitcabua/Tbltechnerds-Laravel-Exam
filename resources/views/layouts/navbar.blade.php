<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Laravel - Exam</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="ti-settings"></i>
                        <p>{{ auth()->check() ? auth()->user()->first_name : 'Account' }}</p>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        @if(! auth()->check())
                            <li><a href="{{ url('/login') }}">Sign In</a></li>
                            <li><a href="{{ url('/signup') }}">Sign Up</a></li>
                        @else
                            <li><a href="{{ url('/profile') }}">Profile</a></li>
                            <li onclick="return confirm('Logout your account?')"><a href="{{ url('/logout') }}">Logout</a></li>
                        @endif
                        
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>
    