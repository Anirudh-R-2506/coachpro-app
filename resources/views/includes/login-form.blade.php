<div
class="rounded-lg bg-white py-10 px-8 shadow-testimonial sm:py-12 sm:px-10 md:p-[60px] lg:p-10 lg:py-12 lg:px-10 2xl:p-[60px]"
data-wow-delay=".2s
"
>
<h3 class="pb-4 text-2xl border-b-2 w-full font-semibold md:text-[26px]">
  Login to access our services
</h3>
<form class="mt-8">
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
    <div class="mb-6">
        <label for="email" class="block text-md text-dark"
        >Password<span style="color: red"> *</span></label
        >
        <input
        type="password"
        id="password"
        class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer"
        placeholder="Enter your password"
        />
    </div>

</form>

<div class="flex items-center justify-between">
  <div class="flex items-center">
    <input
      type="checkbox"
      id="remember"
      class="w-4 h-4 text-primary border border-[#f1f1f1] rounded-sm focus:outline-none focus:border-primary"
    />
    <label for="remember" class="ml-2 text-sm text-dark"
      >Remember me</label
    >
  </div>
  <a
    href="#"
    class="text-sm text-primary hover:text-dark focus:text-dark focus:outline-none"
    >Forgot password?</a
  >
</div>

<div class="mt-8 flex flex-wrap text-center justify-center items-center">
  <button
  class="w-1/3 inline-flex items-center justify-center rounded bg-primary py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-dark"
  >
    Login
  </button>
</div>

<div class="mt-8 flex flex-wrap text-center justify-center items-center">
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