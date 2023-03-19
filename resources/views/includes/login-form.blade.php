<script>
  grecaptcha.ready(function() {
    grecaptcha.execute("{{ env('RECAPTCHAV3_SITEKEY') }}").then(function(token) {
     document.getElementById("recaptcha").value = token;
     console.log(token);
  }); });
</script>
<div
class="rounded-lg bg-white py-10 px-8 shadow-testimonial sm:py-12 sm:px-10 md:p-[60px] lg:p-10 lg:py-12 lg:px-10 2xl:p-[60px]"
data-wow-delay=".2s
"
>
<div class="mb-8 border-b-2">
  <img class="mx-auto -mt-6 -mb-6" width="200" height="200" src="{{ asset('images/logo/logo.png') }}" alt="base apparel logo" />
  <h3 class="pb-4 text-2xl border-b-2 w-full font-semibold md:text-[26px]">
    Login to access our services
  </h3>
  @if ($errors->any())
                              <div class="flex p-2 mb-4 text-sm text-red-800 bg-red-300 rounded-lg dark:bg-gray-800 dark:text-red-400" role="alert">
                                  <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                  <span class="sr-only">Whoops!</span>
                                  <div>
                                    <span class="font-medium">Looks like you have a few errors in your submission :(</span>
                                      <ul class="mt-1 ml-4 list-disc list-inside">
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              </div>                            
  @endif 
<form class="mt-8" id="login_form" method="POST" action="{{ route('services.login') }}">
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
    <div class="mb-6">
        <label for="email" class="block text-md text-dark"
        >Password<span style="color: red"> *</span></label
        >
        <input
        type="password"
        id="password"
        name="password"
        required
        class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer"
        placeholder="Enter your password"
        />
    </div>

    <div class="flex items-center justify-between">
      <div class="flex items-center">
        <input
          type="checkbox"
          id="remember"
          name="remember"
          class="w-4 h-4 text-primary border border-[#f1f1f1] rounded-sm focus:outline-none focus:border-primary"
        />
        <label for="remember" class="ml-2 text-sm text-dark"
          >Remember me</label
        >
      </div>
      <a
        href="{{ route('services.password.index') }}"
        class="text-sm text-primary hover:text-dark focus:text-dark focus:outline-none"
        >Forgot password?</a
      >
    </div>

    <div class="flex flex-wrap items-center justify-center mt-8 text-center">
      <button
      class="inline-flex items-center justify-center w-1/3 px-6 py-4 text-base font-medium text-white transition duration-300 ease-in-out rounded bg-primary hover:bg-dark"
      >
        Login
      </button>
    </div>      
    <input type="hidden" name="redirect" :value="redirect">
    <input type="hidden" id="recaptcha" name="recaptcha">
  </form>

</div>
<div class="flex flex-wrap items-center justify-center mt-8 text-center">
  <p class="text-sm text-dark">
    Don't have an account?
    <button
      type="button"
      @click="login = false"
      class="text-primary hover:text-dark focus:text-dark focus:outline-none"
      >Sign up</button>
  </p>
</div>
</div>