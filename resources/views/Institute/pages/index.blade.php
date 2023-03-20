@extends('institute.layouts.default')

@section('content')
    
    <style>
        * {
        box-sizing: border-box;
        }

        body {
        background: black;
        }

        .scroll-prompt {
        position: fixed;
        z-index: 998;
        left: 50%;
        margin-left: -80px;
        width: 160px;
        margin-top: 7rem;
        }
        .scroll-prompt .scroll-prompt-arrow-container {
        position: absolute;
        top: 0;
        left: 50%;
        margin-left: -18px;
        -webkit-animation-name: bounce;
                animation-name: bounce;
        -webkit-animation-duration: 1.5s;
                animation-duration: 1.5s;
        -webkit-animation-iteration-count: infinite;
                animation-iteration-count: infinite;
        }
        .scroll-prompt .scroll-prompt-arrow {
        -webkit-animation-name: opacity;
                animation-name: opacity;
        -webkit-animation-duration: 1.5s;
                animation-duration: 1.5s;
        -webkit-animation-iteration-count: infinite;
                animation-iteration-count: infinite;
        }
        .scroll-prompt .scroll-prompt-arrow:last-child {
        animation-direction: reverse;
        margin-top: -6px;
        }
        .scroll-prompt .scroll-prompt-arrow > div {
        width: 36px;
        height: 36px;
        border-right: 8px solid #bebebe;
        border-bottom: 8px solid #bebebe;
        transform: rotate(45deg) translateZ(1px);
        }

        @-webkit-keyframes opacity {
        0% {
            opacity: 0;
        }
        10% {
            opacity: 0.1;
        }
        20% {
            opacity: 0.2;
        }
        30% {
            opacity: 0.3;
        }
        40% {
            opacity: 0.4;
        }
        50% {
            opacity: 0.5;
        }
        60% {
            opacity: 0.6;
        }
        70% {
            opacity: 0.7;
        }
        80% {
            opacity: 0.8;
        }
        90% {
            opacity: 0.9;
        }
        100% {
            opacity: 1;
        }
        }

        @keyframes opacity {
        0% {
            opacity: 0;
        }
        10% {
            opacity: 0.1;
        }
        20% {
            opacity: 0.2;
        }
        30% {
            opacity: 0.3;
        }
        40% {
            opacity: 0.4;
        }
        50% {
            opacity: 0.5;
        }
        60% {
            opacity: 0.6;
        }
        70% {
            opacity: 0.7;
        }
        80% {
            opacity: 0.8;
        }
        90% {
            opacity: 0.9;
        }
        100% {
            opacity: 1;
        }
        }
        @-webkit-keyframes bounce {
        0% {
            transform: translateY(0);
        }
        10% {
            transform: translateY(3px);
        }
        20% {
            transform: translateY(6px);
        }
        30% {
            transform: translateY(9px);
        }
        40% {
            transform: translateY(12px);
        }
        50% {
            transform: translateY(15px);
        }
        60% {
            transform: translateY(18px);
        }
        70% {
            transform: translateY(21px);
        }
        80% {
            transform: translateY(24px);
        }
        90% {
            transform: translateY(27px);
        }
        100% {
            transform: translateY(30px);
        }
        }
        @keyframes bounce {
        0% {
            transform: translateY(0);
        }
        10% {
            transform: translateY(3px);
        }
        20% {
            transform: translateY(6px);
        }
        30% {
            transform: translateY(9px);
        }
        40% {
            transform: translateY(12px);
        }
        50% {
            transform: translateY(15px);
        }
        60% {
            transform: translateY(18px);
        }
        70% {
            transform: translateY(21px);
        }
        80% {
            transform: translateY(24px);
        }
        90% {
            transform: translateY(27px);
        }
        100% {
            transform: translateY(30px);
        }
        }
    </style>

    <div class="relative overflow-hidden" data-aos="fade-zoom-in" data-aos-delay="250">
        <video muted autoplay loop id="myVideo" style="width: 100vw; height: 100%;">
            <source src="{{ asset("videos/about.mp4") }}" type="video/mp4" />
        </video>
    </div>

    <!-- ====== Hero Section Start -->
    <div id="home" class="relative overflow-hidden bg-primary pt-[120px] md:pt-[130px] lg:pt-[160px]">
        <div class="container">
            <div class="flex flex-wrap items-center -mx-4">
                <div class="w-full px-4">
                    <div class="hero-content mx-auto max-w-[780px] text-center">
                        <h1 data-aos="fade-zoom-up" data-aos-easing="ease-in-back"
                            class="mb-8 font-bold leading-snug text-white sm:text-2xl"
                            style="font-size: 3rem; line-height: 1;">
                            EDU HUNT
                        </h1>
                        <p
                            data-aos="fade-zoom-up" data-aos-easing="ease-in-back" data-aos-delay="150"
                            class="mx-auto mb-10 max-w-[600px] text-base text-[#e4e4e4] sm:text-lg sm:leading-relaxed md:text-xl md:leading-relaxed">
                            Edu Hunt is a platform for students to find the best tutors and courses for their educational needs. You can register your institute with us and help us revolutionize the industry</p>
                        <ul class="flex flex-wrap items-center justify-center mb-10" data-aos="fade-zoom-up" data-aos-easing="ease-in-back" data-aos-delay="300">
                            
                            <li class="mb-2">
                                <span class="inline-block px-6 py-3 text-base font-medium text-white transition duration-300 ease-in-out rounded-full shadow-lg bg-primary-500 hover:opacity-70">
                                    <span @click="" class="inline-block px-6 py-3 text-base font-medium text-gray-500 transition duration-300 ease-in-out rounded-full shadow-lg bg-primary-500 hover:opacity-70">
                                        Scroll to know more
                                    </span>
                                </span>
                            </li>

                            <li class="scroll-prompt" scroll-prompt="" ng-show="showPrompt" style="opacity: 1;">
                                <div class="scroll-prompt-arrow-container">
                                    <div class="scroll-prompt-arrow"><div></div></div>
                                    <div class="scroll-prompt-arrow"><div></div></div>
                                </div>
                            </li>
                            <!--
                    <li>
                      <a
                        href="https://github.com/tailgrids/Coach Pro-tailwind"
                        target="_blank"
                        class="flex items-center px-6 py-4 text-base font-medium text-white transition duration-300 ease-in-out hover:opacity-70 sm:px-10"
                      >
                        Star on Github
                        <span class="pl-2">
                          <svg
                            width="20"
                            height="8"
                            viewBox="0 0 20 8"
                            class="fill-current"
                          >
                            <path
                              d="M19.2188 2.90632L17.0625 0.343819C16.875 0.125069 16.5312 0.0938193 16.2812 0.281319C16.0625 0.468819 16.0312 0.812569 16.2188 1.06257L18.25 3.46882H0.9375C0.625 3.46882 0.375 3.71882 0.375 4.03132C0.375 4.34382 0.625 4.59382 0.9375 4.59382H18.25L16.2188 7.00007C16.0312 7.21882 16.0625 7.56257 16.2812 7.78132C16.375 7.87507 16.5 7.90632 16.625 7.90632C16.7812 7.90632 16.9375 7.84382 17.0312 7.71882L19.1875 5.15632C19.75 4.46882 19.75 3.53132 19.2188 2.90632Z"
                            />
                          </svg>
                        </span>
                      </a>
                    </li> -->
                        </ul>
                        <!--
                  <div class="text-center wow fadeInUp" data-wow-delay=".3s">
                    <img
                      src="assets/images/hero/brand.svg"
                      alt="image"
                      class="mx-auto w-full max-w-[250px] opacity-50 transition duration-300 ease-in-out hover:opacity-100"
                    />
                  </div> -->
                    </div>
                </div>

                <div class="w-full px-4">
                    <div class="relative z-10 mx-auto max-w-[845px]" data-aos="fade-zoom-up" data-aos-easing="ease-in-back" data-aos-delay="350">
                        <div class="mt-16">
                            {{-- <video id="my-video" class="max-w-full mx-auto rounded-t-xl rounded-tr-xl video-js vjs-theme-sea" data-aos="fade-up" data-aos-delay="250"
                            controls preload="auto" width="640px" height="500px" poster="{{ asset("images/about/cover.png") }}"
                            data-setup="{}">
                            <source src="{{ asset("videos/about.mp4") }}" type="video/mp4" />
                            <p class="vjs-no-js">
                              To view this video please enable JavaScript, and consider upgrading to a
                              web browser that
                              <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                video</a>
                            </p>
                            </video> --}}
                        </div>
                        <div class="absolute bottom-0 -left-9 z-[-1]">
                            <svg width="134" height="106" viewBox="0 0 134 106" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="1.66667" cy="104" r="1.66667" transform="rotate(-90 1.66667 104)"
                                    fill="white" />
                                <circle cx="16.3333" cy="104" r="1.66667" transform="rotate(-90 16.3333 104)"
                                    fill="white" />
                                <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)"
                                    fill="white" />
                                <circle cx="45.6667" cy="104" r="1.66667" transform="rotate(-90 45.6667 104)"
                                    fill="white" />
                                <circle cx="60.3333" cy="104" r="1.66667" transform="rotate(-90 60.3333 104)"
                                    fill="white" />
                                <circle cx="88.6667" cy="104" r="1.66667" transform="rotate(-90 88.6667 104)"
                                    fill="white" />
                                <circle cx="117.667" cy="104" r="1.66667" transform="rotate(-90 117.667 104)"
                                    fill="white" />
                                <circle cx="74.6667" cy="104" r="1.66667" transform="rotate(-90 74.6667 104)"
                                    fill="white" />
                                <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)"
                                    fill="white" />
                                <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)"
                                    fill="white" />
                                <circle cx="1.66667" cy="89.3333" r="1.66667"
                                    transform="rotate(-90 1.66667 89.3333)" fill="white" />
                                <circle cx="16.3333" cy="89.3333" r="1.66667"
                                    transform="rotate(-90 16.3333 89.3333)" fill="white" />
                                <circle cx="31" cy="89.3333" r="1.66667" transform="rotate(-90 31 89.3333)"
                                    fill="white" />
                                <circle cx="45.6667" cy="89.3333" r="1.66667"
                                    transform="rotate(-90 45.6667 89.3333)" fill="white" />
                                <circle cx="60.3333" cy="89.3338" r="1.66667"
                                    transform="rotate(-90 60.3333 89.3338)" fill="white" />
                                <circle cx="88.6667" cy="89.3338" r="1.66667"
                                    transform="rotate(-90 88.6667 89.3338)" fill="white" />
                                <circle cx="117.667" cy="89.3338" r="1.66667"
                                    transform="rotate(-90 117.667 89.3338)" fill="white" />
                                <circle cx="74.6667" cy="89.3338" r="1.66667"
                                    transform="rotate(-90 74.6667 89.3338)" fill="white" />
                                <circle cx="103" cy="89.3338" r="1.66667" transform="rotate(-90 103 89.3338)"
                                    fill="white" />
                                <circle cx="132" cy="89.3338" r="1.66667" transform="rotate(-90 132 89.3338)"
                                    fill="white" />
                                <circle cx="1.66667" cy="74.6673" r="1.66667"
                                    transform="rotate(-90 1.66667 74.6673)" fill="white" />
                                <circle cx="1.66667" cy="31.0003" r="1.66667"
                                    transform="rotate(-90 1.66667 31.0003)" fill="white" />
                                <circle cx="16.3333" cy="74.6668" r="1.66667"
                                    transform="rotate(-90 16.3333 74.6668)" fill="white" />
                                <circle cx="16.3333" cy="31.0003" r="1.66667"
                                    transform="rotate(-90 16.3333 31.0003)" fill="white" />
                                <circle cx="31" cy="74.6668" r="1.66667" transform="rotate(-90 31 74.6668)"
                                    fill="white" />
                                <circle cx="31" cy="31.0003" r="1.66667" transform="rotate(-90 31 31.0003)"
                                    fill="white" />
                                <circle cx="45.6667" cy="74.6668" r="1.66667"
                                    transform="rotate(-90 45.6667 74.6668)" fill="white" />
                                <circle cx="45.6667" cy="31.0003" r="1.66667"
                                    transform="rotate(-90 45.6667 31.0003)" fill="white" />
                                <circle cx="60.3333" cy="74.6668" r="1.66667"
                                    transform="rotate(-90 60.3333 74.6668)" fill="white" />
                                <circle cx="60.3333" cy="31.0001" r="1.66667"
                                    transform="rotate(-90 60.3333 31.0001)" fill="white" />
                                <circle cx="88.6667" cy="74.6668" r="1.66667"
                                    transform="rotate(-90 88.6667 74.6668)" fill="white" />
                                <circle cx="88.6667" cy="31.0001" r="1.66667"
                                    transform="rotate(-90 88.6667 31.0001)" fill="white" />
                                <circle cx="117.667" cy="74.6668" r="1.66667"
                                    transform="rotate(-90 117.667 74.6668)" fill="white" />
                                <circle cx="117.667" cy="31.0001" r="1.66667"
                                    transform="rotate(-90 117.667 31.0001)" fill="white" />
                                <circle cx="74.6667" cy="74.6668" r="1.66667"
                                    transform="rotate(-90 74.6667 74.6668)" fill="white" />
                                <circle cx="74.6667" cy="31.0001" r="1.66667"
                                    transform="rotate(-90 74.6667 31.0001)" fill="white" />
                                <circle cx="103" cy="74.6668" r="1.66667" transform="rotate(-90 103 74.6668)"
                                    fill="white" />
                                <circle cx="103" cy="31.0001" r="1.66667" transform="rotate(-90 103 31.0001)"
                                    fill="white" />
                                <circle cx="132" cy="74.6668" r="1.66667" transform="rotate(-90 132 74.6668)"
                                    fill="white" />
                                <circle cx="132" cy="31.0001" r="1.66667" transform="rotate(-90 132 31.0001)"
                                    fill="white" />
                                <circle cx="1.66667" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 1.66667 60.0003)" fill="white" />
                                <circle cx="1.66667" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 1.66667 16.3336)" fill="white" />
                                <circle cx="16.3333" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 16.3333 60.0003)" fill="white" />
                                <circle cx="16.3333" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 16.3333 16.3336)" fill="white" />
                                <circle cx="31" cy="60.0003" r="1.66667" transform="rotate(-90 31 60.0003)"
                                    fill="white" />
                                <circle cx="31" cy="16.3336" r="1.66667" transform="rotate(-90 31 16.3336)"
                                    fill="white" />
                                <circle cx="45.6667" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 45.6667 60.0003)" fill="white" />
                                <circle cx="45.6667" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 45.6667 16.3336)" fill="white" />
                                <circle cx="60.3333" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 60.3333 60.0003)" fill="white" />
                                <circle cx="60.3333" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 60.3333 16.3336)" fill="white" />
                                <circle cx="88.6667" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 88.6667 60.0003)" fill="white" />
                                <circle cx="88.6667" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 88.6667 16.3336)" fill="white" />
                                <circle cx="117.667" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 117.667 60.0003)" fill="white" />
                                <circle cx="117.667" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 117.667 16.3336)" fill="white" />
                                <circle cx="74.6667" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 74.6667 60.0003)" fill="white" />
                                <circle cx="74.6667" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 74.6667 16.3336)" fill="white" />
                                <circle cx="103" cy="60.0003" r="1.66667" transform="rotate(-90 103 60.0003)"
                                    fill="white" />
                                <circle cx="103" cy="16.3336" r="1.66667" transform="rotate(-90 103 16.3336)"
                                    fill="white" />
                                <circle cx="132" cy="60.0003" r="1.66667" transform="rotate(-90 132 60.0003)"
                                    fill="white" />
                                <circle cx="132" cy="16.3336" r="1.66667" transform="rotate(-90 132 16.3336)"
                                    fill="white" />
                                <circle cx="1.66667" cy="45.3336" r="1.66667"
                                    transform="rotate(-90 1.66667 45.3336)" fill="white" />
                                <circle cx="1.66667" cy="1.66683" r="1.66667"
                                    transform="rotate(-90 1.66667 1.66683)" fill="white" />
                                <circle cx="16.3333" cy="45.3336" r="1.66667"
                                    transform="rotate(-90 16.3333 45.3336)" fill="white" />
                                <circle cx="16.3333" cy="1.66683" r="1.66667"
                                    transform="rotate(-90 16.3333 1.66683)" fill="white" />
                                <circle cx="31" cy="45.3336" r="1.66667" transform="rotate(-90 31 45.3336)"
                                    fill="white" />
                                <circle cx="31" cy="1.66683" r="1.66667" transform="rotate(-90 31 1.66683)"
                                    fill="white" />
                                <circle cx="45.6667" cy="45.3336" r="1.66667"
                                    transform="rotate(-90 45.6667 45.3336)" fill="white" />
                                <circle cx="45.6667" cy="1.66683" r="1.66667"
                                    transform="rotate(-90 45.6667 1.66683)" fill="white" />
                                <circle cx="60.3333" cy="45.3338" r="1.66667"
                                    transform="rotate(-90 60.3333 45.3338)" fill="white" />
                                <circle cx="60.3333" cy="1.66707" r="1.66667"
                                    transform="rotate(-90 60.3333 1.66707)" fill="white" />
                                <circle cx="88.6667" cy="45.3338" r="1.66667"
                                    transform="rotate(-90 88.6667 45.3338)" fill="white" />
                                <circle cx="88.6667" cy="1.66707" r="1.66667"
                                    transform="rotate(-90 88.6667 1.66707)" fill="white" />
                                <circle cx="117.667" cy="45.3338" r="1.66667"
                                    transform="rotate(-90 117.667 45.3338)" fill="white" />
                                <circle cx="117.667" cy="1.66707" r="1.66667"
                                    transform="rotate(-90 117.667 1.66707)" fill="white" />
                                <circle cx="74.6667" cy="45.3338" r="1.66667"
                                    transform="rotate(-90 74.6667 45.3338)" fill="white" />
                                <circle cx="74.6667" cy="1.66707" r="1.66667"
                                    transform="rotate(-90 74.6667 1.66707)" fill="white" />
                                <circle cx="103" cy="45.3338" r="1.66667" transform="rotate(-90 103 45.3338)"
                                    fill="white" />
                                <circle cx="103" cy="1.66707" r="1.66667" transform="rotate(-90 103 1.66707)"
                                    fill="white" />
                                <circle cx="132" cy="45.3338" r="1.66667" transform="rotate(-90 132 45.3338)"
                                    fill="white" />
                                <circle cx="132" cy="1.66707" r="1.66667" transform="rotate(-90 132 1.66707)"
                                    fill="white" />
                            </svg>
                        </div>
                        <div class="absolute -top-6 -right-6 z-[-1]">
                            <svg width="134" height="106" viewBox="0 0 134 106" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="1.66667" cy="104" r="1.66667" transform="rotate(-90 1.66667 104)"
                                    fill="white" />
                                <circle cx="16.3333" cy="104" r="1.66667" transform="rotate(-90 16.3333 104)"
                                    fill="white" />
                                <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)"
                                    fill="white" />
                                <circle cx="45.6667" cy="104" r="1.66667" transform="rotate(-90 45.6667 104)"
                                    fill="white" />
                                <circle cx="60.3333" cy="104" r="1.66667" transform="rotate(-90 60.3333 104)"
                                    fill="white" />
                                <circle cx="88.6667" cy="104" r="1.66667" transform="rotate(-90 88.6667 104)"
                                    fill="white" />
                                <circle cx="117.667" cy="104" r="1.66667" transform="rotate(-90 117.667 104)"
                                    fill="white" />
                                <circle cx="74.6667" cy="104" r="1.66667" transform="rotate(-90 74.6667 104)"
                                    fill="white" />
                                <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)"
                                    fill="white" />
                                <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)"
                                    fill="white" />
                                <circle cx="1.66667" cy="89.3333" r="1.66667"
                                    transform="rotate(-90 1.66667 89.3333)" fill="white" />
                                <circle cx="16.3333" cy="89.3333" r="1.66667"
                                    transform="rotate(-90 16.3333 89.3333)" fill="white" />
                                <circle cx="31" cy="89.3333" r="1.66667" transform="rotate(-90 31 89.3333)"
                                    fill="white" />
                                <circle cx="45.6667" cy="89.3333" r="1.66667"
                                    transform="rotate(-90 45.6667 89.3333)" fill="white" />
                                <circle cx="60.3333" cy="89.3338" r="1.66667"
                                    transform="rotate(-90 60.3333 89.3338)" fill="white" />
                                <circle cx="88.6667" cy="89.3338" r="1.66667"
                                    transform="rotate(-90 88.6667 89.3338)" fill="white" />
                                <circle cx="117.667" cy="89.3338" r="1.66667"
                                    transform="rotate(-90 117.667 89.3338)" fill="white" />
                                <circle cx="74.6667" cy="89.3338" r="1.66667"
                                    transform="rotate(-90 74.6667 89.3338)" fill="white" />
                                <circle cx="103" cy="89.3338" r="1.66667" transform="rotate(-90 103 89.3338)"
                                    fill="white" />
                                <circle cx="132" cy="89.3338" r="1.66667" transform="rotate(-90 132 89.3338)"
                                    fill="white" />
                                <circle cx="1.66667" cy="74.6673" r="1.66667"
                                    transform="rotate(-90 1.66667 74.6673)" fill="white" />
                                <circle cx="1.66667" cy="31.0003" r="1.66667"
                                    transform="rotate(-90 1.66667 31.0003)" fill="white" />
                                <circle cx="16.3333" cy="74.6668" r="1.66667"
                                    transform="rotate(-90 16.3333 74.6668)" fill="white" />
                                <circle cx="16.3333" cy="31.0003" r="1.66667"
                                    transform="rotate(-90 16.3333 31.0003)" fill="white" />
                                <circle cx="31" cy="74.6668" r="1.66667" transform="rotate(-90 31 74.6668)"
                                    fill="white" />
                                <circle cx="31" cy="31.0003" r="1.66667" transform="rotate(-90 31 31.0003)"
                                    fill="white" />
                                <circle cx="45.6667" cy="74.6668" r="1.66667"
                                    transform="rotate(-90 45.6667 74.6668)" fill="white" />
                                <circle cx="45.6667" cy="31.0003" r="1.66667"
                                    transform="rotate(-90 45.6667 31.0003)" fill="white" />
                                <circle cx="60.3333" cy="74.6668" r="1.66667"
                                    transform="rotate(-90 60.3333 74.6668)" fill="white" />
                                <circle cx="60.3333" cy="31.0001" r="1.66667"
                                    transform="rotate(-90 60.3333 31.0001)" fill="white" />
                                <circle cx="88.6667" cy="74.6668" r="1.66667"
                                    transform="rotate(-90 88.6667 74.6668)" fill="white" />
                                <circle cx="88.6667" cy="31.0001" r="1.66667"
                                    transform="rotate(-90 88.6667 31.0001)" fill="white" />
                                <circle cx="117.667" cy="74.6668" r="1.66667"
                                    transform="rotate(-90 117.667 74.6668)" fill="white" />
                                <circle cx="117.667" cy="31.0001" r="1.66667"
                                    transform="rotate(-90 117.667 31.0001)" fill="white" />
                                <circle cx="74.6667" cy="74.6668" r="1.66667"
                                    transform="rotate(-90 74.6667 74.6668)" fill="white" />
                                <circle cx="74.6667" cy="31.0001" r="1.66667"
                                    transform="rotate(-90 74.6667 31.0001)" fill="white" />
                                <circle cx="103" cy="74.6668" r="1.66667" transform="rotate(-90 103 74.6668)"
                                    fill="white" />
                                <circle cx="103" cy="31.0001" r="1.66667" transform="rotate(-90 103 31.0001)"
                                    fill="white" />
                                <circle cx="132" cy="74.6668" r="1.66667" transform="rotate(-90 132 74.6668)"
                                    fill="white" />
                                <circle cx="132" cy="31.0001" r="1.66667" transform="rotate(-90 132 31.0001)"
                                    fill="white" />
                                <circle cx="1.66667" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 1.66667 60.0003)" fill="white" />
                                <circle cx="1.66667" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 1.66667 16.3336)" fill="white" />
                                <circle cx="16.3333" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 16.3333 60.0003)" fill="white" />
                                <circle cx="16.3333" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 16.3333 16.3336)" fill="white" />
                                <circle cx="31" cy="60.0003" r="1.66667" transform="rotate(-90 31 60.0003)"
                                    fill="white" />
                                <circle cx="31" cy="16.3336" r="1.66667" transform="rotate(-90 31 16.3336)"
                                    fill="white" />
                                <circle cx="45.6667" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 45.6667 60.0003)" fill="white" />
                                <circle cx="45.6667" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 45.6667 16.3336)" fill="white" />
                                <circle cx="60.3333" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 60.3333 60.0003)" fill="white" />
                                <circle cx="60.3333" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 60.3333 16.3336)" fill="white" />
                                <circle cx="88.6667" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 88.6667 60.0003)" fill="white" />
                                <circle cx="88.6667" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 88.6667 16.3336)" fill="white" />
                                <circle cx="117.667" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 117.667 60.0003)" fill="white" />
                                <circle cx="117.667" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 117.667 16.3336)" fill="white" />
                                <circle cx="74.6667" cy="60.0003" r="1.66667"
                                    transform="rotate(-90 74.6667 60.0003)" fill="white" />
                                <circle cx="74.6667" cy="16.3336" r="1.66667"
                                    transform="rotate(-90 74.6667 16.3336)" fill="white" />
                                <circle cx="103" cy="60.0003" r="1.66667" transform="rotate(-90 103 60.0003)"
                                    fill="white" />
                                <circle cx="103" cy="16.3336" r="1.66667" transform="rotate(-90 103 16.3336)"
                                    fill="white" />
                                <circle cx="132" cy="60.0003" r="1.66667" transform="rotate(-90 132 60.0003)"
                                    fill="white" />
                                <circle cx="132" cy="16.3336" r="1.66667" transform="rotate(-90 132 16.3336)"
                                    fill="white" />
                                <circle cx="1.66667" cy="45.3336" r="1.66667"
                                    transform="rotate(-90 1.66667 45.3336)" fill="white" />
                                <circle cx="1.66667" cy="1.66683" r="1.66667"
                                    transform="rotate(-90 1.66667 1.66683)" fill="white" />
                                <circle cx="16.3333" cy="45.3336" r="1.66667"
                                    transform="rotate(-90 16.3333 45.3336)" fill="white" />
                                <circle cx="16.3333" cy="1.66683" r="1.66667"
                                    transform="rotate(-90 16.3333 1.66683)" fill="white" />
                                <circle cx="31" cy="45.3336" r="1.66667" transform="rotate(-90 31 45.3336)"
                                    fill="white" />
                                <circle cx="31" cy="1.66683" r="1.66667" transform="rotate(-90 31 1.66683)"
                                    fill="white" />
                                <circle cx="45.6667" cy="45.3336" r="1.66667"
                                    transform="rotate(-90 45.6667 45.3336)" fill="white" />
                                <circle cx="45.6667" cy="1.66683" r="1.66667"
                                    transform="rotate(-90 45.6667 1.66683)" fill="white" />
                                <circle cx="60.3333" cy="45.3338" r="1.66667"
                                    transform="rotate(-90 60.3333 45.3338)" fill="white" />
                                <circle cx="60.3333" cy="1.66707" r="1.66667"
                                    transform="rotate(-90 60.3333 1.66707)" fill="white" />
                                <circle cx="88.6667" cy="45.3338" r="1.66667"
                                    transform="rotate(-90 88.6667 45.3338)" fill="white" />
                                <circle cx="88.6667" cy="1.66707" r="1.66667"
                                    transform="rotate(-90 88.6667 1.66707)" fill="white" />
                                <circle cx="117.667" cy="45.3338" r="1.66667"
                                    transform="rotate(-90 117.667 45.3338)" fill="white" />
                                <circle cx="117.667" cy="1.66707" r="1.66667"
                                    transform="rotate(-90 117.667 1.66707)" fill="white" />
                                <circle cx="74.6667" cy="45.3338" r="1.66667"
                                    transform="rotate(-90 74.6667 45.3338)" fill="white" />
                                <circle cx="74.6667" cy="1.66707" r="1.66667"
                                    transform="rotate(-90 74.6667 1.66707)" fill="white" />
                                <circle cx="103" cy="45.3338" r="1.66667" transform="rotate(-90 103 45.3338)"
                                    fill="white" />
                                <circle cx="103" cy="1.66707" r="1.66667" transform="rotate(-90 103 1.66707)"
                                    fill="white" />
                                <circle cx="132" cy="45.3338" r="1.66667" transform="rotate(-90 132 45.3338)"
                                    fill="white" />
                                <circle cx="132" cy="1.66707" r="1.66667" transform="rotate(-90 132 1.66707)"
                                    fill="white" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====== Hero Section End -->

    <!-- ====== About Section Start -->
    <section id="about" class="bg-transparent mt-10 pt-20 pb-20 lg:pt-[120px] lg:pb-[120px]">

        <div class="container mb-20">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4 lg:w-1/2">
                    <div class="items-center justify-between overflow-hidden">
                        <h1 class="text-4xl font-bold leading-tight text-[#090E34] lg:text-5xl" data-aos="fade-down">
                            A one stop business solution for your institute
                        </h1>
                    </div>
                </div>
                <div class="w-full px-4 mt-6 lg:w-1/2 lg:mt-0">
                    <div class="items-center justify-between overflow-hidden">
                        <div class="flex flex-row text-[#090E34] mb-12" data-aos="fade-up">                            
                            <i class="w-8 h-8 mr-5 fa-solid text-primary fa-layer-group"></i>                       
                            <div class="flex flex-col">
                                <h1 class="mb-2 text-2xl font-semibold leading-tight">
                                    Edu Hunt reports
                                </h1>
                                <p class="text-base font-normal leading-tight text-gray-600">
                                    Register with us and get detailed reports on leads and converted leads towards your institute.
                                </p>
                            </div>                            
                        </div>
                        <div class="flex flex-row text-[#090E34] mb-12" data-aos="fade-up" data-aos-delay="100">                            
                            <i class="w-8 h-8 mr-5 fa-solid text-primary fa-arrows-split-up-and-left"></i>                        
                            <div class="flex flex-col">
                                <h1 class="mb-2 text-2xl font-semibold leading-tight">
                                    Flexibility
                                </h1>
                                <p class="text-base font-normal leading-tight text-gray-600">
                                    Receive your EduHunt report at a time that suits you. We are flexible.
                                </p>
                            </div>                            
                        </div>
                        <div class="flex flex-row text-[#090E34] mb-12" data-aos="fade-up" data-aos-delay="200">                            
                            <i class="w-8 h-8 mr-5 fa-solid text-primary fa-money-bill"></i>                                
                            <div class="flex flex-col">
                                <h1 class="mb-2 text-2xl font-semibold leading-tight">
                                    Predictable costs and billing
                                </h1>
                                <p class="text-base font-normal leading-tight text-gray-600">
                                    Always know for what you are paying per month and how much you are paying. No hidden costs.
                                </p>
                            </div>                            
                        </div>
                        <div class="flex flex-row text-[#090E34] mb-12" data-aos="fade-up" data-aos-delay="300">                            
                            <i class="w-8 h-8 mr-5 fa-solid text-primary fa-headset"></i>                                
                            <div class="flex flex-col">
                                <h1 class="mb-2 text-2xl font-semibold leading-tight">
                                    24/7 support
                                </h1>
                                <p class="text-base font-normal leading-tight text-gray-600">
                                    We are always there to help you. Our support team is available 24/7 to help you with any issue.
                                </p>
                            </div>                            
                        </div>                        
                    </div>
                </div>
            </div>
        </div>

        <style>
            .more-info {
                background-image: linear-gradient(
                    45deg,
                    hsl(233deg 70% 12%) 1%,
                    hsl(232deg 70% 18%) 47%,
                    hsl(231deg 69% 25%) 51%,
                    hsl(229deg 68% 31%) 50%,
                    hsl(228deg 67% 38%) 49%,
                    hsl(227deg 65% 44%) 53%,
                    hsl(226deg 65% 51%) 99%
                ) !important;
                min-width: 100vw !important;
                min-height: 100vh !important;
            }
        </style>

        <div class="flex flex-col items-center justify-center p-20 mb-20 text-center more-info" data-aos="fade-zoom-in">
            <h1
            class="
              text-4xl
              uppercase
              tracking-[0.2em]
              text-white
              font-light
              sm:text-5xl
              lg:text-6xl
              xl:text-7xl
            "
          >
                <span class="mb-10 font-bold text-white">REGISTER</span> AND GET <br><br><span class="mb-10 font-bold text-white">FREE</span> ACCESS TO
            </h1>
            <br><br>
            <div class="grid w-full md:grid-cols-3 space-x-28 sm:grid-cols-1">
                <div class="flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="300">
                    <lottie-player src="{{asset('images/lottie/reports.json')}}" background="transparent"
                        speed="1" style="width: 200px; height: 200px;" loop autoplay></lottie-player>    
                    <h1 class="mb-2 text-2xl font-semibold leading-tight text-white">Edu Hunt Reports</h1>
                </div>
                <div class="flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="350">
                    <lottie-player src="{{asset('images/lottie/marketing.json')}}" background="transparent"
                        speed="1" style="width: 200px; height: 200px;" loop autoplay></lottie-player>    
                    <h1 class="mb-2 text-2xl font-semibold leading-tight text-white">Marketing</h1>
                </div>
                <div class="flex flex-col items-center text-center" data-aos="fade-up" data-aos-delay="400">
                    <lottie-player src="{{asset('images/lottie/support.json')}}" background="transparent"
                        speed="1" style="width: 200px; height: 200px;" loop autoplay></lottie-player>    
                    <h1 class="mb-2 text-2xl font-semibold leading-tight text-white">Personal Manager</h1>
                </div>
            </div>
        </div>

        <div class="container pt-20 md:pt-[120px]">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4">
                    <div class="top mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20" data-aos="fade-zoom-in" data-aos-delay="250">
                        <h2 class="mb-4 text-3xl font-bold text-primary sm:text-4xl md:text-[42px]" data-aos="fade-zoom-up" data-aos-easing="ease-in-back">
                            Exciting isn't it?
                        </h2>
                        <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed" data-aos="fade-zoom-up" data-aos-easing="ease-in-back" data-aos-delay="100">
                            We sure are excited to have you on board. Join us and give a boost to your institute's growth :)
                        </p>
                        <a
                        data-aos-easing="ease-in-back" data-aos-delay="200" data-aos="fade-zoom-up"
                        href="{{route('institute.signin') . '?s=1'}}"
                        class="inline-flex items-center justify-center px-6 py-4 mt-6 text-base font-medium text-white transition duration-300 ease-in-out rounded bg-primary hover:bg-dark"
                        >
                            Let's Go!
                        </a>
                        <lottie-player data-aos-easing="ease-in-back" data-aos-delay="300" data-aos="fade-zoom-up" src="{{asset('images/lottie/rocket.json')}}" class="mt-10" background="transparent"
                            speed="1" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-20 md:pt-[120px]">
            <div class="bg-white">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full px-4">
                        <div class="items-center justify-between overflow-hidden border lg:flex">
                            <div
                                data-aos="fade-zoom-up" data-aos-easing="ease-in-back"
                                class="w-full py-12 px-7 sm:px-12 md:p-16 lg:max-w-[565px] lg:py-9 lg:px-16 xl:max-w-[640px] xl:p-[70px]">
                                <span class="inline-block px-5 py-2 mb-5 text-sm font-medium text-white bg-primary">
                                    About Us
                                </span>
                                <h2 class="mb-6 text-3xl font-bold text-dark sm:text-4xl sm:leading-snug 2xl:text-[40px]">
                                    Your Partner in Revolutionizing Offline Learning
                                </h2>
                                <p class="text-base leading-relaxed mb-9 text-body-color">
                                    We are dedicated to changing the way students find and connect with quality tutorial services. Our platform brings together students, parents, and tutors to provide a comprehensive solution for offline learning. Our goal is to make it easier for students to get the help they need to succeed in their studies and for tutorial services to reach more students and grow their businesses.
                                </p>
                                <p class="text-base leading-relaxed mb-9 text-body-color">
                                    As a registered institute on our platform, you'll benefit from our expertise in digital marketing and our commitment to providing a seamless user experience. Our team of experts will work closely with you to understand your unique needs and help you achieve your goals. Whether you're just starting out or you're an established tutorial service, our platform is the perfect solution for growing your business and reaching more students. We're here to help, so get in touch with us today!
                                </p>
                            </div>
                            <div class="text-center">
                                <div class="relative z-10 inline-block" data-aos="fade-zoom-up" data-aos-easing="ease-in-back" data-aos-delay="150">
                                    <img src={{asset("images/about/about-image.gif")}} alt="image"
                                        class="mx-auto lg:ml-auto" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </section>
    <!-- ====== About Section End -->
{{-- 
    <!-- ====== Feature Section Start -->

    <section id="faq" class="relative top overflow-hidden pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4">
                    <div class="top mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20" data-aos="fade-zoom-in" data-aos-delay="250">
                        <span class="block mb-2 text-lg font-semibold text-primary">
                            FAQ
                        </span>
                        <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[42px]">
                            Any Questions? Answered
                        </h2>
                        <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
                            There are many variations of passages of Lorem Ipsum available
                            but the majority have suffered alteration in some form.
                        </p>
                    </div>
                </div>
            </div>            
        </div>
    </section> --}}


    <!-- ====== Faq Section Start -->
    <section id="faq" class="relative top overflow-hidden pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4">
                    <div class="top mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20" data-aos="fade-zoom-in" data-aos-delay="250">
                        <span class="block mb-2 text-lg font-semibold text-primary">
                            FAQ
                        </span>
                        <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[42px]">
                            Any Questions? Answered
                        </h2>
                        <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
                            Find answers to common questions about our platform
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4 lg:w-1/2">
                    <div class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8"
                        data-aos="fade-up" data-aos-delay="350"
              >
                        <button class="flex items-center w-full text-left faq-btn">
                            <div
                                class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
                                <svg width="17" height="10" viewBox="0 0 17 10" class="fill-current icon">
                                    <path
                                        d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                                        fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-base font-semibold text-black sm:text-lg">
                                    What are the benefits of registering with your platform?
                                </h4>
                            </div>
                        </button>
                        <div class="faq-content hidden pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                You will have access to a large student base, and will be able to reach more students with our marketing efforts.
                            </p>
                        </div>
                    </div>
                    <div class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8"
                        data-aos="fade-up" data-aos-delay="450"
              >
                        <button class="flex items-center w-full text-left faq-btn">
                            <div
                                class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
                                <svg width="17" height="10" viewBox="0 0 17 10" class="fill-current icon">
                                    <path
                                        d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                                        fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-base font-semibold text-black sm:text-lg">
                                    What are the requirements for registering?
                                </h4>
                            </div>
                        </button>
                        <div class="faq-content hidden pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                Your institute must be a legitimate tutorial service with a physical location.
                            </p>
                        </div>
                    </div>
                    <div class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8"
                        data-aos="fade-up" data-aos-delay="550"
              >
                        <button class="flex items-center w-full text-left faq-btn">
                            <div
                                class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
                                <svg width="17" height="10" viewBox="0 0 17 10" class="fill-current icon">
                                    <path
                                        d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                                        fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-base font-semibold text-black sm:text-lg">
                                    Can I update my institute's information after registering?
                                </h4>
                            </div>
                        </button>
                        <div class="faq-content hidden pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                Yes, you can update your institute's information at any time through your dashboard.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2">
                    <div class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8"
                        data-aos="fade-up" data-aos-delay="650"
              >
                        <button class="flex items-center w-full text-left faq-btn">
                            <div
                                class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
                                <svg width="17" height="10" viewBox="0 0 17 10" class="fill-current icon">
                                    <path
                                        d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                                        fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-base font-semibold text-black sm:text-lg">
                                    How do I reach more students on your platform?
                                </h4>
                            </div>
                        </button>
                        <div class="faq-content hidden pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                We offer a variety of marketing and promotion services to help you reach more students.
                            </p>
                        </div>
                    </div>
                    <div class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8"
                        data-aos="fade-up" data-aos-delay="750"
              >
                        <button class="flex items-center w-full text-left faq-btn">
                            <div
                                class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
                                <svg width="17" height="10" viewBox="0 0 17 10" class="fill-current icon">
                                    <path
                                        d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                                        fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-base font-semibold text-black sm:text-lg">
                                    What happens if a student has a complaint about my institute?
                                </h4>
                            </div>
                        </button>
                        <div class="faq-content hidden pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                Students can leave reviews of your institute on our platform, and we encourage you to respond to any complaints in a professional and timely manner.
                            </p>
                        </div>
                    </div>
                    <div class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8"
                        data-aos="fade-up" data-aos-delay="850"
              >
                        <button class="flex items-center w-full text-left faq-btn">
                            <div
                                class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary">
                                <svg width="17" height="10" viewBox="0 0 17 10" class="fill-current icon">
                                    <path
                                        d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                                        fill="#3056D3" stroke="#3056D3" />
                                </svg>
                            </div>
                            <div class="w-full">
                                <h4 class="text-base font-semibold text-black sm:text-lg">
                                    How do I manage my bookings on your platform?
                                </h4>
                            </div>
                        </button>
                        <div class="faq-content hidden pl-[62px]">
                            <p class="py-3 text-base leading-relaxed text-body-color">
                                You can manage your bookings through your Dashboard on our platform.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-0 right-0 z-[-1]" data-aos="zoom-in-up" data-aos-delay="650">
            <svg width="1440" height="886" viewBox="0 0 1440 886" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.5"
                    d="M193.307 -273.321L1480.87 1014.24L1121.85 1373.26C1121.85 1373.26 731.745 983.231 478.513 729.927C225.976 477.317 -165.714 85.6993 -165.714 85.6993L193.307 -273.321Z"
                    fill="url(#paint0_linear)" />
                <defs>
                    <linearGradient id="paint0_linear" x1="1308.65" y1="1142.58" x2="602.827" y2="-418.681"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#3056D3" stop-opacity="0.36" />
                        <stop offset="1" stop-color="#F5F2FD" stop-opacity="0" />
                        <stop offset="1" stop-color="#F5F2FD" stop-opacity="0.096144" />
                    </linearGradient>
                </defs>
            </svg>
        </div>
    </section>
    <!-- ====== Faq Section End -->

    <!-- ====== Testimonials Start ====== -->
    {{-- <section id="testimonials" class="pt-20 md:pt-[120px]">
        <div class="container px-4">
            <div class="flex flex-wrap">
                <div class="w-full mx-4">
                    <div class="mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20" data-aos="fade-zoom-in">
                        <span class="block mb-2 text-lg font-semibold text-primary">
                            Testimonials
                        </span>
                        <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[42px]">
                            What our Client Say
                        </h2>
                        <p class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed">
                            We are a team of professionals who are passionate about providing the best
                            services to our clients.
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="w-full px-4 md:w-1/2 lg:w-1/3" data-aos="fade-up" data-aos-delay="150">
                    <div class="p-8 mb-12 bg-white ud-single-testimonial shadow-testimonial"
                        data-wow-delay=".1s
              ">
                        <div class="flex items-center mb-3 ud-testimonial-ratings">
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                        </div>
                        <div class="mb-6 ud-testimonial-content">
                            <p class="text-base tracking-wide text-body-color">
                                “Our members are so impressed. It's intuitive. It's clean.
                                It's distraction free. If you're building a community.
                            </p>
                        </div>
                        <div class="flex items-center ud-testimonial-info">
                            <div class="ud-testimonial-image mr-5 h-[50px] w-[50px] overflow-hidden rounded-full">
                                <img src={{asset("images/testimonials/author-01.png")}} alt="author" />
                            </div>
                            <div class="ud-testimonial-meta">
                                <h4 class="text-sm font-semibold">Sabo Masties</h4>
                                <p class="text-xs text-[#969696]">Founder @ Rolex</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/3" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-8 mb-12 bg-white ud-single-testimonial shadow-testimonial"
                        data-wow-delay=".15s
              ">
                        <div class="flex items-center mb-3 ud-testimonial-ratings">
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                        </div>
                        <div class="mb-6 ud-testimonial-content">
                            <p class="text-base tracking-wide text-body-color">
                                “Our members are so impressed. It's intuitive. It's clean.
                                It's distraction free. If you're building a community.
                            </p>
                        </div>
                        <div class="flex items-center ud-testimonial-info">
                            <div class="ud-testimonial-image mr-5 h-[50px] w-[50px] overflow-hidden rounded-full">
                                <img src={{asset("images/testimonials/author-02.png")}} alt="author" />
                            </div>
                            <div class="ud-testimonial-meta">
                                <h4 class="text-sm font-semibold">Margin Gesmu</h4>
                                <p class="text-xs text-[#969696]">Founder @ UI Hunter</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 lg:w-1/3" data-aos="fade-up" data-aos-delay="450">
                    <div class="p-8 mb-12 bg-white ud-single-testimonial shadow-testimonial"
                        data-wow-delay=".2s
              ">
                        <div class="flex items-center mb-3 ud-testimonial-ratings">
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                            <span class="mr-1 text-[#fbb040]">
                                <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                    <path
                                        d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                                </svg>
                            </span>
                        </div>
                        <div class="mb-6 ud-testimonial-content">
                            <p class="text-base tracking-wide text-body-color">
                                “Our members are so impressed. It's intuitive. It's clean.
                                It's distraction free. If you're building a community.
                            </p>
                        </div>
                        <div class="flex items-center ud-testimonial-info">
                            <div class="ud-testimonial-image mr-5 h-[50px] w-[50px] overflow-hidden rounded-full">
                                <img src={{asset("images/testimonials/author-03.png")}} alt="author" />
                            </div>
                            <div class="ud-testimonial-meta">
                                <h4 class="text-sm font-semibold">William Smith</h4>
                                <p class="text-xs text-[#969696]">Founder @ Trorex</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </section> --}}
    <!-- ====== Testimonials End ====== -->



    <div id="contact">
        @include('includes.contact-form')
    </div>

    <!-- ====== All Scripts -->

    <script src={{ asset('js/institute/main.js') }}></script>
    <script>
        // ==== for menu scroll
        const pageLink = document.querySelectorAll(".ud-menu-scroll");

        function isValidHttpUrl(string) {
            let url;
            try {
                url = new URL(string);
            } catch (_) {
                return false;
            }
            return url.protocol === "http:" || url.protocol === "https:";
        }

        pageLink.forEach((elem) => {
            elem.addEventListener("click", (e) => {
                if (isValidUrl(elem.getAttribute("href"))){
                    return;
                }
                e.preventDefault();
                document.querySelector(elem.getAttribute("href")).scrollIntoView({
                    behavior: "smooth",
                    offsetTop: 1 - 60,
                });
            });
        });

        // section menu active
        function onScroll(event) {
            const sections = document.querySelectorAll(".ud-menu-scroll");
            const scrollPos =
                window.pageYOffset ||
                document.documentElement.scrollTop ||
                document.body.scrollTop;

            for (let i = 0; i < sections.length; i++) {
                const currLink = sections[i];
                const val = currLink.getAttribute("href");
                const refElement = document.querySelector(val);
                const scrollTopMinus = scrollPos + 73;
                if (
                    refElement.offsetTop <= scrollTopMinus &&
                    refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
                ) {
                    document
                        .querySelector(".ud-menu-scroll")
                        .classList.remove("active");
                    currLink.classList.add("active");
                } else {
                    currLink.classList.remove("active");
                }
            }
        }

        window.document.addEventListener("scroll", onScroll);
    </script>
    <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
@endsection