<div class="brand-logo">
    <a href="{{ route('home') }}">
        <img src="{{ asset('/admin') }}/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
        <img src="{{ asset('/admin') }}/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
    </a>
    <div class="close-sidebar" data-toggle="left-sidebar-close">
        <i class="ion-close-round"></i>
    </div>
</div>
<div class="menu-block customscroll">
    <div class="sidebar-menu">
        <ul id="accordion-menu">

            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-library"></span><span class="mtext">Companies</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('companies.index') }}">Manage Companies</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-library"></span><span class="mtext">Employees</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{ route('employees.index') }}">Manage Employees</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>