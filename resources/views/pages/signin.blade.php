@extends('layouts.default')

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
          step : 1,
          login: true,
          education : '',
          showLocationSelect: false,

          nextStep() {
            this.step++;
          },
          hello() {
            alert('Hello');
          },
          prevStep() {
            this.step--;
          },
        };
      };
    </script>
    <div
    id="home"
    class="relative overflow-hidden p-10 bg-primary"
    x-data="init"
  >
    <div class="container">
      <div class="-mx-4 flex flex-wrap items-center justify-center">
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