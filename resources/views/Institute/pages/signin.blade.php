@include('includes.head')
<script src="https://cdn.jsdelivr.net/gh/mattkingshott/iodine@3/dist/iodine.min.js" defer></script>
    <script>
      data = () => {
        return {
          login: true,
          init(){
            const params = new Proxy(new URLSearchParams(window.location.search), {
              get: (searchParams, prop) => searchParams.get(prop),
            });
            if(params.s == '1'){
              this.login = false;
              return;
            }
            this.login = true;
          },
        };
      };
    </script>
    <div
    id="home"
    class="relative min-h-full overflow-hidden bg-[#f3f4ff]"
    x-data="data"
    x-init="init()"
  >
    <div class="container min-h-full">
      <div class="flex flex-wrap items-center justify-center min-h-full -mx-4 top">
        <div class="w-full px-4">
          <div
            class="hero-content mx-auto max-w-[600px]"
            data-wow-delay=".2s"
          >
            <div x-show="login" class="p-10">
              @include('includes.login-form')
            </div>
            <div x-show="!login" class="p-10">
              @include('institute.includes.signup-form', ['localities' => $localities])
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    
    @include('sweetalert::alert')