@extends('layouts.form')

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
                    <img class="mx-auto -mt-6 -mb-6" width="200" height="200" src="{{ asset('images/logo/logo.png') }}" alt="base apparel logo" />
                    <h3 class="pb-4 text-2xl border-b-2 w-full font-semibold md:text-[26px]">
                      Reset password
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
                    <form class="mt-8" method="POST" action="{{ route('services.password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                      <div class="mb-6">
                        <label for="email" class="block text-md text-dark"
                          >Email<span style="color: red"> *</span></label
                        >
                        <input
                          type="email"
                          id="email"
                          name="email"
                          class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer"
                          value="{{ $email }}"
                          readonly
                        />
                      </div>
                        <div class="mb-6">
                            <label for="password" class="block text-md text-dark"
                            >Password<span style="color: red"> *</span></label
                            >
                            <input
                            type="password"
                            id="password"
                            name="password"
                            class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer"
                            placeholder="Enter your password"
                            required
                            />
                        </div>
                        <div class="mb-6">
                            <label for="password_confirmation" class="block text-md text-dark"
                            >Confirm password<span style="color: red"> *</span></label
                            >
                            <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer"
                            placeholder="Enter your password"
                            required
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
    
@endsection