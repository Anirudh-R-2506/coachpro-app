<!-- ====== Navbar Section Start -->
<div class="sticky top-0 left-0 z-40 flex items-center w-full bg-white ud-header">
    <div class="container">
      <div class="relative flex items-center justify-between -mx-4">
        <div class="max-w-full px-4 w-60">
          <a href="index.html" class="block w-full py-5 navbar-logo">
            <img src="{{ asset('images/logo/logo.png') }}" alt="logo" class="w-full header-logo"
              style="height: 80px !important; width: 80px !important;" />
          </a>
        </div>
        <div class="flex items-center justify-between w-full px-4">
          <div>
            <button id="navbarToggler"
              class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden">
              <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
              <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
              <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
            </button>
            <nav id="navbarCollapse"
              class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:py-0 lg:px-4 lg:shadow-none xl:px-6">
              <ul class="blcok lg:flex">
                <li class="relative group">
                  <a href="#home"
                    class="flex py-2 mx-8 text-base ud-menu-scroll text-dark group-hover:text-primary lg:mr-0 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70">
                    Home
                  </a>
                </li>
                <li class="relative group">
                  <a href="#about"
                    class="flex py-2 mx-8 text-base ud-menu-scroll text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                    About
                  </a>
                </li>
                <li class="relative group">
                  <a href="#faq"
                    class="flex py-2 mx-8 text-base ud-menu-scroll text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                    FAQs
                  </a>
                </li>
                <!-- <li class="relative group">
                    <a
                      href="#team"
                      class="flex py-2 mx-8 text-base ud-menu-scroll text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12"
                    >
                      Team
                    </a>
                  </li> -->
                <li class="relative group">
                  <a href="#contact"
                    class="flex py-2 mx-8 text-base ud-menu-scroll text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                    Contact
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="justify-end hidden pr-16 sm:flex lg:pr-0">
            <a href="{{ !auth()->check() ? route('institute.signin') : route('institute.dashboard.profile.index') }}"
              class="px-6 py-3 text-base font-medium text-white duration-300 ease-in-out bg-white rounded-lg signUpBtn bg-opacity-20 hover:bg-opacity-100 hover:text-dark">
              {!! !auth()->check() ? 'Login or Register  &nbsp;<i class="fas fa-sign-in-alt"></i>' : 'Dashboard &nbsp; <i class="fas fa-sign-in-alt"></i>' !!}
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>