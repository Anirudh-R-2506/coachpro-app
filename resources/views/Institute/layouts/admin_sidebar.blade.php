<script>

    sidebar = () => {
        return {
            toggleDropdown(id){
                let dropdown = document.getElementById(id);
                if(dropdown.classList.contains('show')){
                    dropdown.classList.remove('show');
                }else{
                    dropdown.classList.add('show');
                }
            },
        }
    }

</script>

<style>
 @media (min-width: 768px) {
  .animate {
    animation-duration: 0.3s;
    -webkit-animation-duration: 0.3s;
    animation-fill-mode: both;
    -webkit-animation-fill-mode: both;
  }
}

@keyframes slideIn {
  0% {
    transform: translateY(1rem);
    opacity: 0;
  }

  100% {
    transform: translateY(0rem);
    opacity: 1;
  }

  0% {
    transform: translateY(1rem);
    opacity: 0;
  }
}

@-webkit-keyframes slideIn {
  0% {
    -webkit-transform: transform;
    -webkit-opacity: 0;
  }

  100% {
    -webkit-transform: translateY(0);
    -webkit-opacity: 1;
  }

  0% {
    -webkit-transform: translateY(1rem);
    -webkit-opacity: 0;
  }
}

.slideIn {
  -webkit-animation-name: slideIn;
  animation-name: slideIn;
}

</style>

<style>
    .sidebar-header {
         color: #f3f4ff !important;
         font-size: 0.8rem !important;
         font-weight: 200 !important;
         text-transform: uppercase !important;
         letter-spacing: 1px !important;
         background-color: #3056d3 !important;
         margin-left: -1rem !important;
      }

      .sidebar, .sidebar-content {
         background-color: #3056d3 !important;
      }

      #active > .sidebar-link i, #active > .sidebar-link svg, #active > a.sidebar-link i, #active > a.sidebar-link svg {
         color: #0F1F52 !important;
      }

      .sidebar-link i, .sidebar-link svg, a.sidebar-link i, a.sidebar-link svg {
         color: inherit !important;
      }

      .sidebar-link i:hover, .sidebar-link svg:hover, a.sidebar-link i:hover, a.sidebar-link svg:hover {
         color: inherit !important;
      }

      .sidebar-item, .sidebar-link, a.sidebar-link, .sidebar-link, .sidebar-link a{
         color: #fff !important;
         font-size: 1rem !important;
         font-weight: 400 !important;
         text-transform: uppercase !important;
         letter-spacing: 0.5px !important;
         background-color: #3056d3 !important;
      }

      .sidebar-item > .sidebar-link:hover, .sidebar-link:hover, #active > .sidebar-link, #active > a.sidebar-link {
         color: #0F1F52 !important;
         background-color: #fff !important;
         font-weight: 600 !important;
         letter-spacing: 0.5px !important;
      }
      
      .sidebar-link, a.sidebar-link, .sidebar-link {
         background-color: #3056d3 !important;
         color: #fff !important;
         padding: 0.7rem 1rem !important;
         border-radius: 10px !important;
      }

      .dropdown-toggle::after {
         float: right;
         margin-top: 5%;
      }      
</style>

<ul class="sidebar-nav" style="padding: 0.5rem 0.5rem !important;" x-data="sidebar()">

    <li class="sidebar-header">
        Your Profile
    </li>

    <a class="is-flex sidebar-link collapsed dropdown-toggle" @click="toggleDropdown('profile')">
        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" class="rounded avatar img-fluid me-1" alt="Charles Hall" />
        <span class="align-middle">
            {{ auth()->user()->name }}
        </span>
    </a>
    <ul id="profile" class="mt-2 sidebar-dropdown list-unstyled collapse animate slideIn">
        <li class="mb-2 sidebar-item">
            <a class="sidebar-link" href="{{ route('institute.dashboard.user.index') }}">My Profile</a>
        </li>
        <li class="sidebar-item">
            <form action="{{ route('services.logout') }}" id="logoutForm" method="POST">@csrf</form>
            <a class="sidebar-link" onclick="document.getElementById('logoutForm').submit();">Log Out</a>
        </li>
    </ul>

    <li class="sidebar-header">
       Institute
    </li>

    <li class="mb-2 sidebar-item" id="{{ (strpos(Route::currentRouteName(), 'institute.dashboard.profile') !== false) ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('institute.dashboard.profile.index') }}">
            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Profile</span>
        </a>
    </li>

    <li class="mb-2 sidebar-item" id="{{ (strpos(Route::currentRouteName(), 'institute.dashboard.courses') !== false) ? 'active' : '' }}">
      <a class="sidebar-link" href="{{ route('institute.dashboard.courses.index') }}">
          <i class="align-middle" data-feather="database"></i> <span class="align-middle">Courses</span>
      </a>
    </li>

    <li class="mb-2 sidebar-item" id="{{ (strpos(Route::currentRouteName(), 'institute.dashboard.photos') !== false) ? 'active' : '' }}">
        <a class="sidebar-link" href="{{ route('institute.dashboard.photos.index') }}">
            <i class="align-middle" data-feather="camera"></i> <span class="align-middle">Photos</span>
        </a>
    </li>

    <li class="mb-2 sidebar-item" id="{{ (strpos(Route::currentRouteName(), 'institute.dashboard.faculties') !== false) ? 'active' : '' }}">
      <a class="sidebar-link" href="{{ route('institute.dashboard.faculties.index') }}">
          <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Faculties</span>
      </a>
    </li>

    <li class="sidebar-header">
      Operations
    </li>

    <li class="mb-2 sidebar-item">            
      <a class="sidebar-link" href="#">
        <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Leads</span>
      </a>
    </li>
    <li class="sidebar-item">
      <a class="sidebar-link" href="#">
        <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">Bookings</span>
      </a>
    </li>
    
 </ul>
