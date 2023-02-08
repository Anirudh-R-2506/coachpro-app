  <script>      
  
    signup = () => {
      return {
        step : 3,
        education : '',
        email : '',
        name : '',
        phone : '',
        school_class : '',
        year_of_passing : '',        
      };
    };
  </script>
  
  
                  <div
                      class="rounded-lg bg-white py-10 px-8 sm:py-12 sm:px-10 md:p-[60px] lg:p-10 lg:py-12 lg:px-10 2xl:p-[60px]"
                      data-wow-delay=".2s
                      "
                      x-data="signup"
                    >
                      <div class="mb-8 border-b-2">
                        <h3 class="pb-4 text-2xl border-b-2 w-full font-semibold md:text-[26px]">
                            Provide your details below so you can stay updated with the best coach finder
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
                      <form method="POST" action="{{ route('services.register-cs') }}">
                        @csrf
                        <div class="mb-6">
                          <label for="fullName" class="block text-sm text-dark"
                            >Name<span style="color: red"> *</span></label
                          >
                          <input
                            type="text"
                            name="name"
                            id="name"
                            x-model="name"
                            placeholder="John Doe"
                            required
                            class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                          />
                          
                        </div>
                        <div class="mb-6">
                          <label for="email" class="block text-sm text-dark"
                            >Email<span style="color: red"> *</span></label
                          >
                          <input
                            type="email"
                            name="email"
                            id="email"
                            x-model="email"
                            placeholder="example@yourmail.com"
                            required
                            class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                          />
                          
                        </div>
                        <div class="mb-6">
                          <label for="phone" class="block text-sm text-dark"
                            >Phone<span style="color: red"> *</span></label
                          >
                          <input
                            type="text"
                            name="phone"
                            id="phone"
                            x-model="phone"
                            placeholder="1254521155"
                            required
                            class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                          />
                          
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block text-sm text-dark"
                              >Education<span style="color: red"> *</span></label
                            >
                            <select id="education" name="education" x-on:change="education = $el.value" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">
                              <option selected value="">Choose an education level</option>
                              <option value="school">School</option>
                              <option value="ug">UG</option>
                              <option value="pg">PG</option>
                            </select>
                            
                          </div>
                          <div class="mb-6" x-show="education == 'school'">
                            <label for="phone" class="block text-sm text-dark"
                              >Class currently studying<span style="color: red"> *</span></label
                            >
                            <select name="class" id="class" x-on:change="school_class = $el.value" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">
                              <option selected value="">Choose a class</option>
                              <option value="8">8th</option>
                              <option value="9">9th</option>
                              <option value="10">10th</option>
                              <option value="11">11th</option>
                              <option value="12">12th</option>
                            </select>
                            
                          </div>
                          <div class="mb-6" x-show="education == 'ug' || education == 'pg'">
                            <label for="message" class="block text-sm text-dark"
                              >Year of completion<span style="color: red"> *</span></label
                            >
                            <select name="year_of_passing" x-on:change="year_of_passing = $el.value" id="year_of_passing" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">
                              <option selected value="">Choose a year</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                            </select>
                            
                          </div> 
                          <div class="flex justify-center w-full mb-0">
                            @include('partials.recaptcha')
                            <input
                              type="submit"
                              class="inline-flex items-center justify-center px-6 py-4 text-base font-medium text-white transition duration-300 ease-in-out rounded bg-primary hover:bg-dark"
                            >
                          </div>
                      </form>
                    </div>