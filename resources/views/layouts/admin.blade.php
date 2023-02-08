<!DOCTYPE html>
<html lang="en">

<head>
   @include('includes.head')
    {{-- WEBSITE ICONS (FONTAWESOME) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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

    <style>
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
    </style>

   @yield('css')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   @yield('js')
</head>

<body>

   @include('sweetalert::alert')

   <div class="wrapper">
      <nav id="sidebar" class="sidebar js-sidebar">
         <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.html">
               <span class="align-middle">
                  {{ config('app.name') }}
               </span>
            </a>

            @php
                $unacknowledged_items = 0;
            @endphp

            @if($unacknowledged_items > 0)
            <div class="sidebar-cta">
                <div class="sidebar-cta-content">
                   <strong class="mb-2 d-inline-block">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Action Required</strong>
                   <div class="mb-3">
                      There are {{ $unacknowledged_items }} unacknowledged items in
                      procurement list.
                   </div>
                   <div class="d-grid">
                      <a href="{{ route('admin.operations.procurement.index') }}" class="btn btn-primary">
                        View
                      </a>
                   </div>
                </div>
             </div>
             @endif
            @include('layouts.admin_sidebar')
         </div>
      </nav>
      <div class="main">
         @include('layouts.admin_navbar')
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
</body>

<script>

   /* const scheduleRun = async() => {
      const response = await axios.get("{{route('admin.schedule.run')}}");
      console.log(response);
   } */
</script>

</html>
