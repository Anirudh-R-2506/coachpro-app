@extends('layouts.default')

@section('content')
    <div id="details-modal"
        class="h-full p-4 fw-full md:inset-0">
        <div class="relative w-full h-full">
        <!-- Modal content -->
        <div class="bg-white rounded-lg dark:bg-gray-700">
            <!-- Modal header -->
            <div class="sticky top-0 right-0 flex items-center justify-between p-5 bg-transparent "
            style="box-shadow: none !important; backdrop-filter: blur(0px) !important;">
            </div>
            <!-- Modal body -->
            <div class="p-6 ">
            <section class="">
                <div class="container">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4">

                    <div
                        class="relative z-20 mb-[60px] h-[300px] overflow-hidden rounded md:h-[400px] lg:h-[500px]"
                        data-wow-delay=".1s
                                ">
                        <img src="{{ asset("images/hero/hero-image.jpg") }}" alt="image"
                        class="object-cover object-center w-full h-full" />

                    </div>
                    <div class="flex flex-wrap -mx-4">

                        <div class="w-full lg:w-8/12">
                        <nav
                            class="bg-white py-2.5 dark:bg-gray-900 sticky w-full z-100 top-0 left-0 border-b border-gray-200 dark:border-gray-600 mb-4">
                            <div class="flex flex-wrap items-start justify-between float-left w-full ">
                            </div>
                        </nav>
                        <div>
                            <div id="About-Company" class="p-4 mt-3 rounded-lg">
                            <div>
                                <h4
                                    class="mb-6 text-[16px] font-bold leading-snug text-dark sm:text-m sm:leading-snug md:text-m md:leading-snug mt-10"
                                    data-wow-delay=".1s
                                        ">
                                    Courses Offered
                                </h4>
                                @foreach($institute->courses as $course)
                                <div class="w-full max-w-sm p-4 lg:max-w-full">
                                    <div class="flex flex-col justify-between p-4 leading-normal bg-white border-b border-l border-r border-gray-400 rounded-b lg:border-l-0 lg:border-t lg:border-gray-400 lg:rounded-b-none lg:rounded-r">
                                        <div class="mb-8">
                                            <p class="flex items-center text-sm text-gray-600">
                                            <svg class="w-3 h-3 mr-2 text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />
                                            </svg>
                                            Gradify Score: {{$course->gradify_score}}
                                            </p>
                                            <div class="mb-2 text-xl font-bold text-gray-900">{{$course->name}}</div>
                                            <p class="text-base text-gray-700">{{$course->description}}</p>
                                        </div>
                                        <div class="text-lg">
                                            <div class="flex items-center justify-between w-full mb-2 text-left">
                                                <div class="flex flex-col items-center justify-between w-full mb-2">
                                                    <p class="leading-none text-gray-900">Yearly fee <p class="ml-2 text-gray-600">₹{{$course->fees}}</p></p>
                                                </div>
                                                <div class="flex flex-col items-center justify-between w-full mb-2">
                                                    <p class="leading-none text-gray-900">Duration <p class="ml-2 text-gray-600">{{$course->duration}}</p></p>
                                                </div>
                                            </div>
                                            <div class="flex items-center justify-between mb-2">
                                                <div class="flex flex-col items-center justify-between w-full mb-2">
                                                    <p class="leading-none text-gray-900">Rank <p class="ml-2 text-gray-600">{{$course->rank}}</p></p>
                                                </div>
                                                <div class="flex flex-col items-center justify-between w-full mb-2">
                                                    <p class="leading-none text-gray-900">Pre requisite <p class="ml-2 text-gray-600">{{$course->prerequisite()}}</p></p>
                                                </div>
                                            </div>                                            
                                            <p class="leading-none text-gray-900">Specialisations
                                                <p class="mb-2 text-gray-600">
                                                    @foreach ($course->specialisations as $spec)
                                                        {{$spec . ' '}}
                                                    @endforeach
                                                </p>
                                            </p>
                                            <p class="leading-none text-gray-900">Examinations
                                                <p class="text-gray-600">{{$course->examinations()}}</p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div>
                                <h4
                                class="mb-6 text-[16px] font-bold leading-snug text-dark sm:text-m sm:leading-snug md:text-m md:leading-snug"
                                data-wow-delay=".1s
                                    ">
                                Serving Areas
                            </h4>
                            <p class="mb-4 -my-4 text-base leading-relaxed text-body-color"
                                data-wow-delay=".1s">
                                {{$institute->locality->name}}, {{$institute->city->name}}
                            </p>
                            </div>
                            <hr class="mb-4 border-gray-200 dark:border-gray-600" />
                            <div>
                                <p class="mb-8 text-base leading-relaxed text-body-color" data-wow-delay=".1s">
                                    {{$institute->description}}
                                </p>
                            </div>                                                    
                            <hr class="mb-4 border-gray-200 dark:border-gray-600" />
                            <h4
                                class="mb-6 text-[16px] font-bold leading-snug text-dark sm:text-m sm:leading-snug md:text-m md:leading-snug"
                                data-wow-delay=".1s
                                    ">
                                Sample lecture
                            </h4>
                            <video id="my-video" class="w-full mb-10 video-js vjs-theme-sea" data-wow-delay=".1s"
                                controls preload="auto" width="640px" height="500px" poster="{{ asset("images/hero/hero-image.jpg") }}"
                                data-setup="{}">
                                <source src="{{ asset("videos/video.mp4") }}" type="video/mp4" />
                                <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                    video</a>
                                </p>
                            </video>

                            <hr class="mb-4 border-gray-200 dark:border-gray-600" />
                            <h4
                                class="mb-6 text-[16px] font-bold leading-snug text-dark sm:text-m sm:leading-snug md:text-m md:leading-snug"
                                data-wow-delay=".1s
                            ">
                                Photos [50]
                            </h4>
                            <div class="flex mb-6 space-x-4">
                                <img src="{{ asset("images/logo/logo.png") }}" class="object-cover w-1/4 h-32 rounded-lg" />
                                <img src="{{ asset("images/logo/logo.png") }}" class="object-cover w-1/4 h-32 rounded-lg" />
                                <img src="{{ asset("images/logo/logo.png") }}" class="object-cover w-1/4 h-32 rounded-lg" />
                                <img src="{{ asset("images/logo/logo.png") }}" class="object-cover w-1/4 h-32 rounded-lg" />


                            </div>
                            <hr class="mb-4 border-gray-200 dark:border-gray-600" />

                            </div>
                            <div class="flex items-center mb-5">
                                <p
                                    class="bg-blue-100 text-blue-800 text-sm font-semibold inline-flex items-center p-1.5 rounded dark:bg-blue-200 dark:text-blue-800">
                                    </p>
                                <p class="ml-2 font-medium text-gray-900 dark:text-white">Excellent</p>
                                <span class="w-1 h-1 mx-2 bg-gray-900 rounded-full dark:bg-gray-500"></span>
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">376 reviews</p>
                                <a href="#"
                                    class="ml-auto text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Read
                                    all reviews</a>
                            </div>
                            <div class="gap-8 sm:grid sm:grid-cols-2">
                            <div>
                                <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Academics</dt>
                                <dd class="flex items-center mb-3">
                                    <div class="w-full h-2 mr-2 bg-gray-200 rounded dark:bg-gray-700">
                                    <div class="h-2 rounded bg-primary dark:bg-blue-500" style="width: 88%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8.8</span>
                                </dd>
                                </dl>
                                <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Social Life</dt>
                                <dd class="flex items-center mb-3">
                                    <div class="w-full h-2 mr-2 bg-gray-200 rounded dark:bg-gray-700">
                                    <div class="h-2 rounded bg-primary dark:bg-blue-500" style="width: 89%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8.9</span>
                                </dd>
                                </dl>
                                <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Faculty</dt>
                                <dd class="flex items-center mb-3">
                                    <div class="w-full h-2 mr-2 bg-gray-200 rounded dark:bg-gray-700">
                                    <div class="h-2 rounded bg-primary dark:bg-blue-500" style="width: 88%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8.8</span>
                                </dd>
                                </dl>
                                <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Infrastructure</dt>
                                <dd class="flex items-center">
                                    <div class="w-full h-2 mr-2 bg-gray-200 rounded dark:bg-gray-700">
                                    <div class="h-2 rounded bg-primary dark:bg-blue-500" style="width: 54%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">5.4</span>
                                </dd>
                                </dl>
                            </div>
                            <div>
                                <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Acoomodation</dt>
                                <dd class="flex items-center mb-3">
                                    <div class="w-full h-2 mr-2 bg-gray-200 rounded dark:bg-gray-700">
                                    <div class="h-2 rounded bg-primary dark:bg-blue-500" style="width: 89%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8.9</span>
                                </dd>
                                </dl>
                                <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Placement</dt>
                                <dd class="flex items-center mb-3">
                                    <div class="w-full h-2 mr-2 bg-gray-200 rounded dark:bg-gray-700">
                                    <div class="h-2 rounded bg-primary dark:bg-blue-500" style="width: 70%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">7.0</span>
                                </dd>
                                </dl>
                                <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Location</dt>
                                <dd class="flex items-center">
                                    <div class="w-full h-2 mr-2 bg-gray-200 rounded dark:bg-gray-700">
                                    <div class="h-2 rounded bg-primary dark:bg-blue-500" style="width: 89%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8.9</span>
                                </dd>
                                </dl>
                            </div>
                            </div>
                            
                            <hr class="my-6 dark:border-gray-600" />

                            <!-- Comments/Reviews -->
                            <article class="md:gap-8 md:grid md:grid-cols-3">
                            <div>
                                <div class="flex items-center mb-6 space-x-4">
                                <img class="w-12 h-12 rounded-full" src="{{ asset("images/logo/favicon.png") }}" alt="">
                                <div class="space-y-1 font-medium dark:text-white">
                                    <p>Roshan Kumar</p>
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                    India
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-span-2 mt-6 md:mt-0">
                                <div class="flex items-start mb-5">
                                <div class="pr-4">
                                    <footer>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Reviewed: <time datetime="2022-01-20 19:00">January
                                        20, 2022</time></p>
                                    </footer>
                                    <h4 class="text-xl font-bold text-gray-900 dark:text-white">One of the best colleges to study</h4>
                                </div>
                                <p class="inline-flex items-center p-2 text-sm font-semibold text-white bg-blue-700 rounded">8.7</p>
                                </div>
                                <p class="mb-2 font-light text-gray-500 dark:text-gray-400">
                                    This college is an institutions of higher education that play a crucial role in preparing students for their future careers and personal development. These institutions offer a wide range of academic programs and degrees, providing students with the opportunity to specialize in their areas of interest. Colleges vary in size, focus, and offerings, but they typically provide a diverse and stimulating learning environment.
                                </p>
                                <aside class="flex items-center mt-3 space-x-5">
                                <a href="#" class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                                    <svg aria-hidden="true" class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z">
                                    </path>
                                    </svg>
                                    Helpful
                                </a>
                                <a href="#"
                                    class="inline-flex items-center text-sm font-medium text-blue-600 hover:underline dark:text-blue-500 group">
                                    <svg aria-hidden="true" class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z">
                                    </path>
                                    </svg>
                                    Not helpful
                                </a>
                                </aside>
                            </div>
                            </article>

                            <hr class="my-8 border-gray-300 dark:border-gray-700">

                            <!-- FAQs -->
                            <h4
                            class="mb-6 text-[16px] font-bold leading-snug text-dark sm:text-m sm:leading-snug md:text-m md:leading-snug"
                            data-wow-delay=".1s
                                                    ">
                            FAQs
                            </h4>
                            <div id="accordion-collapse" data-accordion="collapse">
                            <h2 id="accordion-collapse-heading-1">
                                <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                                <span>How do I know if I'm qualified?</span>
                                <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                                </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                                <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                                </div>
                            </div>
                            <h2 id="accordion-collapse-heading-2">
                                <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                                aria-controls="accordion-collapse-body-2">
                                <span>Are there any application fees?</span>
                                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                                </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                                <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                                </div>
                            </div>
                            <h2 id="accordion-collapse-heading-3">
                                <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                                data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                                aria-controls="accordion-collapse-body-3">
                                <span>What are the things I should carry to college?</span>
                                <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                                </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                                <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>
                                </div>
                            </div>
                            </div>



                            <!-- Social Media -->

                            <br>
                            <br>
                            <br>


                        </div>
                        </div>
                        <div class="w-full px-4 lg:w-4/12">
                        <div>
                            <div
                            class="relative mb-12 overflow-hidden rounded bg-primary py-[60px] px-11 text-center lg:px-8"
                            data-wow-delay=".1s
                                        ">
                            <h3 class="mb-2 text-2xl font-semibold text-white">
                                {{$institute->name}}
                            </h3>
                            <p class="mb-4 text-base text-white">
                                Everything you need to know
                            </p>
                            <div class="float-left">
                                <p class="mb-1 text-lg font-semibold text-white " style="text-align: initial;">
                                Rank
                                </p>
                                <p class="mb-3 text-sm font-medium text-gray-300 dark:text-gray-400"
                                style="text-align: initial;">
                                    {{$institute->rank}}
                                </p>
                                <p class="mb-1 text-lg font-semibold text-white " style="text-align: initial;">
                                Address
                                </p>
                                <p class="mb-3 text-sm font-medium text-gray-300 dark:text-gray-400"
                                style="text-align: initial;">
                                {{$institute->address}}
                                </p>
                                <p class="mb-1 text-lg font-semibold text-white " style="text-align: initial;">
                                Average Price Per Year
                                </p>
                                <p class="mb-3 text-sm font-medium text-gray-300 dark:text-gray-400"
                                style="text-align: initial;">
                                ₹{{$institute->avg_fees()}}
                                </p>
                            </div>
                            <form>
                                <input type="submit" value="Book now"
                                class="mb-6 h-[50px] w-full cursor-pointer rounded bg-white text-center text-sm font-medium text-primary transition duration-300 ease-in-out hover:bg-opacity-90 hover:shadow-lg" />
                                <input type="submit" value="Enquire now"
                                class="mb-6 h-[50px] w-full cursor-pointer rounded bg-[#13C296] text-center text-sm font-medium text-white transition duration-300 ease-in-out hover:bg-opacity-90 hover:shadow-lg" />
                            </form>

                            <div class="flex justify-center w-full space-x-5">
                                <i class="text-4xl text-white fa-brands fa-instagram"></i>
                                <i class="text-4xl text-white fa-brands fa-twitter"></i>
                                <i class="text-4xl text-white fa-brands fa-facebook"></i>
                            </div>

                            <div>
                                <span class="absolute top-0 right-0">
                                <svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="1.39737" cy="44.6026" r="1.39737" transform="rotate(-90 1.39737 44.6026)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="1.39737" cy="7.9913" r="1.39737" transform="rotate(-90 1.39737 7.9913)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="13.6943" cy="44.6026" r="1.39737" transform="rotate(-90 13.6943 44.6026)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="13.6943" cy="7.9913" r="1.39737" transform="rotate(-90 13.6943 7.9913)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="25.9911" cy="44.6026" r="1.39737" transform="rotate(-90 25.9911 44.6026)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="25.9911" cy="7.9913" r="1.39737" transform="rotate(-90 25.9911 7.9913)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="38.288" cy="44.6026" r="1.39737" transform="rotate(-90 38.288 44.6026)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="38.288" cy="7.9913" r="1.39737" transform="rotate(-90 38.288 7.9913)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="1.39737" cy="32.3058" r="1.39737" transform="rotate(-90 1.39737 32.3058)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="13.6943" cy="32.3058" r="1.39737" transform="rotate(-90 13.6943 32.3058)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="25.9911" cy="32.3058" r="1.39737" transform="rotate(-90 25.9911 32.3058)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="38.288" cy="32.3058" r="1.39737" transform="rotate(-90 38.288 32.3058)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="1.39737" cy="20.0086" r="1.39737" transform="rotate(-90 1.39737 20.0086)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="13.6943" cy="20.0086" r="1.39737" transform="rotate(-90 13.6943 20.0086)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="25.9911" cy="20.0086" r="1.39737" transform="rotate(-90 25.9911 20.0086)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="38.288" cy="20.0086" r="1.39737" transform="rotate(-90 38.288 20.0086)"
                                    fill="white" fill-opacity="0.44" />
                                </svg>
                                </span>
                                <span class="absolute bottom-0 left-0">
                                <svg width="46" height="46" viewBox="0 0 46 46" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="1.39737" cy="44.6026" r="1.39737" transform="rotate(-90 1.39737 44.6026)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="1.39737" cy="7.9913" r="1.39737" transform="rotate(-90 1.39737 7.9913)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="13.6943" cy="44.6026" r="1.39737" transform="rotate(-90 13.6943 44.6026)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="13.6943" cy="7.9913" r="1.39737" transform="rotate(-90 13.6943 7.9913)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="25.9911" cy="44.6026" r="1.39737" transform="rotate(-90 25.9911 44.6026)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="25.9911" cy="7.9913" r="1.39737" transform="rotate(-90 25.9911 7.9913)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="38.288" cy="44.6026" r="1.39737" transform="rotate(-90 38.288 44.6026)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="38.288" cy="7.9913" r="1.39737" transform="rotate(-90 38.288 7.9913)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="1.39737" cy="32.3058" r="1.39737" transform="rotate(-90 1.39737 32.3058)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="13.6943" cy="32.3058" r="1.39737" transform="rotate(-90 13.6943 32.3058)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="25.9911" cy="32.3058" r="1.39737" transform="rotate(-90 25.9911 32.3058)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="38.288" cy="32.3058" r="1.39737" transform="rotate(-90 38.288 32.3058)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="1.39737" cy="20.0086" r="1.39737" transform="rotate(-90 1.39737 20.0086)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="13.6943" cy="20.0086" r="1.39737" transform="rotate(-90 13.6943 20.0086)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="25.9911" cy="20.0086" r="1.39737" transform="rotate(-90 25.9911 20.0086)"
                                    fill="white" fill-opacity="0.44" />
                                    <circle cx="38.288" cy="20.0086" r="1.39737" transform="rotate(-90 38.288 20.0086)"
                                    fill="white" fill-opacity="0.44" />
                                </svg>
                                </span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>

            </div>
            <!-- Modal footer -->
            <!-- <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    
                </div> -->
        </div>
        </div>
    </div>
    <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
@endsection