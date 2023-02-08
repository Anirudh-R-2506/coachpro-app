<ul class="sidebar-nav">
    <li class="sidebar-header">
       Operations
    </li>


    <li class="sidebar-item {{ Nav::isRoute('admin.dashboard') }}">
        <a class="sidebar-link" href="#">
            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item {{ Nav::isRoute('admin.donations.index') }}">
        <a class="sidebar-link" href="#">
            <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Donations</span>
        </a>
    </li>

    <a data-bs-target="#operations" data-bs-toggle="collapse" class="sidebar-link collapsed" aria-expanded="false">
        <i class="align-middle" data-feather="truck"></i>
        <span class="align-middle">Operations</span>
    </a>
    <ul id="operations" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar" style="">
        <li class="sidebar-item">
            <a class="sidebar-link" href="#">Procurement list</a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="#">Volunteer roster (WIP)</a>
        </li>
    </ul>
    
 </ul>
