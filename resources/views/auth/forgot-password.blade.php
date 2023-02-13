@include('includes.head')
    <div
    id="home"
    class="relative min-h-full overflow-hidden bg-[#f3f4ff]"
  >
    <div class="container min-h-full">
      <div class="flex flex-wrap items-center justify-center min-h-full -mx-4 top">
        <div class="w-full px-4">
          <div
            class="hero-content mx-auto max-w-[800px]"
            data-wow-delay=".2s"
          >
            <div class="p-10">
              <div id="home"
              class="relative p-10 overflow-hidden"
              >
                  <div class="container">
                      <div class="flex flex-wrap items-center justify-center -mx-4">
                          <div class="w-full px-4">
                              <div
                                  class="hero-content mx-auto max-w-[780px]"
                                  data-wow-delay=".2s"
                              >

                              <div
                              class="rounded-lg bg-white py-10 px-8 shadow-testimonial sm:py-12 sm:px-10 md:p-[60px] lg:p-10 lg:py-12 lg:px-10 2xl:p-[60px]"
                              data-wow-delay=".2s
                              "
                              >
                              <img class="mx-auto -mt-6 -mb-6" width="200" height="200" src="{{ asset('images/logo/logo.png') }}" alt="base apparel logo" />
                              <h3 class="pb-4 text-2xl border-b-2 w-full font-semibold md:text-[26px]">
                                Forgot password
                              </h3>
                              <div class="px-4 py-3 text-teal-900 bg-teal-100 border-t-4 border-teal-500 rounded-b shadow-md" role="alert">
                                <div class="flex">
                                  <div class="py-1"><svg class="w-6 h-6 mr-4 text-teal-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                  <div>
                                    <p class="font-bold">Forgot your password?</p>
                                    <p class="text-sm">Enter your email address and we'll send you a link to reset your password :)</p>
                                  </div>
                                </div>
                              </div>
                              @if ($errors->any())
                                  <div class="m-6 alert alert-danger">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              @endif                              
                              <form class="mt-8" method="POST" action="{{ route('services.password.send.reset.link') }}">
                                @csrf
                                <div class="mb-6">
                                  <label for="email" class="block text-md text-dark"
                                    >Email<span style="color: red"> *</span></label
                                  >
                                  <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    required
                                    class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer"
                                    placeholder="Enter your email"
                                  />
                                </div>
                                <div class="flex flex-wrap items-center justify-center mt-8 text-center">
                                  <button
                                  type="submit"
                                  class="inline-flex items-center justify-center w-1/3 px-6 py-4 text-base font-medium text-white transition duration-300 ease-in-out rounded bg-primary hover:bg-dark"
                                  >            
                                  Reset password
                                  </button>                        
                                </div>
                              </form>                                                        
                              
                              </div>

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
