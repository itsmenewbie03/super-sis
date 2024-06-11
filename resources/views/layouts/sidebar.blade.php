<aside id="sidebar" class="sidebar">

    <i class="bi bi-x-lg toggle-sidebar-btn d-block d-sm-block d-md-block d-lg-block d-xl-none"></i>

    <div class="sidebar-header">
        <a href="#">
            <img src="{{ asset('assets/img/logo.png') }}" class="sidebar-logo" alt="" />
        </a>
    </div>

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading">HOME</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <li class="nav-heading">PAGES</li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('students.index') ? '' : 'collapsed' }}" href="{{ route('students.index') }}">
                <i class="bi bi-people"></i>
                <span>Students</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('subjects.index') ? '' : 'collapsed' }}" href="{{ route('subjects.index') }}">
                <i class="bi bi-book"></i>
                <span>Subjects</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('grades.index') ? '' : 'collapsed' }}" href="{{ route('grades.index') }}">
                <i class="bi bi-bar-chart"></i>
                <span>Grades</span>
            </a>
        </li>

    </ul>

  </aside>