<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>
    Gradify
</title>
<link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}" type="image/x-icon" />
<link rel="stylesheet" href="{{ asset('css/animate.css') }} "/>
<link rel="stylesheet" href="{{ asset('css/tailwind.css?v=').time() }} "/>
<link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<link href="https://unpkg.com/@videojs/themes@1/dist/sea/index.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.0/tailwind.min.css"
    integrity="sha512-wOgO+8E/LgrYRSPtvpNg8fY7vjzlqdsVZ34wYdGtpj/OyVdiw5ustbFnMuCb75X9YdHHsV5vY3eQq3wCE4s5+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
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
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHAV3_SITEKEY') }}"></script>