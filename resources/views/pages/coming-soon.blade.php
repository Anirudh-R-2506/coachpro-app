@extends('layouts.default')

@section('addons')

<script>
    faq = () => {
        return {
            dropFaq(id){
                let faq = document.getElementById("faq"+id);
                faq.classList.toggle('hidden');
            },
        };
    };
</script>

<style>
    .top {
        z-index: 20 !important;
    }
</style>

@endsection


@section("content")

    <!-- ====== Hero Section Start -->
    <!-- ====== Banner Section Start -->
<div
class="relative overflow-hidden pb-[100px]"
id="hero"
data-aos="fade-zoom-out"
style="background: linear-gradient(to left,  rgb(15, 31, 82) 0%,rgb(15, 31, 82) 50%,rgb(48, 86, 211) 50%,rgb(48, 86, 211) 100%);"
x-intersect="changeToWhite()"
>
<div class="container">
  <div class="flex flex-wrap items-center -mx-4 -mb-12">
    <div class="w-full px-4 pt-8 text-white md:w-1/2 top">
        <header data-aos="fade-zoom-in" class="w-full" data-aos-delay="500">
          <img class="mt-6 -mb-6 -ml-10" width="300" height="300" src="{{ asset('images/logo/logo.png') }}" alt="base apparel logo" />
        </header>
        <div
          class="px-2 mt-8 text-center sm:px-0 sm:mt-12 sm:max-w-sm sm:mx-auto lg:mx-0 lg:max-w-xl lg:text-left lg:my-auto"
        >
          <h1
            class="
              text-4xl
              uppercase
              tracking-[0.2em]
              sm:text-5xl
              lg:text-6xl
              xl:text-7xl
            "
          >
            <span data-aos="fade-zoom-down" data-aos-delay="600" class="mb-3 font-light text-desaturated-red">We're</span>
            <br /><br />
            <span data-aos="fade-zoom-down" data-aos-delay="700" class="mb-3 font-bold text-white sm:text-primary"
              >coming</span>
              <span data-aos="fade-zoom-down" data-aos-delay="800" class="font-bold text-white sm:text-primary"
              >soon</span
            >
          </h1>
          <p class="mt-6 sm:mt-8 text-desaturated-red sm:text-lg xl:text-xl wow fadeIn" data-wow-delay="0.9s">
            Hello fellow students! We're currently building our new product to help you choose
            the best path for your career. We're excited to show you more soon!
          </p>
        </div>
    </div>    
    <div class="w-full px-4 pt-8 md:pl-8 md:w-1/2 top" data-aos="fade-zoom-in" data-aos-delay="1000">
        @include('includes.signup-cs')
    </div>
  </div>
</div>
</div>
<!-- ====== Banner Section End -->
    <!-- ====== Hero Section End -->

    <!-- ====== Features Section Start -->
    <section class="pt-20 pb-8 lg:pt-[120px] lg:pb-[70px]" id="features">
      <div class="container">
        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4">
            <div class="mb-12 top max-w-[620px] lg:mb-20" data-aos="fade-zoom-in-right">
              <span class="block mb-2 text-lg font-semibold text-primary">
                Features
              </span>
              <h2
                class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[42px]"
              >
                Main Features Of Edu Hunt
              </h2>
              <p
                class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed"
              >
                Our platform offers a range of convenient features for connecting students with qualified tutors.
                These include a search function, ratings and reviews, payment system, and In-Depth Information about Centers.
              </p>
            </div>
          </div>
        </div>
        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4 md:w-1/2 lg:w-1/4">
            <div class="px-5 py-4 bg-white rounded-lg group" data-aos="fade-up" data-aos-delay="100">
              <div
                class="relative mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-primary"
              >
                <span
                  class="absolute top-0 left-0 mb-8 flex h-[70px] w-[70px] rotate-[25deg] items-center justify-center rounded-2xl bg-primary bg-opacity-20 duration-300 group-hover:rotate-45"
                ></span>
                <i class="fa-solid fa-magnifying-glass fa-2xl" style="color:white"></i>
              </div>
              <h4 class="mb-3 text-xl font-bold text-dark">
                Flexible Search
              </h4>
              <p class="mb-8 text-body-color lg:mb-11">
                Allows students to find tutors based on subject, location, availability, and other critical criteria.
              </p>
              
            </div>
          </div>
          <div class="w-full px-4 md:w-1/2 lg:w-1/4">
            <div
              class="px-5 py-4 bg-white rounded-lg group"
              data-aos="fade-up" data-aos-delay="150"
            >
              <div
                class="relative mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-primary"
              >
                <span
                  class="absolute top-0 left-0 mb-8 flex h-[70px] w-[70px] rotate-[25deg] items-center justify-center rounded-2xl bg-primary bg-opacity-20 duration-300 group-hover:rotate-45"
                ></span>
                <i class="fa-regular fa-face-smile fa-2xl" style="color:white"></i>
              </div>
              <h4 class="mb-3 text-xl font-bold text-dark">
                Ratings and Reviews
              </h4>
              <p class="mb-8 text-body-color lg:mb-11">
                Allows students to rate their experiences with tutors and helps students choose right.
              </p>
              
            </div>
          </div>
          <div class="w-full px-4 md:w-1/2 lg:w-1/4">
            <div class="px-5 py-4 bg-white rounded-lg top group" data-aos="fade-up" data-aos-delay="200">
              <div
                class="relative mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-primary"
              >
                <span
                  class="absolute top-0 left-0 mb-8 flex h-[70px] w-[70px] rotate-[25deg] items-center justify-center rounded-2xl bg-primary bg-opacity-20 duration-300 group-hover:rotate-45"
                ></span>
                  <i class="fa-regular fa-credit-card fa-2xl" style="color:white"></i>
              </div>
              <h4 class="mb-3 text-xl font-bold text-dark">
                Payment System
              </h4>
              <p class="mb-8 text-body-color lg:mb-11">
                Makes it easy for students to pay for tutoring sessions, either in advance or at the time of the session.
              </p>
              
            </div>
          </div>
          <div class="w-full px-4 md:w-1/2 lg:w-1/4">
            <div
              class="px-5 py-4 bg-white rounded-lg top group"
              data-aos="fade-up" data-aos-delay="250"
            >
              <div
                class="relative mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-primary"
              >
                <span
                  class="absolute top-0 left-0 mb-8 flex h-[70px] w-[70px] rotate-[25deg] items-center justify-center rounded-2xl bg-primary bg-opacity-20 duration-300 group-hover:rotate-45"
                ></span>
                <svg
                  width="35"
                  height="35"
                  viewBox="0 0 35 35"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M29.5312 21.6562L28.6563 21.1641L29.6953 20.5625C30.7344 19.9062 31.3359 18.8125 31.2812 17.6094C31.2266 16.4063 30.625 15.3125 29.5312 14.7109L27.8906 13.7813L29.6406 12.6875C30.6797 12.0313 31.2812 10.9375 31.2266 9.73438C31.1719 8.53125 30.5703 7.4375 29.4766 6.83594L19.25 1.09375C18.2109 0.492187 16.9531 0.546875 15.9141 1.09375L5.41406 7.21875C4.375 7.82031 3.71875 8.91406 3.71875 10.1172C3.71875 11.3203 4.375 12.4141 5.41406 13.0156L7.10938 14L5.41406 14.9844C4.375 15.5859 3.71875 16.6797 3.71875 17.8828C3.71875 19.0859 4.32031 20.1797 5.41406 20.7812L6.39844 21.3281L5.46875 21.875C4.42969 22.4766 3.77344 23.5703 3.77344 24.7734C3.77344 25.9766 4.375 27.0703 5.46875 27.6719L15.9141 33.6875C16.4609 34.0156 17.0078 34.125 17.6094 34.125C18.2109 34.125 18.8125 33.9609 19.3594 33.6328L29.6953 27.2891C30.7344 26.6328 31.3359 25.5391 31.2812 24.3359C31.2266 23.2969 30.625 22.2031 29.5312 21.6562ZM5.63281 10.1172C5.63281 9.57031 5.90625 9.13281 6.34375 8.85938L16.8438 2.78906C17.0625 2.67969 17.3359 2.57031 17.5547 2.57031C17.7734 2.57031 18.0469 2.625 18.2656 2.73437L28.5469 8.47656C28.9844 8.75 29.2578 9.1875 29.3125 9.73438C29.3125 10.2812 29.0391 10.7188 28.6016 10.9922L18.3203 17.3906C17.8828 17.6641 17.2812 17.6641 16.8438 17.3906L6.39844 11.375C5.90625 11.1562 5.63281 10.6641 5.63281 10.1172ZM5.63281 17.9375C5.63281 17.3906 5.90625 16.9531 6.34375 16.6797L9.02344 15.1484L15.8594 19.0859C16.4062 19.4141 16.9531 19.5234 17.5547 19.5234C18.1562 19.5234 18.7578 19.3594 19.3047 19.0312L26.0312 14.875L28.6016 16.2969C29.0391 16.5703 29.3125 17.0078 29.3672 17.5547C29.3672 18.1016 29.0938 18.5391 28.6563 18.8125L18.3203 25.2656C17.8828 25.5391 17.2812 25.5391 16.8438 25.2656L6.39844 19.25C5.90625 18.9766 5.63281 18.4844 5.63281 17.9375ZM28.6563 25.8125L18.3203 32.2109C17.8828 32.4844 17.2812 32.4844 16.8438 32.2109L6.39844 26.1953C5.96094 25.9219 5.6875 25.4844 5.6875 24.9375C5.6875 24.3906 5.96094 23.9531 6.39844 23.6797L8.3125 22.5859L15.8594 26.9609C16.4062 27.2891 16.9531 27.3984 17.5547 27.3984C18.1562 27.3984 18.7578 27.2344 19.3047 26.9062L26.7969 22.2578L28.6563 23.2969C29.0938 23.5703 29.3672 24.0078 29.4219 24.5547C29.3672 25.0469 29.0938 25.5391 28.6563 25.8125Z"
                    fill="white"
                  />
                </svg>
              </div>
              <h4 class="mb-3 text-xl font-bold text-dark">
                Vast Database
              </h4>
              <p class="mb-8 text-body-color lg:mb-11">
                Our platform collects detailed information about tutorial services to ensure their authenticity and quality.
              </p>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== Features Section End -->

    <!-- ====== Product Section Starts -->
    <section
      class="relative overflow-hidden pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]"
      id="tutorial"
    >
      <div class="container">
        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4">
            <div class="top mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20" data-aos="fade-zoom-in">
              <span class="block mb-2 text-lg font-semibold text-primary">
                About Edu Hunt
              </span>
              <h2
                class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[42px]"
              >
                Check out this short video to know more about us
              </h2>
            </div>
          </div>
        </div>

        
        
        </div>

        
      </div>
    </section>    

    <!-- ====== Faq Section Start -->
    <section
      class="relative overflow-hidden pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]"
      x-data="faq"
    >
      <div class="container">
        <div class="flex flex-wrap -mx-4">
          <div class="w-full px-4">
            <div class="top mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20" data-aos="fade-zoom-in" data-aos-delay="250">
              <span class="block mb-2 text-lg font-semibold text-primary">
                FAQ
              </span>
              <h2
                class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[42px]"
              >
                Any Questions? Answered
              </h2>
              <p
                class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed"
              >
                Find answers to common questions about our platform.
              </p>
            </div>
          </div>
        </div>

        <div class="flex flex-wrap -mx-4 top">
          <div class="w-full px-4 lg:w-1/2">
            <div
              class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8"
              data-aos="fade-up" data-aos-delay="350"
            >
              <button class="flex items-center w-full text-left faq-btn" @click="dropFaq(1)">
                <div
                  class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary"
                >
                  <svg
                    width="17"
                    height="10"
                    viewBox="0 0 17 10"
                    class="fill-current icon"
                  >
                    <path
                      d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                      fill="#3056D3"
                      stroke="#3056D3"
                    />
                  </svg>
                </div>
                <div class="w-full">
                  <h4 class="text-base font-semibold text-black sm:text-lg">
                    How do I find a tutor on your platform?
                  </h4>
                </div>
              </button>
              <div class="faq-content hidden pl-[62px]" id="faq1">
                <p class="py-3 text-base leading-relaxed text-body-color">
                  To find a tutor on our platform, use the search function and specify your criteria such as subject, location, and availability.
                </p>
              </div>
            </div>
            <div
              class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8"
              data-aos="fade-up" data-aos-delay="450"
            >
              <button class="flex items-center w-full text-left faq-btn" @click="dropFaq(2)">
                <div
                  class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary"
                >
                  <svg
                    width="17"
                    height="10"
                    viewBox="0 0 17 10"
                    class="fill-current icon"
                  >
                    <path
                      d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                      fill="#3056D3"
                      stroke="#3056D3"
                    />
                  </svg>
                </div>
                <div class="w-full">
                  <h4 class="text-base font-semibold text-black sm:text-lg">
                    Can I see reviews from other students before booking a course?
                  </h4>
                </div>
              </button>
              <div class="faq-content hidden pl-[62px]" id="faq2">
                <p class="py-3 text-base leading-relaxed text-body-color">
                  Yes, you can see reviews from other students before booking a course.
                </p>
              </div>
            </div>
            <div
              class="single-faq  mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8"
              data-aos="fade-up" data-aos-delay="550"
            >
              <button class="flex items-center w-full text-left faq-btn" @click="dropFaq(3)">
                <div
                  class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary"
                >
                  <svg
                    width="17"
                    height="10"
                    viewBox="0 0 17 10"
                    class="fill-current icon"
                  >
                    <path
                      d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                      fill="#3056D3"
                      stroke="#3056D3"
                    />
                  </svg>
                </div>
                <div class="w-full">
                  <h4 class="text-base font-semibold text-black sm:text-lg">
                    How do I update my preferences?
                  </h4>
                </div>
              </button>
              <div class="faq-content hidden pl-[62px]" id="faq3">
                <p class="py-3 text-base leading-relaxed text-body-color">
                  You can update your preferences any time you want by going to your profile when our website goes live.
                </p>
              </div>
            </div>
          </div>
          <div class="w-full px-4 lg:w-1/2">
            <div
              class="single-faq  mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8"
              data-aos="fade-up" data-aos-delay="650"
            >
              <button class="flex items-center w-full text-left faq-btn" @click="dropFaq(4)">
                <div
                  class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary"
                >
                  <svg
                    width="17"
                    height="10"
                    viewBox="0 0 17 10"
                    class="fill-current icon"
                  >
                    <path
                      d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                      fill="#3056D3"
                      stroke="#3056D3"
                    />
                  </svg>
                </div>
                <div class="w-full">
                  <h4 class="text-base font-semibold text-black sm:text-lg">
                  Can I enquire about a course ?
                  </h4>
                </div>
              </button>
              <div class="faq-content hidden pl-[62px]" id="faq4">
                <p class="py-3 text-base leading-relaxed text-body-color">
                  Yes, you can enquire about a course by clicking on the "Enquire" button on the course page and a member of our team will get back to you.
                </p>
              </div>
            </div>
            <div
              class="single-faq mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8"
              data-aos="fade-up" data-aos-delay="750"
            >
              <button class="flex items-center w-full text-left faq-btn" @click="dropFaq(5)">
                <div
                  class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary"
                >
                  <svg
                    width="17"
                    height="10"
                    viewBox="0 0 17 10"
                    class="fill-current icon"
                  >
                    <path
                      d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                      fill="#3056D3"
                      stroke="#3056D3"
                    />
                  </svg>
                </div>
                <div class="w-full">
                  <h4 class="text-base font-semibold text-black sm:text-lg">
                    How do I get in touch with customer support if I have a question or concern?
                  </h4>
                </div>
              </button>
              <div class="faq-content hidden pl-[62px]" id="faq5">
                <p class="py-3 text-base leading-relaxed text-body-color">
                  If you have a question or concern, you can contact customer support through the platform or by using the contact information provided.
                </p>
              </div>
            </div>
            <div
              class="single-faq  mb-8 w-full rounded-lg border border-[#F3F4FE] bg-white p-5 sm:p-8"
              data-aos="fade-up" data-aos-delay="850"
            >
              <button class="flex items-center w-full text-left faq-btn" @click="dropFaq(6)">
                <div
                  class="mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg bg-primary bg-opacity-5 text-primary"
                >
                  <svg
                    width="17"
                    height="10"
                    viewBox="0 0 17 10"
                    class="fill-current icon"
                  >
                    <path
                      d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                      fill="#3056D3"
                      stroke="#3056D3"
                    />
                  </svg>
                </div>
                <div class="w-full">
                  <h4 class="text-base font-semibold text-black sm:text-lg">
                    How do I sign up for the platform?
                  </h4>
                </div>
              </button>
              <div class="faq-content hidden pl-[62px]" id="faq6">
                <p class="py-3 text-base leading-relaxed text-body-color">
                  Sign ups aren't open yet, but you can show your interest by filling out the form on the homepage.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="absolute bottom-0 right-0 z-[-1]" data-aos="zoom-in-up" data-aos-delay="650">
        <svg
          width="1440"
          height="886"
          viewBox="0 0 1440 886"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            opacity="0.5"
            d="M193.307 -273.321L1480.87 1014.24L1121.85 1373.26C1121.85 1373.26 731.745 983.231 478.513 729.927C225.976 477.317 -165.714 85.6993 -165.714 85.6993L193.307 -273.321Z"
            fill="url(#paint0_linear)"
            class="animate-pulse"
          />
          <defs class="animate-pulse">
            <linearGradient
              id="paint0_linear"
              x1="1308.65"
              y1="1142.58"
              x2="602.827"
              y2="-418.681"
              gradientUnits="userSpaceOnUse"
            >
              <stop stop-color="#3056D3" stop-opacity="0.36" />
              <stop offset="1" stop-color="#F5F2FD" stop-opacity="0" />
              <stop offset="1" stop-color="#F5F2FD" stop-opacity="0.096144" />
            </linearGradient>
          </defs>
        </svg>
      </div>
    </section>
    <!-- ====== Faq Section End -->

    <!-- ====== Testimonials Start ====== -->
    {{-- <section id="testimonials" class="pt-20 md:pt-[120px]">
      <div class="container px-4">
        <div class="flex flex-wrap">
          <div class="w-full mx-4">
            <div class="mx-auto mb-[60px] max-w-[620px] text-center lg:mb-20">
              <span class="block mb-2 text-lg font-semibold text-primary">
                Testimonials
              </span>
              <h2
                class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[42px]"
              >
                What our Students Say
              </h2>
              <p
                class="text-lg leading-relaxed text-body-color sm:text-xl sm:leading-relaxed"
              >
                See what our satisfied students have to say about our tutoring platform.
              </p>
            </div>
          </div>
        </div>

        <div class="flex flex-wrap">
          <div class="w-full px-4 md:w-1/2 lg:w-1/3">
            <div
              class="p-8 mb-12 bg-white ud-single-testimonial shadow-testimonial"
              data-wow-delay=".1s
              "
            >
              <div class="flex items-center mb-3 ud-testimonial-ratings">
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
              </div>
              <div class="mb-6 ud-testimonial-content">
                <p class="text-base tracking-wide text-body-color">
                  “Our members are so impressed. It's intuitive. It's clean.
                  It's distraction free. If you're building a community.
                </p>
              </div>
              <div class="flex items-center ud-testimonial-info">
                <div
                  class="ud-testimonial-image mr-5 h-[50px] w-[50px] overflow-hidden rounded-full"
                >
                  <img
                    src="{{ asset('images/testimonials/author-01.png') }}"
                    alt="author"
                  />
                </div>
                <div class="ud-testimonial-meta">
                  <h4 class="text-sm font-semibold">Sabo Masties</h4>
                  <p class="text-xs text-[#969696]">Founder @ Rolex</p>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full px-4 md:w-1/2 lg:w-1/3">
            <div
              class="p-8 mb-12 bg-white ud-single-testimonial shadow-testimonial"
              data-wow-delay=".15s
              "
            >
              <div class="flex items-center mb-3 ud-testimonial-ratings">
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
              </div>
              <div class="mb-6 ud-testimonial-content">
                <p class="text-base tracking-wide text-body-color">
                  “Our members are so impressed. It's intuitive. It's clean.
                  It's distraction free. If you're building a community.
                </p>
              </div>
              <div class="flex items-center ud-testimonial-info">
                <div
                  class="ud-testimonial-image mr-5 h-[50px] w-[50px] overflow-hidden rounded-full"
                >
                  <img
                    src="{{ asset('images/testimonials/author-02.png') }}"
                    alt="author"
                  />
                </div>
                <div class="ud-testimonial-meta">
                  <h4 class="text-sm font-semibold">Margin Gesmu</h4>
                  <p class="text-xs text-[#969696]">Founder @ UI Hunter</p>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full px-4 md:w-1/2 lg:w-1/3">
            <div
              class="p-8 mb-12 bg-white ud-single-testimonial shadow-testimonial"
              data-wow-delay=".2s
              "
            >
              <div class="flex items-center mb-3 ud-testimonial-ratings">
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
                <span class="mr-1 text-[#fbb040]">
                  <svg
                    width="18"
                    height="16"
                    viewBox="0 0 18 16"
                    class="fill-current"
                  >
                    <path
                      d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z"
                    />
                  </svg>
                </span>
              </div>
              <div class="mb-6 ud-testimonial-content">
                <p class="text-base tracking-wide text-body-color">
                  “Our members are so impressed. It's intuitive. It's clean.
                  It's distraction free. If you're building a community.
                </p>
              </div>
              <div class="flex items-center ud-testimonial-info">
                <div
                  class="ud-testimonial-image mr-5 h-[50px] w-[50px] overflow-hidden rounded-full"
                >
                  <img
                    src="{{ asset('images/testimonials/author-03.png') }}"
                    alt="author"
                  />
                </div>
                <div class="ud-testimonial-meta">
                  <h4 class="text-sm font-semibold">William Smith</h4>
                  <p class="text-xs text-[#969696]">Founder @ Trorex</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </section> --}}

    @include('includes.contact-form')

    <script src="{{ asset('js/main.js') }}"></script>    

@endsection
