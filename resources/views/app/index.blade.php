@extends('layouts.default')

@section('content')
  <!-- Details modal -->
  <!-- Large Modal -->
  <div id="details-modal" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-7xl md:h-auto">
      <!-- Modal content -->
      <div class="bg-white rounded-lg dark:bg-gray-700" style="overflow-y: auto; max-height: 90vh;">
        <!-- Modal header -->
        <div class="sticky top-0 right-0 flex items-center justify-between p-5 bg-transparent "
          style="box-shadow: none !important; backdrop-filter: blur(0px) !important;">

          <button type="button"
            class="text-gray-400 bg-transparent  hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:text-white"
            data-modal-toggle="details-modal">
            <i class="fa-solid fa-xmark fa-2xl hover:text-red-600"></i>
            <span class="sr-only">Close modal</span>
          </button>
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

                          <div class="items-center justify-between hidden w-full bg-white md:flex md:order-1"
                            id="navbar-sticky">
                            <ul
                              class="flex flex-col w-full py-4 mt-4 border border-gray-100 bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                              <li>
                                <a href="#"
                                  class="block py-2 pl-3 pr-4 text-white bg-blue-700 border-b-2 md:bg-transparent md:text-blue-700 md:p-0 dark:text-white border-primary"
                                  aria-current="page">About Company</a>
                              </li>
                              <li>
                                <a href="#"
                                  class="block py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Photos</a>
                              </li>
                              <li>
                                <a href="#"
                                  class="block py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Reviews</a>
                              </li>
                              <li>
                                <a href="#"
                                  class="block py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">FAQs</a>
                              </li>
                              <li>
                                <a href="#"
                                  class="block py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Social
                                  Media</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </nav>
                      <div>
                        <div id="About-Company" class="p-4 mt-3 rounded-lg">

                            <div>
                                <h4
                                    class="mb-6 text-[16px] font-bold leading-snug text-dark sm:text-m sm:leading-snug md:text-m md:leading-snug mt-10"
                                    data-wow-delay=".1s
                                        ">
                                    EduHunt score
                                </h4>
                                <p class="-my-4 text-base leading-relaxed text-body-color"
                                    data-wow-delay=".1s">
                                    <strong>4.5</strong> out of 5
                                </p>
                            </div>
                          <div>
                            <h4
                                class="mb-6 text-[16px] font-bold leading-snug text-dark sm:text-m sm:leading-snug md:text-m md:leading-snug mt-10"
                                data-wow-delay=".1s
                                    ">
                                Courses Offered
                            </h4>
                            <p class="mb-4 -my-4 text-base leading-relaxed text-body-color"
                                data-wow-delay=".1s">
                                JEE NEET coaching
                            </p>
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
                            Chandigarh
                          </p>
                          </div>
                          <div>
                            <h4
                            class="mb-6 text-[16px] font-bold leading-snug text-dark sm:text-m sm:leading-snug md:text-m md:leading-snug"
                            data-wow-delay=".1s
                                ">
                            Document verification
                            </h4>
                            <div class="flex items-start justify-start mb-2 space-x-3 w-fit">
                                <i class="fas fa-university"></i>
                                <p class="-my-2 leading-relaxed text-body-color">
                                    Bank details
                                </p>
                                <i class="text-green-500 fas fa-check-circle"></i>
                            </div>
                            <div class="flex items-start justify-start mb-2 space-x-3 w-fit">
                                <i class="fas fa-location-arrow"></i>
                                <p class="-my-2 leading-relaxed text-body-color">
                                    Location details
                                </p>
                                <i class="text-green-500 fas fa-check-circle"></i>
                            </div>
                          </div>
                          <hr class="mb-4 border-gray-200 dark:border-gray-600" />
                          <div>
                            <p class="mb-8 text-base leading-relaxed text-body-color" data-wow-delay=".1s">
                                Academy is a unique institute which primarily focuses on rendering best teaching, scoring high marks, motivating students, developing soft skills to the engineering students and also guiding them on their final year projects. We provide coaching exclusively for engineering students of all branches from various backgrounds like B.E/ B.Tech, M.E/M.Tech, B.S, AMIE & Diploma of different universities. The coaching is provided by expert faculties from reputed engineering colleges. There are around 48 faculties handling 82 distinct subjects. We offer assistance to the student both in U.G & P.G degrees, irrespective of their skill or ability by fixing the suitable faculty.Contact us for further details.
                            </p>
                          </div>                                                    
                          <hr class="mb-4 border-gray-200 dark:border-gray-600" />
                          <h4
                            class="mb-6 text-[16px] font-bold leading-snug text-dark sm:text-m sm:leading-snug md:text-m md:leading-snug"
                            data-wow-delay=".1s
                                ">
                            Sample lecture
                          </h4>
                          <video id="my-video" class="mb-10 video-js vjs-theme-sea" data-wow-delay=".1s"
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
                            8.7</p>
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
                              <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Staff</dt>
                              <dd class="flex items-center mb-3">
                                <div class="w-full h-2 mr-2 bg-gray-200 rounded dark:bg-gray-700">
                                  <div class="h-2 rounded bg-primary dark:bg-blue-500" style="width: 88%"></div>
                                </div>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8.8</span>
                              </dd>
                            </dl>
                            <dl>
                              <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Comfort</dt>
                              <dd class="flex items-center mb-3">
                                <div class="w-full h-2 mr-2 bg-gray-200 rounded dark:bg-gray-700">
                                  <div class="h-2 rounded bg-primary dark:bg-blue-500" style="width: 89%"></div>
                                </div>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8.9</span>
                              </dd>
                            </dl>
                            <dl>
                              <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Free WiFi</dt>
                              <dd class="flex items-center mb-3">
                                <div class="w-full h-2 mr-2 bg-gray-200 rounded dark:bg-gray-700">
                                  <div class="h-2 rounded bg-primary dark:bg-blue-500" style="width: 88%"></div>
                                </div>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8.8</span>
                              </dd>
                            </dl>
                            <dl>
                              <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Facilities</dt>
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
                              <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Value for money</dt>
                              <dd class="flex items-center mb-3">
                                <div class="w-full h-2 mr-2 bg-gray-200 rounded dark:bg-gray-700">
                                  <div class="h-2 rounded bg-primary dark:bg-blue-500" style="width: 89%"></div>
                                </div>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">8.9</span>
                              </dd>
                            </dl>
                            <dl>
                              <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Cleanliness</dt>
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
                              <img class="w-10 h-10 rounded-full" src="{{ asset("images/logo/favicon.svg") }}" alt="">
                              <div class="space-y-1 font-medium dark:text-white">
                                <p>Jese Leos</p>
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                  <svg aria-hidden="true" class="w-5 mr-1.5" viewBox="0 0 18 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.0531311" width="17" height="12.1429" rx="2" fill="white" />
                                    <mask id="mask0_3885_33060" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="18"
                                      height="13">
                                      <rect x="0.0531311" width="17" height="12.1429" rx="2" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_3885_33060)">
                                      <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.0531 0H0.0531311V0.809524H17.0531V0ZM17.0531 1.61905H0.0531311V2.42857H17.0531V1.61905ZM0.0531311 3.2381H17.0531V4.04762H0.0531311V3.2381ZM17.0531 4.85714H0.0531311V5.66667H17.0531V4.85714ZM0.0531311 6.47619H17.0531V7.28572H0.0531311V6.47619ZM17.0531 8.09524H0.0531311V8.90476H17.0531V8.09524ZM0.0531311 9.71429H17.0531V10.5238H0.0531311V9.71429ZM17.0531 11.3333H0.0531311V12.1429H17.0531V11.3333Z"
                                        fill="#D02F44" />
                                      <rect x="0.0531311" width="7.28571" height="5.66667" fill="#46467F" />
                                      <g filter="url(#filter0_d_3885_33060)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M1.67216 1.21427C1.67216 1.43782 1.49095 1.61903 1.2674 1.61903C1.04386 1.61903 0.86264 1.43782 0.86264 1.21427C0.86264 0.990727 1.04386 0.809509 1.2674 0.809509C1.49095 0.809509 1.67216 0.990727 1.67216 1.21427ZM3.29121 1.21427C3.29121 1.43782 3.10999 1.61903 2.88645 1.61903C2.66291 1.61903 2.48169 1.43782 2.48169 1.21427C2.48169 0.990727 2.66291 0.809509 2.88645 0.809509C3.10999 0.809509 3.29121 0.990727 3.29121 1.21427ZM4.5055 1.61903C4.72904 1.61903 4.91026 1.43782 4.91026 1.21427C4.91026 0.990727 4.72904 0.809509 4.5055 0.809509C4.28195 0.809509 4.10074 0.990727 4.10074 1.21427C4.10074 1.43782 4.28195 1.61903 4.5055 1.61903ZM6.52931 1.21427C6.52931 1.43782 6.34809 1.61903 6.12455 1.61903C5.901 1.61903 5.71978 1.43782 5.71978 1.21427C5.71978 0.990727 5.901 0.809509 6.12455 0.809509C6.34809 0.809509 6.52931 0.990727 6.52931 1.21427ZM2.07693 2.42856C2.30047 2.42856 2.48169 2.24734 2.48169 2.0238C2.48169 1.80025 2.30047 1.61903 2.07693 1.61903C1.85338 1.61903 1.67216 1.80025 1.67216 2.0238C1.67216 2.24734 1.85338 2.42856 2.07693 2.42856ZM4.10074 2.0238C4.10074 2.24734 3.91952 2.42856 3.69597 2.42856C3.47243 2.42856 3.29121 2.24734 3.29121 2.0238C3.29121 1.80025 3.47243 1.61903 3.69597 1.61903C3.91952 1.61903 4.10074 1.80025 4.10074 2.0238ZM5.31502 2.42856C5.53856 2.42856 5.71978 2.24734 5.71978 2.0238C5.71978 1.80025 5.53856 1.61903 5.31502 1.61903C5.09148 1.61903 4.91026 1.80025 4.91026 2.0238C4.91026 2.24734 5.09148 2.42856 5.31502 2.42856ZM6.52931 2.83332C6.52931 3.05686 6.34809 3.23808 6.12455 3.23808C5.901 3.23808 5.71978 3.05686 5.71978 2.83332C5.71978 2.60978 5.901 2.42856 6.12455 2.42856C6.34809 2.42856 6.52931 2.60978 6.52931 2.83332ZM4.5055 3.23808C4.72904 3.23808 4.91026 3.05686 4.91026 2.83332C4.91026 2.60978 4.72904 2.42856 4.5055 2.42856C4.28195 2.42856 4.10074 2.60978 4.10074 2.83332C4.10074 3.05686 4.28195 3.23808 4.5055 3.23808ZM3.29121 2.83332C3.29121 3.05686 3.10999 3.23808 2.88645 3.23808C2.66291 3.23808 2.48169 3.05686 2.48169 2.83332C2.48169 2.60978 2.66291 2.42856 2.88645 2.42856C3.10999 2.42856 3.29121 2.60978 3.29121 2.83332ZM1.2674 3.23808C1.49095 3.23808 1.67216 3.05686 1.67216 2.83332C1.67216 2.60978 1.49095 2.42856 1.2674 2.42856C1.04386 2.42856 0.86264 2.60978 0.86264 2.83332C0.86264 3.05686 1.04386 3.23808 1.2674 3.23808ZM2.48169 3.64284C2.48169 3.86639 2.30047 4.04761 2.07693 4.04761C1.85338 4.04761 1.67216 3.86639 1.67216 3.64284C1.67216 3.4193 1.85338 3.23808 2.07693 3.23808C2.30047 3.23808 2.48169 3.4193 2.48169 3.64284ZM3.69597 4.04761C3.91952 4.04761 4.10074 3.86639 4.10074 3.64284C4.10074 3.4193 3.91952 3.23808 3.69597 3.23808C3.47243 3.23808 3.29121 3.4193 3.29121 3.64284C3.29121 3.86639 3.47243 4.04761 3.69597 4.04761ZM5.71978 3.64284C5.71978 3.86639 5.53856 4.04761 5.31502 4.04761C5.09148 4.04761 4.91026 3.86639 4.91026 3.64284C4.91026 3.4193 5.09148 3.23808 5.31502 3.23808C5.53856 3.23808 5.71978 3.4193 5.71978 3.64284ZM6.12455 4.85713C6.34809 4.85713 6.52931 4.67591 6.52931 4.45237C6.52931 4.22882 6.34809 4.04761 6.12455 4.04761C5.901 4.04761 5.71978 4.22882 5.71978 4.45237C5.71978 4.67591 5.901 4.85713 6.12455 4.85713ZM4.91026 4.45237C4.91026 4.67591 4.72904 4.85713 4.5055 4.85713C4.28195 4.85713 4.10074 4.67591 4.10074 4.45237C4.10074 4.22882 4.28195 4.04761 4.5055 4.04761C4.72904 4.04761 4.91026 4.22882 4.91026 4.45237ZM2.88645 4.85713C3.10999 4.85713 3.29121 4.67591 3.29121 4.45237C3.29121 4.22882 3.10999 4.04761 2.88645 4.04761C2.66291 4.04761 2.48169 4.22882 2.48169 4.45237C2.48169 4.67591 2.66291 4.85713 2.88645 4.85713ZM1.67216 4.45237C1.67216 4.67591 1.49095 4.85713 1.2674 4.85713C1.04386 4.85713 0.86264 4.67591 0.86264 4.45237C0.86264 4.22882 1.04386 4.04761 1.2674 4.04761C1.49095 4.04761 1.67216 4.22882 1.67216 4.45237Z"
                                          fill="url(#paint0_linear_3885_33060)" />
                                      </g>
                                    </g>
                                    <defs>
                                      <filter id="filter0_d_3885_33060" x="0.86264" y="0.809509" width="5.66666" height="5.04761"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
                                          result="hardAlpha" />
                                        <feOffset dy="1" />
                                        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.06 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_3885_33060" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_3885_33060" result="shape" />
                                      </filter>
                                      <linearGradient id="paint0_linear_3885_33060" x1="0.86264" y1="0.809509" x2="0.86264" y2="4.85713"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" />
                                        <stop offset="1" stop-color="#F0F0F0" />
                                      </linearGradient>
                                    </defs>
                                  </svg>
                                  United States
                                </div>
                              </div>
                            </div>
                            <ul class="space-y-4 text-sm text-gray-500 dark:text-gray-400">
                              <li class="flex items-center"><svg aria-hidden="true" class="w-4 h-4 mr-1.5" fill="currentColor"
                                  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                    clip-rule="evenodd"></path>
                                </svg>Apartament with City View</li>
                              <li class="flex items-center"><svg aria-hidden="true" class="w-4 h-4 mr-1.5" fill="currentColor"
                                  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                                </svg>3 nights December 2021</li>
                              <li class="flex items-center"><svg aria-hidden="true" class="w-4 h-4 mr-1.5" fill="currentColor"
                                  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                  <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                  </path>
                                </svg>Family</li>
                            </ul>
                          </div>
                          <div class="col-span-2 mt-6 md:mt-0">
                            <div class="flex items-start mb-5">
                              <div class="pr-4">
                                <footer>
                                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Reviewed: <time datetime="2022-01-20 19:00">January
                                      20, 2022</time></p>
                                </footer>
                                <h4 class="text-xl font-bold text-gray-900 dark:text-white">Spotless, good appliances, excellent layout, host
                                  was genuinely nice and helpful.</h4>
                              </div>
                              <p class="inline-flex items-center p-2 text-sm font-semibold text-white bg-blue-700 rounded">8.7</p>
                            </div>
                            <p class="mb-2 font-light text-gray-500 dark:text-gray-400">The flat was spotless, very comfortable, and the host
                              was amazing. I highly recommend this accommodation for anyone visiting Brasov city centre. It's quite a while
                              since we are no longer using hotel facilities but self contained places. And the main reason is poor cleanliness
                              and staff not being trained properly. This place exceeded our expectation and will return for sure.</p>
                            <p class="mb-5 font-light text-gray-500 dark:text-gray-400">It is obviously not the same build quality as those very
                              expensive watches. But that is like comparing a Citroën to a Ferrari. This watch was well under £100! An absolute
                              bargain.</p>
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
                              <span>What is Flowbite?</span>
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
                              <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components
                                built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                              <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a
                                  href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get
                                  started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
                            </div>
                          </div>
                          <h2 id="accordion-collapse-heading-2">
                            <button type="button"
                              class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                              data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                              aria-controls="accordion-collapse-body-2">
                              <span>Is there a Figma file available?</span>
                              <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                              </svg>
                            </button>
                          </h2>
                          <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                            <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700">
                              <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma
                                software so everything you see in the library has a design equivalent in our Figma file.</p>
                              <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/"
                                  class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes
                                from Tailwind CSS and components from Flowbite.</p>
                            </div>
                          </div>
                          <h2 id="accordion-collapse-heading-3">
                            <button type="button"
                              class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                              data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                              aria-controls="accordion-collapse-body-3">
                              <span>What are the differences between Flowbite and Tailwind UI?</span>
                              <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                              </svg>
                            </button>
                          </h2>
                          <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                            <div class="p-5 font-light border border-t-0 border-gray-200 dark:border-gray-700">
                              <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Flowbite are
                                open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Flowbite
                                relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
                              <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro,
                                and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                              <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                              <ul class="pl-5 text-gray-500 list-disc dark:text-gray-400">
                                <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite
                                    Pro</a></li>
                                <li><a href="https://tailwindui.com/" rel="nofollow"
                                    class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                              </ul>
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
                            FIITJEE Blore
                          </h3>
                          <p class="mb-4 text-base text-white">
                            Everything you need to know
                          </p>
                          <div class="float-left">
                            <p class="mb-1 text-lg font-semibold text-white " style="text-align: initial;">
                              Rating
                            </p>
                            <div class="flex items-center mb-3">
                              <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>First star</title>
                                <path
                                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                              </svg>
                              <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Second star</title>
                                <path
                                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                              </svg>
                              <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Third star</title>
                                <path
                                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                              </svg>
                              <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Fourth star</title>
                                <path
                                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                              </svg>
                              <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Fifth star</title>
                                <path
                                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                              </svg>
                              <p class="ml-2 text-sm font-medium text-gray-300 dark:text-gray-400">4.95 out of 5</p>
                            </div>
                            <p class="mb-1 text-lg font-semibold text-white " style="text-align: initial;">
                              Address
                            </p>
                            <p class="mb-3 text-sm font-medium text-gray-300 dark:text-gray-400"
                              style="text-align: initial;">
                              1234 Main Street, New York, NY 10001
                            </p>
                            <p class="mb-1 text-lg font-semibold text-white " style="text-align: initial;">
                              Price per year
                            </p>
                            <p class="mb-3 text-sm font-medium text-gray-300 dark:text-gray-400"
                              style="text-align: initial;">
                              ₹1,00,000
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

  <div class="mx-4 mt-10 bg-[#fff] pt-10 pb-10 lg:pt-[120px] lg:pb-[120px] p-10">




    <!-- Main modal -->
    <div id="crypto-modal" tabindex="-1" aria-hidden="true"
      class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
      <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <button type="button"
            class="absolute inline-flex items-center p-1 ml-auto text-sm text-gray-400 bg-transparent rounded-lg top-3 right-3 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
            data-modal-toggle="crypto-modal">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
          <!-- Modal header -->
          <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
            <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
              Select Filter
            </h3>
          </div>
          <!-- Modal body -->
          <div class="p-6">
            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Select one of the below given filters to
              apply it to your search</p>
            <ul class="my-4 space-y-3">
              <li>
                <a href="#"
                  class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <i class="fa-solid fa-lightbulb"></i>
                  <span class="flex-1 ml-3 whitespace-nowrap">Coach-Pro Score</span>
                  <span
                    class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Popular</span>
                </a>
              </li>
              <li>
                <a href="#"
                  class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <i class="fa-solid fa-location-dot"></i>
                  <span class="flex-1 ml-3 whitespace-nowrap">Locality</span>
                </a>
              </li>

              <li>
                <a href="#"
                  class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <i class="fa-solid fa-arrow-down-short-wide"></i>
                  <span class="flex-1 ml-3 whitespace-nowrap">Price (low to high)</span>
                </a>
              </li>
              <li>
                <a href="#"
                  class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <i class="fa-solid fa-arrow-up-wide-short"></i>
                  <span class="flex-1 ml-3 whitespace-nowrap">Price (High to Low)</span>
                </a>
              </li>
              <li>
                <a href="#"
                  class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <i class="fa-solid fa-star"></i>
                  <span class="flex-1 ml-3 whitespace-nowrap">Student Ratings</span>
                </a>
              </li>
              <li>
                <a href="#"
                  class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                  <i class="fa-solid fa-pencil"></i>
                  <span class="flex-1 ml-3 whitespace-nowrap">Student Reviews</span>
                </a>
              </li>
            </ul>
            {{-- <div>
              <a href="#"
                class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline dark:text-gray-400">
                <svg aria-hidden="true" class="w-3 h-3 mr-2" aria-hidden="true" focusable="false" data-prefix="far"
                  data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path fill="currentColor"
                    d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z">
                  </path>
                </svg>
                Why do I need to connect with my wallet?</a>
            </div> --}}
          </div>
        </div>
      </div>
    </div>



    <div class="items-center mt-10">



      <section class="">

        <div class="container">
          <div class="mb-4 -mx-4">
            <button type="button" data-modal-toggle="crypto-modal"
              class="inline-flex items-center px-3 py-3 text-sm font-medium text-center text-white rounded-lg bg-primary focus:ring-4 focus:outline-none">
              <i class="pr-2 fa-solid fa-filter"></i>
              Sort By
            </button>
          </div>
          <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/2 lg:w-1/3">

              <div class="mb-6 group" data-wow-delay=".1s">
                <div class="mb-8 overflow-hidden rounded">
                  <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                      <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                      <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">FIITJEE Blore
                        </h5>
                      </a>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Electronic city, Bangalore</p>
                      <div class="flex items-center mb-3">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>First star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Second star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Third star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Fourth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Fifth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">4.95 out of 5</p>
                      </div>
                      <button data-modal-toggle="details-modal"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        See more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
              <div class="mb-6 group" data-wow-delay=".1s">
                <div class="mb-8 overflow-hidden rounded">
                  <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                      <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                      <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">FIITJEE Blore
                        </h5>
                      </a>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Electronic city, Bangalore</p>
                      <div class="flex items-center mb-3">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>First star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Second star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Third star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Fourth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Fifth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">4.95 out of 5</p>
                      </div>
                      <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        See more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
              <div class="mb-6 group" data-wow-delay=".1s">
                <div class="mb-8 overflow-hidden rounded">
                  <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                      <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                      <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">FIITJEE Blore
                        </h5>
                      </a>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Electronic city, Bangalore</p>
                      <div class="flex items-center mb-3">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>First star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Second star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Third star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Fourth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Fifth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">4.95 out of 5</p>
                      </div>
                      <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        See more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
              <div class="mb-6 group" data-wow-delay=".1s">
                <div class="mb-8 overflow-hidden rounded">
                  <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                      <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                      <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">FIITJEE Blore
                        </h5>
                      </a>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Electronic city, Bangalore</p>
                      <div class="flex items-center mb-3">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>First star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Second star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Third star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Fourth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Fifth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">4.95 out of 5</p>
                      </div>
                      <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        See more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
              <div class="mb-6 group" data-wow-delay=".1s">
                <div class="mb-8 overflow-hidden rounded">
                  <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                      <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                      <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">FIITJEE Blore
                        </h5>
                      </a>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Electronic city, Bangalore</p>

                      <div class="flex items-center mb-3">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>First star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Second star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Third star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Fourth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Fifth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">4.95 out of 5</p>
                      </div>

                      <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        See more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                        </svg>
                      </a>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
              <div class="mb-6 group" data-wow-delay=".1s">
                <div class="mb-8 overflow-hidden rounded">
                  <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                      <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />
                    </a>
                    <div class="p-5">
                      <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">FIITJEE Blore
                        </h5>
                      </a>
                      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Electronic city, Bangalore</p>
                      <div class="flex items-center mb-3">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>First star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Second star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Third star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <title>Fourth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <title>Fifth star</title>
                          <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                          </path>
                        </svg>
                        <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">4.95 out of 5</p>
                      </div>
                      <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        See more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                        </svg>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <nav aria-label="Page navigation example">
        <center>
          <ul class="inline-flex items-center -space-x-px">
            <li>
              <a href="#"
                class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Previous</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd"></path>
                </svg>
              </a>
            </li>
            <li>
              <a href="#"
                class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
            </li>
            <li>
              <a href="#"
                class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
            </li>
            <li>
              <a href="#" aria-current="page"
                class="z-10 px-3 py-2 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
            </li>
            <li>
              <a href="#"
                class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
            </li>
            <li>
              <a href="#"
                class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
            </li>
            <li>
              <a href="#"
                class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Next</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
                </svg>
              </a>
            </li>
          </ul>
        </center>
      </nav>


    </div>
  </div>


  <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
@endsection