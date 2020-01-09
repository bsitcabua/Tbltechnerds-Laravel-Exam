<div class="sidebar" data-background-color="white" data-active-color="danger">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                Hello {{ auth()->user()->first_name }}
            </a>
        </div>

        <ul class="nav">
            <li>
                <a href="{{ url('/contacts') }}">
                    <i class="fa fa-users"></i>
                    <p>Contacts</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/profile') }}">
                    <i class="ti-user"></i>
                    <p>Profile</p>
                </a>
            </li>
        </ul>
    </div>
</div>