<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.head')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js"></script> --}}

    @yield('addons')

    <style>
        .progress-bar {
            background: rgb(48,86,211);
            background: linear-gradient(34deg, rgba(48,86,211,1) 26%, rgba(9,9,121,1) 87%);
            height: 8px;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            width: 0%;
            position: fixed;
            top: 0;
            z-index: 1;
        }

        body::-webkit-scrollbar {
        display: none;
        }

        body {
        -ms-overflow-style: none;
        scrollbar-width: none;
        }        
    </style>

</head>

    <body class="bg-[#f3f4ff]">
        <div class="progress-bar" id="progressBar"></div>  
        {{-- @include('includes.header') --}}

        @include('includes.shapes')

        @yield('content')

        @include('includes.footer')

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
                duration: 800,
                easing: 'ease-in-out',
                delay: 0,                
            });

            window.addEventListener('scroll', handleScroll);

            function handleScroll() {
                var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;  
                var scrolled = (winScroll / height) * 100;
            
                document.getElementById("progressBar").style.width = scrolled + "%";
            }

            /* var canvas = document.querySelector('#c'),
            ctx = canvas.getContext('2d'),
            points = [],
            m = {x: null, y: null},
            r = 0;

            var a = 10; // how many dots to have
            var b = 5; // how fast to spin
            var c = 0.1; // how much to fade. 1 all, 0.5 half, 0 none
            var d = 100; // distance from the mouse


            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            m.x = canvas.width / 2;
            m.y = canvas.height / 2;

            window.addEventListener('mousemove', function(e){
                TweenMax.to(m, 0.3, {x: e.clientX, y: e.clientY, ease: 'linear'})
            })

            for(var i=0;i<a;i++){
                points.push({
                    r: 360 / a * i,
                    p: {x: null, y: null},
                    w: Math.random()*5,
                    c: '#000',
                    d: Math.random() * (d + 5) - 5,
                    s: Math.random() * (b + 5) - 5
                })
            }

            function render(){
                if(m.x == null || m.y == null) return;

                ctx.fillStyle = 'rgba(255,255,255,'+c+')';
                ctx.fillRect(0, 0, canvas.width, canvas.height);

                ctx.lineCap = 'round';

                for(var i=0; i<points.length; i++){
                    var p = points[i];

                    p.r += p.s;
                    if(p.r >= 360) p.r = p.r - 360;

                    var vel = {
                        x: p.d * Math.cos(p.r * Math.PI / 180),
                        y: p.d * Math.sin(p.r * Math.PI / 180)
                    };

                    if(p.p.x != null && p.p.y != null){
                        ctx.strokeStyle = p.c;
                        ctx.lineWidth = 2;
                        ctx.beginPath();
                        ctx.moveTo(p.p.x, p.p.y);
                        ctx.lineTo(m.x + vel.x, m.y + vel.y)
                        ctx.stroke();
                        ctx.closePath();
                    }

                    p.p.x = m.x + vel.x;
                    p.p.y = m.y + vel.y;
                }
            }


            window.requestAnimFrame = (function(){
            return  window.requestAnimationFrame   ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame    ||
                function(callback){
                    window.setTimeout(callback, 1000 / 60);
                };
            })();

            (function animloop(){
                requestAnimFrame(animloop);
                render();
            })(); */

        </script>
    </body>

    @include('sweetalert::alert')
</html>