<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>
    Edu Hunt | Shape your child's future
</title>
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
<link rel="stylesheet" href="{{ asset('css/animate.css') }} "/>
<link rel="stylesheet" href="{{ asset('css/tailwind.css') }} "/>
<link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
<link href="https://unpkg.com/@videojs/themes@1/dist/sea/index.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.0/tailwind.min.css"
    integrity="sha512-wOgO+8E/LgrYRSPtvpNg8fY7vjzlqdsVZ34wYdGtpj/OyVdiw5ustbFnMuCb75X9YdHHsV5vY3eQq3wCE4s5+g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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