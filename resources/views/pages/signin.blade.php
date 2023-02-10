@extends('layouts.default')

@section("content")
    <script>      
      const params = new Proxy(new URLSearchParams(window.location.search), {
        get: (searchParams, prop) => searchParams.get(prop),
      });
      init = () => {
        return {
          login: true,
          redirect: params.redirect,
        };
      };
    </script>
    <div
    id="home"
    class="relative p-10 overflow-hidden bg-primary"
    x-data="init"
  >
    <div class="container">
      <div class="flex flex-wrap items-center justify-center -mx-4">
        <div class="w-full px-4">
          <div
            class="hero-content mx-auto max-w-[600px]"
            data-wow-delay=".2s"
          >
            <div x-show="login">
              @include('includes.login-form')
            </div>
            <div x-show="!login">
              @include('includes.signup-form', ['localities' => $localities])
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    
@endsection