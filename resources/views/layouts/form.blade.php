<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.head')

    @yield('addons')

</head>

    <body class="bg-[#f3f4ff]">
        @include('includes.shapes')

        @yield('content')        
    </body>

    @include('sweetalert::alert')
</html>