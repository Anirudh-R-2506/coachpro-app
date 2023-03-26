<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.head')

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

        .has-error {
            border-color: red;
            box-shadow: inset 0 1px 1px rgba(255,0,0,0.5);
        }
    </style>

</head>

    <body class="bg-[#f3f4ff]">
        <div class="progress-bar" id="progressBar"></div>  

        @include('institute.includes.header')

        @include('includes.shapes')

        @yield('content')

        @include('institute.includes.footer')

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

            window.addEventListener('scroll', handleScroll);

            function handleScroll() {
                var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;  
                var scrolled = (winScroll / height) * 100;
            
                document.getElementById("progressBar").style.width = scrolled + "%";
            }

            document.addEventListener('DOMContentLoaded', function() {
                let requiredInputs = document.querySelectorAll('input[required], textarea[required]');
                requiredInputs.forEach(input => {
                    input.addEventListener('invalid', function() {
                        this.classList.add('has-error');
                    });
                    input.addEventListener('input', function() {
                        this.classList.remove('has-error');
                    });
                    input.parentNode.parentElement.childNodes[1].childNodes[1].innerHTML = input.parentNode.parentElement.childNodes[1].childNodes[1].innerHTML + "<strong><span style='color: red;'>*</span></strong>";
                });
            });
        </script>
    </body>

    @include('sweetalert::alert')
</html>