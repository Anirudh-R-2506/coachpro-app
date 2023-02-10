<ul class="sidebar-nav">
    <li class="sidebar-header">
       Your Institute
    </li>


    <li class="sidebar-item" id="{{ Nav::isRoute('institute.dashboard.profile.index') }}">
        <a class="sidebar-link" href="{{ route('institute.dashboard.profile.index') }}">
            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Institute Profile</span>
        </a>
    </li>
    
    <a data-bs-target="#operations" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
        <i class="align-middle" data-feather="truck"></i>
        <span class="align-middle">Operations</span>
    </a>
    <ul id="operations" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
        <li class="sidebar-item">
            <a class="sidebar-link" href="#">Leads</a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="#">Bookings</a>
        </li>
    </ul>
    
 </ul>
