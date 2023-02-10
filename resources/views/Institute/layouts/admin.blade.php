<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>
      Edu Hunt | Dashboard
   </title>
   <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}" type="image/x-icon" />
   <link rel="stylesheet" href="{{ asset('css/animate.css') }} "/>
   
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
   <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
   <link href="https://unpkg.com/@videojs/themes@1/dist/sea/index.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.2/axios.min.js" integrity="sha512-NCiXRSV460cHD9ClGDrTbTaw0muWUBf/zB/yLzJavRsPNUl9ODkUVmUHsZtKu17XknhsGlmyVoJxLg/ZQQEeGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script src="https://cdn.jsdelivr.net/gh/mattkingshott/iodine@3/dist/iodine.min.js" defer></script>
   <!-- ==== WOW JS ==== -->
   <script src="{{ asset('js/wow.min.js') }}"></script>
   <style>
      button:focus {
         outline: none !important;
      }
   </style>
   <script>
      new WOW().init();
   </script>
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
   <link href="{{ asset('dist/css/app.css') }}" rel="stylesheet">

   {{-- JQUERY --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   {{-- DATATABLES --}}
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
   <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

   {{-- DATATABLES  RESPONSIVE EXTENSION
   <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css" rel="stylesheet">
   <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
   --}}
   {{-- SELECT2 --}}
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

   {{-- CHARTISAN --}}
   <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
   <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>

   {{-- RTF EDITOR --}}
   <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

   {{-- BOOTSTRAP SWITCH --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/4.0.0-alpha.1/js/bootstrap-switch.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/4.0.0-alpha.1/css/bootstrap-switch.min.css" rel="stylesheet">

   {{-- FILEPOND --}}
   <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
   <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
   <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
   <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
   <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
   <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

   {{-- LITEPICKER --}}
   <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css"/>

   <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
   <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   {{-- APP JS --}}   

    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap");
      html {
         font-family: "Inter", sans-serif !important;
      }
      .main {
         background-color: #f3f4ff !important;
      }

      .sidebar-header {
         color: #f3f4ff !important;
         font-size: 0.8rem !important;
         font-weight: 200 !important;
         text-transform: uppercase !important;
         letter-spacing: 1px !important;
         background-color: #3056d3 !important;
      }

      .sidebar, .sidebar-content {
         background-color: #3056d3 !important;
      }

      .text-primary {
         color: #3056d3 !important;
      }

      .sidebar-item.active .sidebar-link:hover i, .sidebar-item.active .sidebar-link:hover svg, .sidebar-item.active>.sidebar-link i, .sidebar-item.active>.sidebar-link svg {
         color: #0F1F52 !important;
         font-size: 1rem !important;
         font-weight: bold !important;
      }

      input, select, textarea {
         padding: 10px !important;
         border-radius: 15px !important;
         border: 1px #f1f1f1 solid !important;
      }

      .sidebar-item.active .sidebar-link:hover, .sidebar-item.active>.sidebar-link {
         border-left-color: #3056d3 !important;
         color: #0F1F52 !important;
         background: #fff !important;    
         border-top-right-radius: 20px !important;
         border-bottom-right-radius: 20px !important;
         border: 1px solid #3056d3;     
         font-size: 1rem !important;
         font-weight: bold !important;
      }      

      .sidebar-link, a.sidebar-link {
         background-color: #3056d3 !important;
         color: #fff !important;
         font-size: 1rem !important;
         font-weight: bold !important;
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
            <a class="sidebar-brand" href="index.html">
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
                              <a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
                           </li>
                           <li class="list-inline-item">
                              <a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
                           </li>
                           <li class="list-inline-item">
                              <a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
                           </li>
                           <li class="list-inline-item">
                              <a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
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
