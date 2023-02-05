<script>
  window.onload = () => {
    var lp = new locationPicker('map', {
        setCurrentPosition: true, // You can omit this, defaults to true
    }, {
    });
  }
</script>
<script>      

  signup = () => {
    return {
      step : 1,
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
                    class="rounded-lg bg-white py-10 px-8 sm:py-12 sm:px-10 md:p-[60px] lg:p-10 lg:py-12 lg:px-10 2xl:p-[60px]"
                    data-wow-delay=".2s
                    "
                    x-data="signup"
                  >
                    <h3 class="mb-8 text-2xl font-semibold md:text-[26px]" x-on:click="hello">
                      Sign up & start your journey to success
                    </h3>
                    <div class="mb-8 border-b-2">
                      <div class="mb-1 text-xs font-bold leading-tight tracking-wide text-gray-500 uppercase" x-text="`Step: ${step} of 3`"></div>
                      <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div class="flex-1">
                          <div x-show="step === 1">
                            <div class="text-lg font-bold leading-tight text-gray-700">Course details</div>
                          </div>
                          
                          <div x-show="step === 2">
                            <div class="text-lg font-bold leading-tight text-gray-700">Location details</div>
                          </div>

                          <div x-show="step === 3">
                            <div class="text-lg font-bold leading-tight text-gray-700">Personal details</div>
                          </div>

                        </div>
            
                        <div class="flex items-center md:w-64">
                          <div class="w-full mr-2 bg-gray-200rounded-full">
                            <div class="h-2 text-xs leading-none text-center text-white rounded-full bg-primary" :style="'width: '+ parseInt(step / 3 * 100) +'%'"></div>
                          </div>
                          <div class="w-10 text-xs text-gray-600" x-text="parseInt(step / 3 * 100) +'%'"></div>
                        </div>
                      </div>
                    </div>
                    <form x-show="step == 1">
                      <div class="mb-6">
                        <label for="fullName" class="block text-md text-dark"
                          >Interested competitive exam/course<span style="color: red"> *</span></label
                        >
                        <select id="underline_select" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">
                          <option selected>Choose a competitive exam/course</option>
                          <option value="US">NEET</option>
                          <option value="CA">JEE</option>
                          <option value="FR">UPSC</option>
                          <option value="DE">Class 10 Boards</option>
                        </select>
                      </div>
                      <div class="mb-6">
                        <label for="email" class="block text-md text-dark"
                          >Education<span style="color: red"> *</span></label
                        >
                        <select x-on:change="education = $el.value" id="underline_select" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">
                          <option selected>Choose an education level</option>
                          <option value="school">School</option>
                          <option value="ug">UG</option>
                          <option value="pg">PG</option>
                        </select>
                      </div>
                      <div class="mb-6" x-show="education == 'school'">
                        <label for="phone" class="block text-md text-dark"
                          >Class currently studying<span style="color: red"> *</span></label
                        >
                        <select id="underline_select" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">
                          <option selected>Choose a class</option>
                          <option value="school">8th</option>
                          <option value="ug">9th</option>
                          <option value="pg">10th</option>
                          <option value="pg">11th</option>
                          <option value="pg">12th</option>
                        </select>
                      </div>
                      <div class="mb-6" x-show="education == 'ug' || education == 'pg'">
                        <label for="message" class="block text-md text-dark"
                          >Year of completion<span style="color: red"> *</span></label
                        >
                        <select id="underline_select" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">
                          <option selected>Choose a year</option>
                          <option value="school">2023</option>
                          <option value="ug">2024</option>
                          <option value="pg">2025</option>
                          <option value="pg">2026</option>
                        </select>
                      </div> 

                      <div class="mb-6">
                        <label for="message" class="block text-md text-dark"
                          >Preferred session<span style="color: red"> *</span></label
                        >
                        <select id="underline_select" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">
                          <option selected>Choose a session</option>
                          <option value="school">Weekdays</option>
                          <option value="ug">Weekends</option>
                        </select>
                      </div> 

                      <div class="mb-6">
                        <label for="message" class="block text-md text-dark"
                          >Preferred timings<span style="color: red"> *</span></label
                        >
                        <select id="underline_select" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">
                          <option selected>Choose a timing</option>
                          <option value="school">Morning</option>
                          <option value="ug">Evening</option>
                        </select>
                      </div> 

                    </form>
                    <form x-show="step == 2">
                      <div class="mb-6">
                        <label for="fullName" class="block text-md text-dark"
                          >City<span style="color: red"> *</span></label
                        >
                        <select id="underline_select" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">
                          <option selected>Choose a city</option>
                          <option value="US">Bangalore</option>
                          <option value="CA">Chennai</option>
                          <option value="FR">Mumbai</option>
                        </select>
                      </div>
                      <div class="mb-6">
                        <label for="fullName" class="block mb-4 text-xs text-dark"
                            >Location</label
                          >
                          <div class="flex flex-col items-center justify-center p-4 mb-4 space-y-5 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                            Your location will be used to find the best tutors and coaching centers near you and to provide you with the best experience.
                            <span class="mt-2 text-lg font-medium">Your location will not be shared anywhere</span>
                            <button
                              class="inline-flex items-center justify-center px-6 py-4 text-base font-medium text-white transition duration-300 ease-in-out rounded bg-primary hover:bg-dark"
                              x-on:click="enableLocation"
                            >
                              Grant Location Access
                            </button>
                          </div>
                        <div id="map" class="w-full" style="height: 500px"></div>
                      </div>
                    </form>
                    <form x-show="step == 3">
                      <div class="mb-6">
                        <label for="fullName" class="block text-xs text-dark"
                          >First Name<span style="color: red"> *</span></label
                        >
                        <input
                          type="text"
                          name="fullName"
                          placeholder="Adam Gelius"
                          class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                        />
                      </div>
                      <div class="mb-6">
                        <label for="fullName" class="block text-xs text-dark"
                          >Last Name<span style="color: red"> *</span></label
                        >
                        <input
                          type="text"
                          name="fullName"
                          placeholder="Adam Gelius"
                          class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                        />
                      </div>
                      <div class="mb-6">
                        <label for="email" class="block text-xs text-dark"
                          >Email</label
                        >
                        <input
                          type="email"
                          name="email"
                          placeholder="example@yourmail.com"
                          class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                        />
                      </div>
                      <div class="mb-6">
                        <label for="phone" class="block text-xs text-dark"
                          >Phone<span style="color: red"> *</span></label
                        >
                        <input
                          type="text"
                          name="phone"
                          placeholder="+91 1254521155"
                          class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                        />
                      </div>
                    </form>
                    <div class="flex justify-center w-full mb-0">
                      <button
                        class="inline-flex items-center justify-center px-6 py-4 mr-5 text-base font-medium transition duration-300 ease-in-out bg-white rounded text-primary hover:bg-dark"
                        x-show="step > 1"
                        x-on:click="prevStep"
                      >
                      Previous
                      </button>
                      <button
                        class="inline-flex items-center justify-center px-6 py-4 text-base font-medium text-white transition duration-300 ease-in-out rounded bg-primary hover:bg-dark"
                        x-text="step === 3 ? 'Submit' : 'Next'"
                        x-on:click="step != 3 ? nextStep : submit"
                      >
                      </button>
                    </div>
                    {{-- <div class="flex flex-wrap items-center justify-center mt-8 text-center">
                      <p class="text-sm text-dark">
                        Already have an account?
                        <button
                          type="button"
                          @click="if (home){
                            window.location.href = {{ route('frontend.signin'); }}
                          }
                          else{
                            login = true;
                          }
                          "
                          class="text-primary hover:text-dark focus:text-dark focus:outline-none"
                          >Login</button>
                      </p>
                    </div> --}}
                  </div>