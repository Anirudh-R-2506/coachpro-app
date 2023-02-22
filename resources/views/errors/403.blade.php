<html>
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
        <title>Edu Hunt | 403</title>
        <link rel="stylesheet" href="{{ asset('css/tailwind.css?v=').time() }} "/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.0/tailwind.min.css"
            integrity="sha512-wOgO+8E/LgrYRSPtvpNg8fY7vjzlqdsVZ34wYdGtpj/OyVdiw5ustbFnMuCb75X9YdHHsV5vY3eQq3wCE4s5+g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    </head>
    <body>
        {{-- @include('includes.header') --}}        
        <div class="flex flex-row items-center justify-center h-screen p-10">
            <div class="flex flex-col items-center justify-center w-1/2">
                <header data-aos="fade-zoom-in" class="flex items-center justify-center w-full">
                    <img class="mx-auto z-[-4]" width="200" height="200" src="{{ asset('images/logo/logo.png') }}" alt="Edu Hunt logo" data-aos="fade-zoom-in"/>
                </header>
                <h1 class="mb-1 font-bold text-center text-gray-800" style="font-size: 6rem !important; margin-top: -50px !important;" data-aos="fade-zoom-right" data-aos-delay="100">Oops...</h1>
                <p class="mb-5 text-center text-gray-800" style="font-size: 1.5rem;" data-aos="fade-zoom-right" data-aos-delay="200">You're forbidden to access this page</p>
                <a href="{{ route('frontend.index') }}" class="inline-flex items-center justify-center w-1/3 px-6 py-4 text-base font-medium text-white transition duration-300 ease-in-out rounded-lg bg-primary hover:bg-dark" data-aos="fade-zoom-right" data-aos-delay="300">Go Back</a>
            </div>
            <div class="flex items-center justify-center w-1/2">                
                <lottie-player src="{{asset('images/errors/403.json')}}" background="transparent"
                        speed="1" style="width: 80%; height: 80%;" autoplay></lottie-player>    
            </div>
        </div>

        <script>
            AOS.init({ 
                once: true, 
                duration: 900,
                easing: 'ease-in-out',
                delay: 0,                
            });
        </script>

        {{-- @include('includes.footer') --}}
    </body>
</html>