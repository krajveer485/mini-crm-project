<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="{{ route('home') }}">MINI CRM</a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="" href="{{ route('home') }}" aria-expanded="false">

                <img src="{{ asset('img/menu-icon/1.svg')}}" alt>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="{{ Route::is('companies') ? 'mm-active' : '' }}">
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="{{ asset('img/menu-icon/2.svg')}}" alt>
                <span>Companies</span>
            </a>
            <ul>
                <li><a href="{{ route('companies.index') }}">List</a></li>
                <li><a href="{{ route('companies.create') }}">New Add</a></li>
            </ul>
        </li>
        <li class="{{ Route::is('employees') ? 'mm-active' : '' }}">
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="{{ asset('img/menu-icon/3.svg')}}" alt>
                <span>Employees</span>
            </a>
            <ul>
                <li><a href="{{ route('employees.index') }}">List</a></li>
                <li><a href="{{ route('employees.create') }}">New Add</a></li>
            </ul>
        </li>
    </ul>
</nav>