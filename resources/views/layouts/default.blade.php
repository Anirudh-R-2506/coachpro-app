<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.head')

</head>

    <body class="bg-[#f3f4ff]">

        {{-- @include('includes.header') --}}

        @include('includes.sign-in-modal')

        @yield('content')

        {{-- @include('includes.footer') --}}

        <!-- ====== Back To Top Start -->
        <a
            href="javascript:void(0)"
            class="back-to-top fixed bottom-8 right-8 left-auto z-[999] hidden h-10 w-10 items-center justify-center rounded-md bg-primary text-white shadow-md transition duration-300 ease-in-out hover:bg-dark"
        >
            <span
            class="mt-[6px] h-3 w-3 rotate-45 border-t border-l border-white"
            ></span>
        </a>
        <!-- ====== Back To Top End -->

    </body>

    @include('sweetalert::alert')
</html>