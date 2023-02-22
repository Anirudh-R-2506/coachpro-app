<!DOCTYPE html>
<html lang="en">

<head>
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-256702174-1"></script>
   <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());

   gtag('config', 'UA-256702174-1');
   </script>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>
      Edu Hunt | Dashboard
   </title>
   <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}" type="image/x-icon" />   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js" integrity="sha512-NCiXRSV460cHD9ClGDrTbTaw0muWUBf/zB/yLzJavRsPNUl9ODkUVmUHsZtKu17XknhsGlmyVoJxLg/ZQQEeGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="https://cdn.jsdelivr.net/gh/mattkingshott/iodine@3/dist/iodine.min.js" defer></script>   
   <style>
      button:focus {
         outline: none !important;
      }
   </style>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">   
   <link href="{{ asset('dist/css/app.css') }}" rel="stylesheet">

   <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
   <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap");
      select {
         background: rgba(0,0,0,1) url(data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3E%3Cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3E%3C/svg%3E);
         background-position: right 0.5rem center;
         background-repeat: no-repeat;
         background-size: 1.5em 1.5em;
         padding-right: 2.5rem !important;
         -webkit-print-color-adjust: exact;
         appearance: none !important;
         -moz-appearance: none !important;
         -webkit-appearance: none !important;
      }
      select:focus {
         outline: 0;
         box-shadow: 0 0 0 3px rgba(48, 86, 211, 0.5);
      }
      *, :after, :before {
         border: 0 solid #e5e7eb;
         box-sizing: border-box;
      }
      html {
         -webkit-font-smoothing: antialiased !important;
         -webkit-text-size-adjust: 100%;
         font-feature-settings: normal;         
         line-height: 1.5;
         -moz-tab-size: 4;
         -o-tab-size: 4;
         tab-size: 4;
      }
      .text-2xl {
        font-size: 1.5rem;
        line-height: 2rem;
      }
      .font-bold {
         font-weight: 700;
      }
      .tracking-tight {
         letter-spacing: -.025em;
      }
      .filament-header-heading {
         color: #374151;
      }
      .btn-primary {
         --tw-bg-opacity: 1;
         background-color: rgb(48 86 211 / var(--tw-bg-opacity));
         --tw-text-opacity: 1;
         color: rgb(255 255 255 / var(--tw-text-opacity));
         padding-left: 1.25rem;
         padding-right: 1.25rem;
         padding-top: 0.50rem;
         padding-bottom: 0.50rem;
         font-size: 1rem;
         font-weight: 500;
         border-radius: 0.5rem;
         line-height: 1.5rem;
         transition-timing-function: cubic-bezier(.4,0,.2,1);
         transition-duration: .3s;
      }
      .btn-primary:hover{
         --tw-bg-opacity: 1;
         background-color: rgb(9 14 52 / var(--tw-bg-opacity)) !important;
         --tw-text-opacity: 1;
         color: rgb(255 255 255 / var(--tw-text-opacity)) !important;         
      }
      .btn-primary:focus{
         --tw-bg-opacity: 1;
         background-color: rgb(9 14 52 / var(--tw-bg-opacity)) !important;
         --tw-text-opacity: 1;
         color: rgb(255 255 255 / var(--tw-text-opacity)) !important;         
      }
      .btn-secondary {
         --tw-bg-opacity: 1;
         background-color: rgb(255 255 255 / var(--tw-bg-opacity));
         --tw-text-opacity: 1;
         color: rgb(48 86 211 / var(--tw-text-opacity));
         padding-left: 1.25rem;
         padding-right: 1.25rem;
         padding-top: 0.50rem;
         padding-bottom: 0.50rem;
         font-size: 1rem;
         font-weight: 500;
         border-radius: 0.5rem;
         line-height: 1.5rem;
         transition-timing-function: cubic-bezier(.4,0,.2,1);
         transition-duration: .3s;
      }
      .btn-secondary:hover{
         --tw-bg-opacity: 1;
         background-color: rgb(9 14 52 / var(--tw-bg-opacity)) !important;
         --tw-text-opacity: 1;
         color: rgb(255 255 255 / var(--tw-text-opacity)) !important;         
      }
      .btn-secondary:focus{
         --tw-bg-opacity: 1;
         background-color: rgb(9 14 52 / var(--tw-bg-opacity)) !important;
         --tw-text-opacity: 1;
         color: rgb(255 255 255 / var(--tw-text-opacity)) !important;         
      }
      .btn-danger {
         --tw-bg-opacity: 1;
         background-color: rgb(255 255 255 / var(--tw-bg-opacity));
         --tw-text-opacity: 1;
         color: rgb(255 59 48 / var(--tw-text-opacity));
         padding-left: 1.25rem;
         padding-right: 1.25rem;
         padding-top: 0.50rem;
         padding-bottom: 0.50rem;
         font-size: 1rem;
         font-weight: 500;
         border-radius: 0.5rem;
         line-height: 1.5rem;
         transition-timing-function: cubic-bezier(.4,0,.2,1);
         transition-duration: .3s;
      }
      .btn-danger:hover{
         --tw-bg-opacity: 1;
         background-color: rgb(255 59 48 / var(--tw-bg-opacity)) !important;
         --tw-text-opacity: 1;
         color: rgb(255 255 255 / var(--tw-text-opacity)) !important;         
      }
      .btn-danger:focus{
         --tw-bg-opacity: 1;
         background-color: rgb(255 59 48 / var(--tw-bg-opacity)) !important;
         --tw-text-opacity: 1;
         color: rgb(255 255 255 / var(--tw-text-opacity)) !important;         
      }
      .form-inputs svg{
         position: relative;
         right:25px;
         top:15px;
      }
      .search-bar {
         gap: 0.5rem;
         justify-content: flex-end;
         align-items: center;
         display: flex;
         width: 100%;         
         --tw-text-opacity: 1;
         color: rgb(17 24 39/var(--tw-text-opacity));
         -webkit-font-smoothing: antialiased;
      }
      .search-bar .search {
         justify-content: flex-end;
         align-items: center;
         flex: 1 1 0%;
         display: flex;
      }
      .search-bar .search .relative {
         position: relative;
      }
      .search-bar .search .relative .s-icon {
         --tw-text-opacity: 1;
         color: rgb(156 163 175/var(--tw-text-opacity));
         justify-content: center;
         align-items: center;
         display: flex;
         height: 2.25rem;
         width: 2.25rem;
         left: 0;
         bottom: 0;
         top: 0;
         position: absolute;
         pointer-events: none;
      }
      .search-bar .search .relative .s-icon svg {
         width: 1.25rem;
         height: 1.25rem;
         vertical-align: middle;
      }
      .search-bar .search .relative input {
         padding-left: 2.25rem !important;
         transition-duration: 75ms;
         transition-property: color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter,-webkit-backdrop-filter;
         transition-timing-function: cubic-bezier(.4,0,.2,1);
         box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow);
         --tw-shadow: 0 1px 2px 0 rgba(0,0,0,.05);
         --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
         padding-left: 2.25rem;
         --tw-border-opacity: 1;
         border-color: rgb(209 213 219/var(--tw-border-opacity));
         border-radius: 0.5rem;
         max-width: 20rem;
         width: 100%;
         height: 2.25rem;
         appearance: none;
         background-color: #fff;
         border-width: 1px;
         font-size: 1rem;
         line-height: 1.5rem;
         padding: 0.5rem 0.75rem;
         outline-offset: -2px;
      }
      .search-bar .filter {
         flex-shrink: 0;
      }
      .search-bar .filter .btn-div {
         cursor: pointer;
      }
      .search-bar .filter .btn-div button {
         border-radius: 9999px;
         justify-content: center;
         align-items: center;
         height: 2.5rem;
         width: 2.5rem;
         display: flex;
         position: relative;
         font-family: inherit;
         font-size: 100%;
         font-weight: inherit;
         line-height: inherit;
         margin: 0;
         padding: 0;
         background: transparent !important;
         border: 0 !important;
      }
      .search-bar .filter .btn-div button:hover {
         outline: 2px solid transparent;
         outline-offset: 2px;
         background: rgba(48, 86, 211, 0.1) !important;
      }
      .search-bar .filter .btn-div button:focus {
         outline: 2px solid transparent;
         outline-offset: 2px;
         background: rgba(48, 86, 211, 0.1) !important;
      }
      .search-bar .filter .btn-div button svg {
         width: 1.25rem;
         height: 1.25rem;
         vertical-align: middle;
      }
      .mild-border {
         --tw-border-opacity: 1;
         border-width: 0.5px;
         border-color: rgb(209 213 219/var(--tw-border-opacity));
      }
      .mild-border-t {
         --tw-border-opacity: 1;
         border-top-width: 0.5px;
         border-color: rgb(209 213 219/var(--tw-border-opacity));
      }   
      .mild-border-b {
         --tw-border-opacity: 1;
         border-bottom-width: 0.5px;
         border-color: rgb(209 213 219/var(--tw-border-opacity));
      }
      .mild-border-l {
         --tw-border-opacity: 1;
         border-left-width: 0.5px;
         border-color: rgb(209 213 219/var(--tw-border-opacity));
      }
      .mild-border-r {
         --tw-border-opacity: 1;
         border-right-width: 0.5px;
         border-color: rgb(209 213 219/var(--tw-border-opacity));
      }
      .search-bar .filter .filter-dropdown {
         display: block;
         right: 0;
         top: 55px;
         transition-property: color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter,-webkit-backdrop-filter;
         transition-timing-function: cubic-bezier(.4,0,.2,1);
         transition-duration: .15s;
         --tw-shadow: 10px 10px 15px -3px rgba(0,0,0,.1),10px 4px 6px -4px rgba(0,0,0,.1);
         box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow);
         border-radius: 0.5rem;
         max-width: 20rem;
         width: 100%;
         position: absolute;
         background: #fff;
         z-index: 10;
         --tw-border-opacity: 1;
         border-width: 0.5px;
         border-color: rgb(209 213 219/var(--tw-border-opacity));
      }
      .search-bar .filter .filter-dropdown .dropdown-body {
         padding: 1rem;
      }
      .search-bar .filter .filter-dropdown .dropdown-body .body {
         display: grid;
         grid-template-columns: repeat(1,minmax(0,1fr));
      }
      .search-bar .filter .filter-dropdown .dropdown-body .body .filter-item {
         grid-column: 1 / -1;
      }
      .search-bar .filter .filter-dropdown .dropdown-body .body .filter-item .filter-body {
         grid-template-columns: repeat(1,minmax(0,1fr));
         display: grid;
         margin-bottom: 0.75rem;
      }
      .search-bar .filter .filter-dropdown .dropdown-body .body .filter-item .filter-body .heading {
         justify-content: space-between;
         align-items: center;
         display: flex;
      }
      .search-bar .filter .filter-dropdown .dropdown-body .body .filter-item .filter-body .heading label {
         --tw-text-opacity: 1;
         color: rgb(55 65 81/var(--tw-text-opacity));
         line-height: 1rem;
         font-weight: 500;
         font-size: .875rem;
      }
      .search-bar .filter .filter-dropdown .dropdown-body .body .filter-item .filter-body .filter {
         --tw-space-y-reverse: 0;
         margin-bottom: calc(0.5rem*var(--tw-space-y-reverse));
         margin-top: calc(0.5rem*(1 - var(--tw-space-y-reverse)));
         align-items: center;
         display: flex;
      }
      .search-bar .filter .filter-dropdown .dropdown-body .body .filter-item .filter-body .filter div {
         flex: 1 1 0%;
         min-width: 0;
      }
      .search-bar .filter .filter-dropdown .dropdown-body .body .filter-item .filter-body .filter div select {
         transition-duration: 75ms;
         transition-property: color,background-color,border-color,text-decoration-color,fill,stroke,opacity,box-shadow,transform,filter,backdrop-filter,-webkit-backdrop-filter;
         transition-timing-function: cubic-bezier(.4,0,.2,1);
         --tw-text-opacity: 1;
         color: rgb(17 24 39/var(--tw-text-opacity));
         --tw-border-opacity: 1;
         border-color: rgb(209 213 219/var(--tw-border-opacity));
         --tw-shadow: 0 1px 2px 0 rgba(0,0,0,.05);
         box-shadow: var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow);
         appearance: none;
         background-color: #fff;
         border-width: 1px;
         text-transform: none;
         margin: 0;
         font-size: 1rem;
         line-height: 1.5rem;
         padding: 0.5rem 0.75rem;
         border-radius: 0.375rem;
         width: 100%;
      }
      .search-bar .filter .filter-dropdown .dropdown-body .footer {
         text-align: end;
         --tw-space-y-reverse: 0;
         margin-bottom: calc(1.5rem*var(--tw-space-y-reverse));
         margin-top: calc(1.5rem*(1 - var(--tw-space-y-reverse)));
      }
      .search-bar .filter .filter-dropdown .dropdown-body .footer button {
         --tw-text-opacity: 1;
         color: rgb(225 29 72/var(--tw-text-opacity));
         font-weight: 500;
         font-size: .875rem;
         line-height: 1.25rem;
         gap: 0.125rem;
         justify-content: center;
         align-items: center;
         display: inline-flex;
         background-color: transparent;
         background-image: none;
         border: 0 !important;
      }
      .action-edit {
         padding-bottom: 0.75rem;
         padding-top: 0.75rem;
         padding-left: 1rem;
         padding-right: 1rem;
         white-space: nowrap;
         border: 0 solid #e5e7eb;
         box-sizing: border-box;
      }
      .action-edit .inner {
         gap: 1rem;
         justify-content: flex-end;
         align-items: center;
         display: flex;
      }
      .action-edit .inner .icon {
         --tw-bg-opacity: 1;
         color: rgb(48 86 211 / var(--tw-bg-opacity));
         font-weight: 500;
         font-size: .875rem;
         line-height: 1.25rem;
         gap: 0.125rem;
         justify-content: center;
         align-items: center;
         display: inline-flex;
      }
      .actions-th::after {
         content: "" !important;
         display: none !important;
      }
      .actions-th::before {
         content: "" !important;
         display: none !important;
      }
      .action-edit .inner .icon svg {
         width: 1.25rem;
         height: 1.25rem;
      }
      .action-edit .inner .icon span {
         --tw-text-opacity: 1;
         color: rgb(48 86 211 / var(--tw-text-opacity));
         font-weight: 500;
         font-size: .875rem;
         line-height: 1.25rem;
      }
      .card-body {
         padding: 0.5rem 0.5rem;
      }
      .modal-footer {
         padding: 0.5rem 0.5rem;
      }
      body {
         font-family: "Inter", sans-serif !important;
      }
      .main {
         background-color: #f3f4ff !important;
      }      

      .text-primary {
         color: #3056d3 !important;
      }

      input, select, textarea {
         padding: 10px !important;
         border-radius: 15px !important;
      }
      
    /* ALPINE JS CLOAK VARIABLE */
      [x-cloak] {
         display: none !important;
      }

        .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 24px;
        }

        /* Hide default HTML checkbox */
        .switch input {
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* The slider */
        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .2s;
        transition: .2s;
        }

        input:checked + .slider {
        background-color: #2196F3;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(16px);
        -ms-transform: translateX(16px);
        transform: translateX(16px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }

        .-mt-1 {
            margin-top: -0.6rem !important;
        }

        .text-muted {
            margin-bottom: 0px !important;            
        }
    </style>

   @yield('css')   
   @yield('js')
</head>

<body>

   @include('sweetalert::alert')

   <div class="wrapper">
      <nav id="sidebar" class="sidebar js-sidebar">
         <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{ route('institute.dashboard.profile.index') }}">
               <span class="align-middle">
                  <img src="{{ asset('images/logo/logo.png') }}" alt="logo" width="200" height="200" style="margin-bottom: -60px !important; margin-top: -20px !important;">
               </span>
            </a>

            @include('institute.layouts.admin_sidebar')
         </div>
      </nav>
      <div class="main">
         @include('institute.layouts.admin_navbar')
         <main class="content">
            <div class="p-0 container-fluid">
               @yield('content')
            </div>
         </main>  
         <footer class="footer">
            <div class="container-fluid">
               <div class="row text-muted">
                  <div class="col-6 text-start">
                     <p class="mb-0">
                        <strong>{{ config('app.name') }}</strong>
                     </p>
                  </div>
                     <div class="col-6 text-end">
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              <a class="text-muted" href="https://institute.eduhunt.co/#contact" target="_blank">Support</a>
                           </li>
                           <li class="list-inline-item">
                              <a class="text-muted" href="{{asset('docs/mou.pdf')}}" target="_blank">MoU</a>
                           </li>
                           <li class="list-inline-item">
                              <a class="text-muted" href="{{route('docs.privacy-policy')}}" target="_blank">Privacy Policy</a>
                           </li>
                           <li class="list-inline-item">
                              <a class="text-muted" href="{{route('docs.terms')}}" target="_blank">Terms</a>
                           </li>
                        </ul>
                     </div>
               </div>
            </div>
         </footer>       
      </div>
   </div>

   <script src="{{ asset('dist/js/app.js') }}"></script>
</body>

<script>

   /* const scheduleRun = async() => {
      const response = await axios.get("");
      console.log(response);
   } */
</script>

</html>
