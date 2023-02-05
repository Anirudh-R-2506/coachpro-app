  <script>      
  
    signup = () => {
      return {
        step : 3,
        education : '',
        register() {
            let url = "{{ route('services.register-cs') }}";
            let first_name = document.getElementById('first_name').value;
            let last_name = document.getElementById('last_name').value;
            let email = document.getElementById('email').value;            
            let phone = document.getElementById('phone').value;
            let education = document.getElementById('education').value;
            let school_class = document.getElementById('class').value;
            let year_of_passing = document.getElementById('year_of_passing').value;
            let postData = {
                first_name: first_name,
                last_name: last_name,
                email: email,
                phone: phone,
                education: education,
                class: school_class,
                year_of_passing: year_of_passing,
            };
            axios.post(url, postData)
            .then(function (response) {
                console.log(response.data);
                if (response.data.status == 'success') {
                    Swal.fire({
                        title: 'Success',
                        text: response.data.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                }
                else {
                    Swal.fire({
                        title: 'Error',
                        text: response.data.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                }
            })
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
                      <h3 class="mb-8 text-2xl font-semibold md:text-[26px] border-b-2" x-on:click="hello">
                        Provide your details below so you can stay updated with the best coach finder
                      </h3>                      
                      <form method="POST" x-on:submit.prevent action="{{ route('services.register-cs') }}">
                        @csrf
                        <div class="mb-6">
                          <label for="fullName" class="block text-sm text-dark"
                            >First Name<span style="color: red"> *</span></label
                          >
                          <input
                            type="text"
                            name="first_name"
                            id="first_name"
                            placeholder="First Name"
                            required
                            class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"
                          />
                        </div>
                        <div class="mb-6">
                          <label for="fullName" class="block text-sm text-dark"
                            >Last Name<span style="color: red"> *</span></label
                          >
                          <input
                            type="text"
                            name="last_name"
                            id="last_name"
                            placeholder="Last Name"
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
                              <option selected>Choose an education level</option>
                              <option value="school">School</option>
                              <option value="ug">UG</option>
                              <option value="pg">PG</option>
                            </select>
                          </div>
                          <div class="mb-6" x-show="education == 'school'">
                            <label for="phone" class="block text-sm text-dark"
                              >Class currently studying<span style="color: red"> *</span></label
                            >
                            <select name="class" id="class" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">
                              <option selected>Choose a class</option>
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
                            <select name="year_of_passing" id="year_of_passing" class="block py-2.5 px-0 w-full text-gray-500 bg-transparent w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none peer">
                              <option selected>Choose a year</option>
                              <option value="2023">2023</option>
                              <option value="2024">2024</option>
                              <option value="2025">2025</option>
                              <option value="2026">2026</option>
                            </select>
                          </div> 
                          <div class="flex justify-center w-full mb-0">
                            <input
                              type="submit"
                              x-on:click="register()"
                              class="inline-flex items-center justify-center px-6 py-4 text-base font-medium text-white transition duration-300 ease-in-out rounded bg-primary hover:bg-dark"
                            >
                          </div>
                      </form>
                    </div>