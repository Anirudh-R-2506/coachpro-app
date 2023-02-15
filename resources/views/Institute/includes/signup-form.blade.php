  <script>      
  
    signup = () => {
      return {
        name: {errorMessage:'', blurred:false},
        email: {errorMessage:'', blurred:false},
        password:{ errorMessage:'', blurred:false},
        phone: {errorMessage:'', blurred:false},
        inst_name: {errorMessage:'', blurred:false},  
        city: {errorMessage:'', blurred:false},
        locality: {errorMessage:'', blurred:false},
        blur: function(event) {
            let ele = event.target;
            this[ele.name].blurred = true;
            let rules = JSON.parse(ele.dataset.rules)
            this[ele.name].errorMessage = this.getErrorMessage(ele.value, rules);
        },
        input: function(event) {
            let ele = event.target;
            let rules = JSON.parse(ele.dataset.rules)
            this[ele.name].errorMessage = this.getErrorMessage(ele.value, rules);
        },
        getErrorMessage: function(value, rules) {
            let isValid = Iodine.is(value, rules);
            if (isValid !== true) {
                return Iodine.getErrorMessage(isValid);
            }
            return '';
        }
      };
    };
  </script>
  
  
                  <div
                  class="rounded-lg bg-white py-10 px-8 shadow-testimonial sm:py-12 sm:px-10 md:p-[60px] lg:p-10 lg:py-12 lg:px-10 2xl:p-[60px]"
                      data-wow-delay=".2s
                      "
                      x-data="signup"
                    >
                      <div class="mb-8 border-b-2">
                        <img class="mx-auto -mt-6 -mb-6" width="200" height="200" src="{{ asset('images/logo/logo.png') }}" alt="base apparel logo" />
                        <h3 class="pb-4 text-2xl border-b-2 w-full font-semibold md:text-[26px]">
                            Sign up now!
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
                      </div>
                      <form method="POST" action="{{ route('institute.services.register') }}">
                        @csrf
                        <div class="mb-6">
                          <label for="fullName" class="block text-sm text-dark"
                            >Your Name<span style="color: red"> *</span></label
                          >
                          <input
                            type="text"
                            name="name"
                            x-bind:class="{'invalid':name.errorMessage && name.blurred}"
                            data-rules='["required", "string"]'
                            placeholder="Adam Gelius"
                            @blur="blur" @input="input"
                            class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                          />
                          <p x-show="name.errorMessage && name.blurred" x-text="name.errorMessage" class="mt-2 text-red-500"></p>
                        </div>
                        <div class="mb-6">
                          <label for="email" class="block text-sm text-dark"
                            >Email<span style="color: red"> *</span></label
                          >
                          <input
                            type="email"
                            name="email"
                            x-bind:class="{'invalid':email.errorMessage && email.blurred}"
                            data-rules='["required", "email"]'
                            placeholder="example@yourmail.com"
                            @blur="blur" @input="input"
                            class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                          />
                          <p x-show="email.errorMessage && email.blurred" x-text="email.errorMessage" class="mt-2 text-red-500"></p>
                        </div>
                        <div class="mb-6">
                          <label for="phone" class="block text-sm text-dark"
                            >Phone<span style="color: red"> *</span></label
                          >
                          <input
                            type="text"
                            name="phone"
                            x-bind:class="{'invalid':phone.errorMessage && phone.blurred}"
                            data-rules='["required", "numeric"]'
                            placeholder="9254521155"
                            @blur="blur" @input="input"
                            class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                          />
                          <p x-show="phone.errorMessage && phone.blurred" x-text="phone.errorMessage" class="mt-2 text-red-500"></p>
                        </div>
                        <div class="mb-6">
                            <label for="fullName" class="block text-sm text-dark"
                              >Institute Name<span style="color: red"> *</span></label
                            >
                            <input
                              type="text"
                              name="inst_name"
                              x-bind:class="{'invalid':inst_name.errorMessage && inst_name.blurred}"
                              data-rules='["required", "string"]'
                              placeholder="Adam Gelius"
                              @blur="blur" @input="input"
                              class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                            />
                            <p x-show="inst_name.errorMessage && inst_name.blurred" x-text="inst_name.errorMessage" class="mt-2 text-red-500"></p>
                        </div>
                        <div class="mb-6">
                            <label for="fullName" class="block text-sm text-dark"
                              >City<span style="color: red"> *</span></label
                            >
                            <select disabled @blur="blur" @input="input" id="underline_select" name="city" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">                              
                              <option selected value="1">Bangalore</option>
                            </select>
                            <p x-show="city.errorMessage && city.blurred" x-text="city.errorMessage" class="mt-2 text-red-500"></p>
                          </div>
                          <div class="mb-6">
                            <label for="fullName" class="block mb-4 text-sm text-dark"
                                >Locality<span style="color: red"> *</span></label
                              >
                              <select @blur="blur" @input="input" data-rules='["required"]' id="underline_select" name="locality" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">
                                  <option selected value="">Choose a locality</option>
                                  @foreach ($localities as $locality)
                                      <option value="{{ $locality->id }}">{{ $locality->name }}</option>
                                  @endforeach
                              </select>
                              <p x-show="locality.errorMessage && locality.blurred" x-text="locality.errorMessage" class="mt-2 text-red-500"></p>
                        </div>
                        <div class="mb-6">
                          <label for="fullName" class="block mb-4 text-sm text-dark"
                              >Address<span style="color: red"> *</span></label
                            >
                            <textarea
                              name="address"
                              x-bind:class="{'invalid':address.errorMessage && address.blurred}"
                              data-rules='["required"]'
                              placeholder="Enter your address"
                              @blur="blur" @input="input"
                              rows="4"
                              style="resize: none;"
                              class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                            ></textarea>
                            <p x-show="locality.errorMessage && locality.blurred" x-text="locality.errorMessage" class="mt-2 text-red-500"></p>
                      </div>
                        <div class="mb-6">
                            <label for="fullName" class="block text-sm text-dark"
                              >Create Password<span style="color: red"> *</span></label
                            >
                            <input
                              type="password"
                              name="password"
                              x-bind:class="{'invalid':password.errorMessage && password.blurred}"
                              data-rules='["required","minimum:8"]'
                              placeholder="********"
                              @blur="blur" @input="input"
                              class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                            />
                            <p x-show="password.errorMessage && password.blurred" x-text="password.errorMessage" class="mt-2 text-red-500"></p>
                        </div>
                        <div class="g-recaptcha"
                            data-sitekey="{{env('RECAPTCHA_SITE_KEY')}}">
                        </div>
                        <div class="flex justify-center w-full mb-0">
                            <button
                            type="submit"
                            class="inline-flex items-center justify-center w-1/3 px-6 py-4 text-base font-medium text-white transition duration-300 ease-in-out rounded bg-primary hover:bg-dark"
                            >
                            Register
                            </button>
                        </div>
                      </form>                                            
                      <div class="flex flex-wrap items-center justify-center mt-8 text-center">
                        <p class="text-sm text-dark">
                          Already have an account?
                          <button
                            type="button"
                            @click="login = true"
                            class="text-primary hover:text-dark focus:text-dark focus:outline-none"
                            >Login</button>
                        </p>
                      </div>
                    </div>