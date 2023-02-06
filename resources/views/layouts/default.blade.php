<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.head')

    @yield('addons')

</head>

    <body class="bg-[#f3f4ff]">

        {{-- @include('includes.header') --}}

        @include('includes.shapes')

        @include('includes.sign-in-modal')

        @yield('content')

        {{-- @include('includes.footer') --}}

        <!-- ====== Back To Top Start -->
        <button   
            onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
            class="back-to-top fixed bottom-8 right-8 left-auto z-[999] hidden h-10 w-10 items-center justify-center rounded-md bg-primary text-white shadow-md transition duration-300 ease-in-out hover:bg-dark"
        >
            <span
            class="mt-[6px] h-3 w-3 rotate-45 border-t border-l border-white"
            ></span>
        </button>
        <!-- ====== Back To Top End -->
        <script>
            AOS.init({ 
                once: true, 
                duration: 1000,
                easing: 'ease-in-out',
                delay: 0,                
            });
        </script>
    </body>

    @include('sweetalert::alert')
</html>