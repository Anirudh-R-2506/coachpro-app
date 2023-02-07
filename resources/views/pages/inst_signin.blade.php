@extends('layouts.defaultinst')

@section("content")
    
    <script>
      window.onload = () => {
        var lp = new locationPicker('map', {
            setCurrentPosition: true, // You can omit this, defaults to true
        }, {
        });
      }
    </script>
    <script>      

      init = () => {
        return {
          login: true,
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
            class="hero-content mx-auto max-w-[780px]"
            data-wow-delay=".2s"
          >
            <div x-show="login">
              @include('includes.login-form')
            </div>
            <div x-show="!login">
              @include('includes.signup-form')
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    
@endsection