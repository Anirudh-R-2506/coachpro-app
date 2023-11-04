@extends('layouts.default')

@section('content')
  <script>
    uniListing = () => {
      return {
        institutes: @json($institutes),

      };
    }
  </script>
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



      <section class="">        
        <div class="container">
          <div class="mb-4 -mx-4">
            <button type="button" data-modal-toggle="crypto-modal"
              class="inline-flex items-center px-3 py-3 text-sm font-medium text-center text-white rounded-lg bg-primary focus:ring-4 focus:outline-none">
              <i class="pr-2 fa-solid fa-filter"></i>
              Sort By
            </button>
          </div>
          <div class="flex flex-wrap -mx-4" x-data="uniListing()" x-init="console.log(institutes);">
            <template x-for="inst in institutes">
              <div class="w-full md:w-1/2 lg:w-1/3">              
                <div class="mb-6 group" data-wow-delay=".1s">
                  <div class="mb-8 overflow-hidden rounded">
                    <div
                      x-on:click="window.location.assign(inst.link)"
                      class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                      <a href="#">
                        <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="" />
                      </a>
                      <div class="p-5">
                        <a href="#">
                          <h5 class="mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            <div class="flex items-center gap-2 w-fit">
                              <span x-text="inst.name"></span>
                              <template x-if="inst.verified === true">
                                <svg class="text-primary" width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> 
                                  <path d="M10.5213 2.62368C11.3147 1.75255 12.6853 1.75255 13.4787 2.62368L14.4989 3.74391C14.8998 4.18418 15.4761 4.42288 16.071 4.39508L17.5845 4.32435C18.7614 4.26934 19.7307 5.23857 19.6757 6.41554L19.6049 7.92905C19.5771 8.52388 19.8158 9.10016 20.2561 9.50111L21.3763 10.5213C22.2475 11.3147 22.2475 12.6853 21.3763 13.4787L20.2561 14.4989C19.8158 14.8998 19.5771 15.4761 19.6049 16.071L19.6757 17.5845C19.7307 18.7614 18.7614 19.7307 17.5845 19.6757L16.071 19.6049C15.4761 19.5771 14.8998 19.8158 14.4989 20.2561L13.4787 21.3763C12.6853 22.2475 11.3147 22.2475 10.5213 21.3763L9.50111 20.2561C9.10016 19.8158 8.52388 19.5771 7.92905 19.6049L6.41553 19.6757C5.23857 19.7307 4.26934 18.7614 4.32435 17.5845L4.39508 16.071C4.42288 15.4761 4.18418 14.8998 3.74391 14.4989L2.62368 13.4787C1.75255 12.6853 1.75255 11.3147 2.62368 10.5213L3.74391 9.50111C4.18418 9.10016 4.42288 8.52388 4.39508 7.92905L4.32435 6.41553C4.26934 5.23857 5.23857 4.26934 6.41554 4.32435L7.92905 4.39508C8.52388 4.42288 9.10016 4.18418 9.50111 3.74391L10.5213 2.62368Z" stroke="currentColor" stroke-width="1.5"/> 
                                  <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/> 
                                </svg>
                              </template>
                            </div>
                          </h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                          <span x-text="inst.address"></span>
                        </p>
                        <p class="mb-3 text-2xl tracking-wide text-bold">
                          Rank <span x-text="inst.rank" class="font-primary"></span>
                        </p>
                        <span class="p-2 mb-3 font-normal text-gray-700 bg-yellow-200 rounded-lg" style="max-width: 100px;">
                          Known for: <span x-text="inst.known_for"></span>
                        </span>
                    </div>
                  </div>
                </div>
              </div>
            </template>
          </div>
        </div>
        </template>
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