@extends('layouts.default')

@section("content")

    <div id="home"
    class="relative p-10 overflow-hidden bg-primary"
    x-data="init"
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
                    <h3 class="pb-4 text-2xl border-b-2 w-full font-semibold md:text-[26px]">
                      Forgot password
                    </h3>
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
                      <div class="mb-6">
                        <label for="email" class="block text-md text-dark"
                          >Email<span style="color: red"> *</span></label
                        >
                        <input
                          type="email"
                          id="email"
                          class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer"
                          placeholder="Enter your email"
                        />
                      </div>
                    </form>
                    
                    <div class="flex flex-wrap items-center justify-center mt-8 text-center">
                      <button
                      class="inline-flex items-center justify-center w-1/3 px-6 py-4 text-base font-medium text-white transition duration-300 ease-in-out rounded bg-primary hover:bg-dark"
                      >
                        Reset password
                      </button>
                    </div>
                    
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
