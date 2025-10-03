@extends('front-office.index')

@section('content')
    <!-- Hero section -->
      <section
        id="home"
        class="relative overflow-hidden bg-primary text-primary-color pt-[120px] md:pt-[130px] lg:pt-[160px]">
        <div class="container">
          <div class="-mx-5 flex flex-wrap items-center">
            <div class="w-full px-5">
              <div class="scroll-revealed mx-auto max-w-[780px] text-center">
                <h1
                  class="mb-6 text-3xl font-bold leading-snug text-primary-color sm:text-4xl sm:leading-snug lg:text-5xl lg:leading-tight"
                >
                  @lang('home.title')
                </h1>

                <p
                  class="mx-auto mb-9 max-w-[600px] text-base text-primary-color sm:text-lg sm:leading-normal"
                >
                  @lang('home.description')
                </p>

                <ul
                  class="mb-10 flex flex-wrap items-center justify-center gap-4 md:gap-5"
                >
                  <li>
                    <a
                      href="#services"
                      class="inline-flex items-center justify-center rounded-md bg-primary-color text-primary px-5 py-3 text-center text-base font-medium shadow-md hover:bg-primary-light-5 md:px-7 md:py-[14px]"
                      role="button"
                      >@lang('home.get_started')</a
                    >
                  </li>

                  {{-- <li>
                    <a
                      href="javascript:boid(0)"
                      class="video-popup flex items-center gap-4 rounded-md bg-primary-color/[0.15] px-5 py-3 text-base font-medium text-primary-color hover:bg-primary-color hover:text-primary md:px-7 md:py-[14px]"
                      role="button"
                      ><i class="lni lni-play text-lg/none"></i> @lang('home.watch_intro')</a
                    >
                  </li> --}}
                </ul>

                <div>
                  <p class="mb-4 text-center text-primary-color">@lang('home.powered_by')</p>

                  <div
                    class="scroll-revealed flex items-center justify-center gap-4 text-center"
                  >
                    <a
                      href="https://tailwindcss.com/"
                      target="_blank"
                      class="text-primary-color/60 hover:text-primary-color"
                    >
                    <img src="{{ asset('assets/img/logo/Logo-Meta-No-BG.png') }}" style="width: 300px;" alt="">
                      <!-- <svg
                        class="fill-current"
                        height="26"
                        viewBox=".16 .18 799.8 98.72"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="m248.04 41.78h-14.42v27.79c0 7.41 4.89 7.29 14.42 6.83v11.23c-19.3 2.32-26.98-3.01-26.98-18.06v-27.79h-10.7v-12.05h10.7v-15.55l12.56-3.7v19.25h14.42zm54.98-12.05h12.56v57.9h-12.56v-8.34c-4.42 6.14-11.29 9.85-20.36 9.85-15.81 0-28.95-13.32-28.95-30.46 0-17.25 13.14-30.45 28.95-30.45 9.07 0 15.94 3.7 20.36 9.72zm-18.38 47.48c10.47 0 18.38-7.76 18.38-18.53s-7.91-18.53-18.38-18.53-18.37 7.76-18.37 18.53 7.9 18.53 18.37 18.53zm51.87-56.16c-4.42 0-8.03-3.71-8.03-7.99.01-1.05.22-2.09.62-3.06a7.997 7.997 0 0 1 4.34-4.32c.97-.4 2.02-.61 3.07-.61s2.09.21 3.07.61c.97.4 1.85.99 2.6 1.73.74.75 1.33 1.63 1.74 2.59.4.97.61 2.01.61 3.06 0 4.28-3.6 7.99-8.02 7.99zm-6.28 66.58v-57.9h12.56v57.9zm27.1 0v-84.53h12.56v84.53zm94.08-57.9h13.26l-18.26 57.9h-12.33l-12.09-39.02-12.21 39.02h-12.33l-18.26-57.9h13.26l11.28 39.95 12.21-39.95h11.98l12.09 39.95zm28.84-8.68c-4.42 0-8.02-3.71-8.02-7.99 0-1.05.21-2.09.61-3.06.41-.96 1-1.84 1.74-2.59.75-.74 1.63-1.33 2.6-1.73.98-.4 2.02-.61 3.07-.61a8.044 8.044 0 0 1 5.67 2.34c.75.75 1.34 1.63 1.74 2.59.41.97.62 2.01.62 3.06 0 4.28-3.61 7.99-8.03 7.99zm-6.28 66.58v-57.9h12.56v57.9zm80.02-35.55v35.55h-12.56v-34.27c0-8.81-5.12-13.44-13.03-13.44-8.26 0-14.77 4.87-14.77 16.68v31.03h-12.56v-57.9h12.56v7.41c3.84-6.02 10.12-8.91 18.03-8.91 13.02 0 22.33 8.8 22.33 23.85zm59.54-45.51h12.56v81.06h-12.56v-8.34c-4.42 6.14-11.28 9.85-20.35 9.85-15.82 0-28.96-13.32-28.96-30.46 0-17.25 13.14-30.45 28.96-30.45 9.07 0 15.93 3.7 20.35 9.72zm-18.37 70.64c10.46 0 18.37-7.76 18.37-18.53s-7.91-18.53-18.37-18.53c-10.47 0-18.38 7.76-18.38 18.53s7.91 18.53 18.38 18.53zm42.33-18.53c0-17.25 13.14-30.45 30.7-30.45 11.4 0 21.28 5.9 25.93 14.94l-10.81 6.25c-2.56-5.44-8.26-8.92-15.24-8.92-10.23 0-18.02 7.76-18.02 18.18s7.79 18.18 18.02 18.18c6.98 0 12.68-3.59 15.47-8.91l10.82 6.13c-4.89 9.15-14.77 15.06-26.17 15.06-17.56 0-30.7-13.32-30.7-30.46zm108.85 12.62c0 11.58-10.12 17.84-22.68 17.84-11.63 0-20-5.22-23.72-13.55l10.81-6.26c1.87 5.22 6.52 8.34 12.91 8.34 5.59 0 9.89-1.85 9.89-6.48 0-10.31-31.28-4.52-31.28-25.25 0-10.88 9.42-17.71 21.28-17.71 9.53 0 17.44 4.4 21.51 12.04l-10.58 5.91c-2.09-4.52-6.16-6.6-10.93-6.6-4.54 0-8.49 1.96-8.49 6.13 0 10.54 31.28 4.17 31.28 25.59zm53.62 0c0 11.58-10.12 17.84-22.68 17.84-11.63 0-20.01-5.22-23.73-13.55l10.82-6.26c1.86 5.22 6.51 8.34 12.91 8.34 5.58 0 9.88-1.85 9.88-6.48 0-10.31-31.28-4.52-31.28-25.25 0-10.88 9.42-17.71 21.28-17.71 9.54 0 17.45 4.4 21.52 12.04l-10.59 5.91c-2.09-4.52-6.16-6.6-10.93-6.6-4.53 0-8.49 1.96-8.49 6.13 0 10.54 31.29 4.17 31.29 25.59z"
                        />
                        <path
                          d="m82.79.18c-22.03 0-35.81 10.97-41.32 32.91 8.27-10.97 17.91-15.09 28.93-12.35 6.28 1.57 10.77 6.11 15.75 11.14 8.1 8.18 17.48 17.66 37.96 17.66 22.03 0 35.8-10.97 41.31-32.91-8.26 10.97-17.9 15.08-28.92 12.34-6.28-1.56-10.78-6.11-15.75-11.13-8.1-8.19-17.48-17.66-37.96-17.66zm-41.32 49.36c-22.03 0-35.8 10.97-41.31 32.91 8.26-10.97 17.9-15.08 28.92-12.34 6.29 1.56 10.78 6.11 15.75 11.13 8.1 8.19 17.48 17.66 37.96 17.66 22.04 0 35.81-10.97 41.32-32.91-8.27 10.97-17.91 15.09-28.92 12.35-6.29-1.57-10.78-6.11-15.76-11.14-8.1-8.18-17.48-17.66-37.96-17.66z"
                        />
                      </svg> -->
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full px-5">
              <div class="scroll-revealed relative z-10 mx-auto max-w-[845px]">
                <div class="swiper swiper1 mt-16">
                  <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <figure>
                          <img
                            src="{{ asset('assets/img/Headline-BPO.jpeg')}}"
                            alt="Hero image"
                            class="mx-auto max-w-full rounded-t-xl rounded-tr-xl"
                          />
                        </figure>
                      </div>
                      <div class="swiper-slide">
                        <figure>
                          <img
                            src="{{ asset('assets/img/Headline-Bluetick.jpeg')}}"
                            alt="Hero image"
                            class="mx-auto max-w-full rounded-t-xl rounded-tr-xl"
                          />
                        </figure>
                      </div>
                  </div>
                  <div class="swiper-pagination"></div>
                </div>

                <div class="absolute -left-9 bottom-0 z-[-1]">
                  <img
                    src="{{ asset('assets/img/dots.svg')}}"
                    alt
                    class="w-[120px] opacity-75"
                  />
                </div>

                <div class="absolute -right-6 -top-6 z-[-1]">
                  <img
                    src="{{ asset('assets/img/dots.svg')}}"
                    alt
                    class="w-[120px] opacity-75"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- About section -->
      <section id="about" class="section-area">
        <div class="container">
          <div class="grid grid-cols-1 gap-14 lg:grid-cols-2">
            <div class="w-full">
              <figure class="scroll-revealed max-w-[480px] mx-auto">
                <img
                  src="{{ asset('assets/img/about-img.jpg')}}"
                  alt="About image"
                  class="rounded-xl"
                />
              </figure>
            </div>

            <div class="w-full">
              <div class="scroll-revealed">
                <h6 class="mb-2 block text-lg font-semibold text-primary">
                  @lang('home.our_company')
                </h6>
                <h2 class="mb-6">
                  @lang('home.founded_since')
                </h2>
              </div>

              <div class="tabs scroll-revealed">
                <nav
                  class="tabs-nav flex flex-wrap gap-4 my-8"
                  role="tablist"
                  aria-label="About us tabs"
                >
                  <button
                    type="button"
                    class="tabs-link inline-block py-2 px-4 rounded-md text-body-light-12 dark:text-body-dark-12 bg-body-light-12/10 dark:bg-body-dark-12/10 text-inherit font-medium hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color"
                    data-web-toggle="tabs"
                    data-web-target="tabs-panel-profile"
                    id="tabs-list-profile"
                    role="tab"
                    aria-controls="tabs-panel-profile"
                  >
                    @lang('home.our_profile.title')
                  </button>

                  <button
                    type="button"
                    class="tabs-link inline-block py-2 px-4 rounded-md text-body-light-12 dark:text-body-dark-12 bg-body-light-12/10 dark:bg-body-dark-12/10 text-inherit font-medium hover:bg-primary hover:text-primary-color focus:bg-primary focus:text-primary-color"
                    data-web-toggle="tabs"
                    data-web-target="tabs-panel-vision"
                    id="tabs-list-vision"
                    role="tab"
                    aria-controls="tabs-panel-vision"
                  >
                    @lang('home.our_vision.title')
                  </button>

                </nav>

                <div
                  class="tabs-content mt-4"
                  id="tabs-panel-profile"
                  tabindex="-1"
                  role="tabpanel"
                  aria-labelledby="tabs-list-profile"
                >
                  <p>
                    @lang('home.our_profile.description')
                  </p>
                </div>

                <div
                  class="tabs-content mt-4"
                  id="tabs-panel-vision"
                  tabindex="-1"
                  role="tabpanel"
                  aria-labelledby="tabs-list-vision"
                >
                  <p><strong>@lang('home.our_mission.title')</strong> <br>
                    @lang('home.our_mission.description')
                  </p>
                  <p><strong>@lang('home.our_vision.title')</strong> <br>
                    @lang('home.our_vision.description')
                  </p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Picture section -->
      <section id="management-gallery" class="section-area bg-body-light-1">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">@lang('home.organization.title')</h6>
            <h2 class="mb-6">@lang('home.organization.sub_title')</h2>
          </div>

          <div id="management-detail" class="mb-8">
            <div class="row justify-center">
              <div class="col-4 sm:col-12 w-full justify-item-center">
                <img id="management-image"
                    src="{{ asset('assets/img/manajemen/Bapak-Adi-Patriyadi-1.jpg') }}"
                    alt="CEO"
                    class=" object-contain rounded-xl shadow-card-2 scroll-revealed">
              </div>
            </div>
          </div>

          <div class="swiper common-carousel scroll-revealed">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="cursor-pointer group relative w-full h-[320px] rounded-xl overflow-hidden shadow-card-2"
                    onclick="showManagementDetail(
                      '{{ asset('assets/img/manajemen/Bapak-Adi-Patriyadi-1.jpg') }}'
                    )">
                  <img src="{{ asset('assets/img/manajemen/Bapak-Adi-Patriyadi-1.jpg') }}"
                      alt="CEO"
                      class="w-full h-full object-cover">
                </div>
              </div>

              <div class="swiper-slide">
                <div class="cursor-pointer group relative w-full h-[320px] rounded-xl overflow-hidden shadow-card-2"
                    onclick="showManagementDetail(
                      '{{ asset('assets/img/manajemen/manajemen-1.jpg') }}'
                    )">
                  <img src="{{ asset('assets/img/manajemen/manajemen-1.jpg') }}"
                      alt="CTO"
                      class="w-full h-full object-cover">
                </div>
              </div>

              <div class="swiper-slide">
                <div class="cursor-pointer group relative w-full h-[320px] rounded-xl overflow-hidden shadow-card-2"
                    onclick="showManagementDetail(
                      '{{ asset('assets/img/manajemen/manajemen-2.jpg') }}'
                    )">
                  <img src="{{ asset('assets/img/manajemen/manajemen-2.jpg') }}"
                      alt="CFO"
                      class="w-full h-full object-cover">
                </div>
              </div>

              <div class="swiper-slide">
                <div class="cursor-pointer group relative w-full h-[320px] rounded-xl overflow-hidden shadow-card-2"
                    onclick="showManagementDetail(
                      '{{ asset('assets/img/manajemen/manajemen-3.jpg') }}'
                    )">
                  <img src="{{ asset('assets/img/manajemen/manajemen-3.jpg') }}"
                      alt="CFO"
                      class="w-full h-full object-cover">
                </div>
              </div>
            </div>

            <div class="swiper-button-prev">
              <i class="fa fa-chevron-left"></i>
            </div>
            <div class="swiper-button-next">
              <i class="fa fa-chevron-right"></i>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Certification section -->
      <section id="certification" class="section-area">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">@lang('home.certification.title')</h6>
            <h2 class="mb-6">Kalapa Technology</h2>
            <p>
              @lang('home.certification.description')
            </p>
          </div>

          <div class="row">
            <div class="scroll-revealed col-12 sm:col-12 md:col-4 lg:col-3">
              <figure
                class="group rounded-xl bg-body-light-1 dark:bg-body-dark-12/10 px-5 pb-10 pt-12 shadow-card-2 hover:shadow-lg hover:-translate-y-1"
              >
                <div class="relative z-10 mx-auto mb-5 h-[120px] w-[120px]">
                  <img
                    src="https://wkk-automotive.com/wp-content/uploads/2017/09/iso-logo.gif"
                    alt="ISO 9001:2008"
                    class="h-full w-full rounded-full object-cover"
                  />
                  <span
                    class="absolute bottom-0 left-0 -z-10 h-10 w-10 rounded-full bg-red-500 opacity-0 group-hover:opacity-100"
                  ></span>
                  <span
                    class="absolute top-0 right-0 -z-10 h-10 w-10 rounded-full bg-blue-500 opacity-0 group-hover:opacity-100"
                  ></span>
                </div>
                <figcaption class="text-center block">
                  <h4
                    class="mb-1 text-lg font-semibold text-body-light-12 dark:text-body-dark-12"
                  >
                    ISO 9001:2008
                  </h4>
                  <p
                    class="mb-5 text-sm text-body-light-11 dark:text-body-dark-11"
                  >
                    @lang('home.registered')
                  </p>
                  <!-- <div class="flex items-center justify-center gap-5">
                    <a
                      href="javascript:void(0)"
                      class="text-body-light-10 dark:text-body-dark-10 hover:text-primary"
                    >
                      <i class="lni lni-facebook-fill"></i>
                    </a>
                    <a
                      href="javascript:void(0)"
                      class="text-body-light-10 dark:text-body-dark-10 hover:text-primary"
                    >
                      <i class="lni lni-twitter-original"></i>
                    </a>
                    <a
                      href="javascript:void(0)"
                      class="text-body-light-10 dark:text-body-dark-10 hover:text-primary"
                    >
                      <i class="lni lni-instagram-original"></i>
                    </a>
                  </div> -->
                </figcaption>
              </figure>
            </div>

            <div class="scroll-revealed col-12 sm:col-12 md:col-4 lg:col-3">
              <figure
                class="group rounded-xl bg-body-light-1 dark:bg-body-dark-12/10 px-5 pb-10 pt-12 shadow-card-2 hover:shadow-lg hover:-translate-y-1"
              >
                <div class="relative z-10 mx-auto mb-5 h-[120px] w-[120px]">
                  <img
                    src="https://codific.com/wp-content/uploads/2023/05/ISO-logo.png"
                    alt="ISO 27001"
                    class="h-full w-full rounded-full object-cover"
                  />
                  <span
                    class="absolute bottom-0 left-0 -z-10 h-10 w-10 rounded-full bg-red-500 opacity-0 group-hover:opacity-100"
                  ></span>
                  <span
                    class="absolute top-0 right-0 -z-10 h-10 w-10 rounded-full bg-blue-500 opacity-0 group-hover:opacity-100"
                  ></span>
                </div>
                <figcaption class="text-center block">
                  <h4
                    class="mb-1 text-lg font-semibold text-body-light-12 dark:text-body-dark-12"
                  >
                    ISO 27001
                  </h4>
                  <p
                    class="mb-5 text-sm text-body-light-11 dark:text-body-dark-11"
                  >
                    @lang('home.registered')
                  </p>
                  <!-- <div class="flex items-center justify-center gap-5">
                    <a
                      href="javascript:void(0)"
                      class="text-body-light-10 dark:text-body-dark-10 hover:text-primary"
                    >
                      <i class="lni lni-facebook-fill"></i>
                    </a>
                    <a
                      href="javascript:void(0)"
                      class="text-body-light-10 dark:text-body-dark-10 hover:text-primary"
                    >
                      <i class="lni lni-twitter-original"></i>
                    </a>
                    <a
                      href="javascript:void(0)"
                      class="text-body-light-10 dark:text-body-dark-10 hover:text-primary"
                    >
                      <i class="lni lni-instagram-original"></i>
                    </a>
                  </div> -->
                </figcaption>
              </figure>
            </div>

            <div class="scroll-revealed col-12 sm:col-12 md:col-4 lg:col-3">
              <figure
                class="group rounded-xl bg-body-light-1 dark:bg-body-dark-12/10 px-5 pb-10 pt-12 shadow-card-2 hover:shadow-lg hover:-translate-y-1"
              >
                <div class="relative z-10 mx-auto mb-5 h-[120px] w-[120px]">
                  <img
                    src="https://qms-consulting.id/wp-content/uploads/2020/12/1_G1Yc_22hHBfgGlNdRJpBDw.jpeg"
                    alt="ISO 9001:2015"
                    class="h-full w-full rounded-full object-cover"
                  />
                  <span
                    class="absolute bottom-0 left-0 -z-10 h-10 w-10 rounded-full bg-red-500 opacity-0 group-hover:opacity-100"
                  ></span>
                  <span
                    class="absolute top-0 right-0 -z-10 h-10 w-10 rounded-full bg-blue-500 opacity-0 group-hover:opacity-100"
                  ></span>
                </div>
                <figcaption class="text-center block">
                  <h4
                    class="mb-1 text-lg font-semibold text-body-light-12 dark:text-body-dark-12"
                  >
                    ISO 9001:2015
                  </h4>
                  <p
                    class="mb-5 text-sm text-body-light-11 dark:text-body-dark-11"
                  >
                    @lang('home.registered')
                  </p>
                  <!-- <div class="flex items-center justify-center gap-5">
                    <a
                      href="javascript:void(0)"
                      class="text-body-light-10 dark:text-body-dark-10 hover:text-primary"
                    >
                      <i class="lni lni-facebook-fill"></i>
                    </a>
                    <a
                      href="javascript:void(0)"
                      class="text-body-light-10 dark:text-body-dark-10 hover:text-primary"
                    >
                      <i class="lni lni-twitter-original"></i>
                    </a>
                    <a
                      href="javascript:void(0)"
                      class="text-body-light-10 dark:text-body-dark-10 hover:text-primary"
                    >
                      <i class="lni lni-instagram-original"></i>
                    </a>
                  </div> -->
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
      </section>

      <!-- Life section -->
      <section id="life" class="section-area">
        <div class="container">
          <div class="grid grid-cols-1 gap-14 lg:grid-cols-2">
            <div class="w-full">
              <div class="scroll-revealed">
                <h6 class="mb-2 block text-lg font-semibold text-primary">
                  LIFE @ KALAPA
                </h6>
                <h2 class="mb-6">
                  @lang('home.life.sub_title') <span style="color: #e2bb3a">Life @ Kalapa</span>
                </h2>
              </div>

              <div class="scroll-revealed">
                <p>
                  @lang('home.life.description')
                </p>
              </div>
            </div>
            <div class="w-full">
              <figure class="scroll-revealed max-w-[480px] mx-auto">
                <img
                  src="{{ asset('assets/img/about-img.jpg')}}"
                  alt="About image"
                  class="rounded-xl"
                />
              </figure>
            </div>
          </div>
          <div class="w-full">
            <h2 class="scroll-revealed my-16 text-center font-semibold text-body-light-12 dark:text-body-dark-12 sm:text-2xl xl:text-2xl">
              @lang('home.life.fundamental')
            </h2>
            <div class="timeline-horizontal">
              <div class="scroll-revealed timeline-line"></div>
  
              <div class="scroll-revealed timeline-item top">
                <div class="scroll-revealed timeline-dot"><i class="fas fa-trophy"></i></div>
                <div class="scroll-revealed timeline-card blue">Be The Best</div>
              </div>
  
              <div class="scroll-revealed timeline-item bottom">
                <div class="scroll-revealed timeline-dot"><i class="fas fa-book-open"></i></div>
                <div class="scroll-revealed timeline-card white">Learning Everyday</div>
              </div>
  
              <div class="scroll-revealed timeline-item top">
                <div class="scroll-revealed timeline-dot"><i class="fas fa-bullseye"></i></div>
                <div class="scroll-revealed timeline-card blue">The Result Depend On You</div>
              </div>
  
              <div class="scroll-revealed timeline-item bottom">
                <div class="scroll-revealed timeline-dot"><i class="fas fa-users"></i></div>
                <div class="scroll-revealed timeline-card white">Responsible and No Blame</div>
              </div>
  
              <div class="scroll-revealed timeline-item top">
                <div class="scroll-revealed timeline-dot"><i class="fas fa-ban"></i></div>
                <div class="scroll-revealed timeline-card blue">No Excuse</div>
              </div>
  
              <div class="scroll-revealed timeline-item bottom">
                <div class="scroll-revealed timeline-dot"><i class="fas fa-sync-alt"></i></div>
                <div class="scroll-revealed timeline-card white">Continuous Improvement</div>
              </div>
  
              <div class="scroll-revealed timeline-item top">
                <div class="scroll-revealed timeline-dot"><i class="fas fa-hands-helping"></i></div>
                <div class="scroll-revealed timeline-card blue">Support Each Other</div>
              </div>
            </div>
            <div class="container">
              <div class="scroll-revealed swiper fundamental-slider mt-16" style="margin-top: 10%">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="gallery-item sm:gallery-item">
                      <img src="{{ asset('assets/img/manajemen/manajemen-1.jpg') }}" alt="Gallery 1">
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="gallery-item sm:gallery-item">
                      <img src="{{ asset('assets/img/manajemen/manajemen-2.jpg') }}" alt="Gallery 2">
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="gallery-item sm:gallery-item">
                      <img src="{{ asset('assets/img/manajemen/manajemen-3.jpg') }}" alt="Gallery 3">
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="gallery-item sm:gallery-item">
                      <img src="{{ asset('assets/img/manajemen/manajemen-4.jpg') }}" alt="Gallery 4">
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="gallery-item sm:gallery-item">
                      <img src="{{ asset('assets/img/manajemen/manajemen-5.jpg') }}" alt="Gallery 4">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Services section -->
      <section id="services" class="section-area">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">
              @lang('home.services.title')
            </h6>
            <h2 class="mb-6">@lang('home.services.sub_title')</h2>
            <p>
              @lang('home.services.description')
            </p>
          </div>

          <div class="row">
            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none text-primary-color"
                >
                  <img src="https://cdn2.iconfinder.com/data/icons/social-media-agency-malibu-vol-1-1/128/Community_Management_Services-512.png" alt="">
                  <!-- <i class="lni lni-capsule"></i> -->
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                    BPO & MPO Manage Services
                  </h4>
                  <p>
                    @lang('home.solutions.bpo_&_mpo') 
                  </p>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none text-primary-color"
                >
                <img src="https://cdn-icons-png.flaticon.com/512/11672/11672928.png" alt="">  
                <!-- <i class="lni lni-tailwindcss"></i> -->
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                    Telesystem
                  </h4>
                  <p>
                    @lang('home.solutions.telesystem')
                  </p>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none text-primary-color"
                >
                 <img src="https://pcxcom.com/wp-content/uploads/2015/12/omnichannel_cluster_flat_03.png" alt=""> 
                <!-- <i class="lni lni-gift"></i> -->
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                    Omni-channels
                  </h4>
                  <p>
                    @lang('home.solutions.omnichannels')
                  </p>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none text-primary-color"
                >
                  <img src="https://static.vecteezy.com/system/resources/thumbnails/047/309/918/small_2x/verified-badge-profile-icon-png.png" alt="">
                <!-- <i class="lni lni-layout"></i> -->
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                    WABA API Services
                  </h4>
                  <p>
                    @lang('home.solutions.waba')
                  </p>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none text-primary-color"
                >
                <img src="https://cdn-icons-png.flaticon.com/512/13330/13330989.png" alt="">  
                <!-- <i class="lni lni-grid-alt"></i> -->
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                    Chatbot & Voice AI
                  </h4>
                  <p>
                    @lang('home.solutions.chatbot')
                  </p>
                </div>
              </div>
            </div>

             <div class="scroll-revealed col-12 sm:col-6 lg:col-4">
              <div class="group hover:-translate-y-1">
                <div
                  class="w-[70px] h-[70px] rounded-2xl mb-6 flex items-center justify-center text-[37px]/none text-primary-color"
                >
                  <img src="https://cdn-icons-png.flaticon.com/512/15564/15564472.png" alt="">
                <!-- <i class="lni lni-layers"></i> -->
                </div>
                <div class="w-full">
                  <h4 class="text-[1.25rem]/tight font-semibold mb-5">
                    Premise & Infrastructure
                  </h4>
                  <p>
                    @lang('home.solutions.premise_&_infrastructure')
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center mt-11">
            <button
              onclick="openModal('requestModal')"
              class="btn-navbar ml-5 px-6 py-3 rounded-md bg-primary text-base font-medium text-primary-color"
              role="button"
              >@lang('home.products.buttons.send_request')
            </button>
          </div>
        </div>
      </section>

      <!-- Intro video section -->
      <!-- <section id="intro" class="section-area">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">
              Intro Video
            </h6>
            <h2 class="mb-6">Watch Our Intro Video</h2>
            <p>
              There are many variations of passages of Lorem Ipsum available but
              the majority have suffered alteration in some form.
            </p>
          </div>

          <div class="scroll-revealed relative max-w-[900px] mx-auto">
            <img
              src="./assets/img/intro-video.jpg"
              alt="Intro video"
              class="w-full h-full aspect-video rounded-xl object-cover"
            />
            <a
              href="javascript:void(0)"
              class="video-popup w-[80px] h-[80px] rounded-full inline-flex items-center justify-center bg-primary text-primary-color text-[1.875rem] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 shadow-md hover:bg-primary-color hover:text-primary hover:shadow-xl focus:bg-primary-color focus:text-primary focus:shadow-xl"
            >
              <i class="lni lni-play"></i>
            </a>
          </div>
        </div>
      </section> -->

      <!-- Demo section -->
      {{-- <section id="demo" class="section-area">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">
              Demo / Trial
            </h6>
            <h2 class="mb-6">@lang('home.demo.title')</h2>
            <p>
              @lang('home.demo.description')
            </p>
          </div>

          <div class="row">
            <div class="scroll-revealed col-12 sm:col-12 lg:col-4">
              <div
                class="rounded-xl py-12 px-9 bg-body-light-1 dark:bg-body-dark-12/10 text-center shadow-card-1 hover:shadow-lg"
              >
                <div>
                  <h6
                    class="inline-block font-medium text-base mb-6 text-primary-color bg-primary rounded-md py-2 px-8 pricing-title"
                  >
                    Outbound Telesystem
                  </h6>
                  <p>
                    @lang('home.products.outbound.description')
                  </p>
                  <div class="pt-8">
                    <center>
                      <img src="https://cdn-icons-png.freepik.com/512/6024/6024165.png" style="width: 150px;" alt="telesystem">
                    </center>
                    <!-- <h2
                      class="font-semibold inline-block relative pl-4 text-[55px]"
                    >
                      <span
                        class="font-normal text-body-light-11 dark:text-body-dark-11 text-[1.25rem] absolute left-0 top-1.5"
                        >$</span
                      >0<span
                        class="text-[1.125rem] inline-block text-body-light-11 dark:text-body-dark-11 font-normal"
                        >/mo</span
                      >
                    </h2> -->
                  </div>
                </div>
                <div class="pt-8 pb-10">
                </div>
                <div>
                  <ul>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>@lang('home.products.outbound.benefits.1')</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>@lang('home.products.outbound.benefits.2')</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>@lang('home.products.outbound.benefits.3')</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>@lang('home.products.outbound.benefits.4')</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-12 lg:col-4">
              <div
                class="rounded-xl py-12 px-9 bg-body-light-1 dark:bg-body-dark-12/10 text-center shadow-lg"
              >
                <div>
                  <h6
                    class="inline-block font-medium text-base mb-6 text-primary-color bg-primary rounded-md py-2 px-8 pricing-title"
                  >
                    Whatsapp Blast
                  </h6>
                  <p>
                    @lang('home.products.whatsapp_blast.description')
                  </p>
                  <div class="pt-8">
                    <center>
                      <img src="{{ asset('assets/img/logo/New-Logo-Kalista-removebg.png')}}" style="width: 150px;" alt="kalista-pulse">
                    </center>
                    <!-- <h2
                      class="font-semibold inline-block relative pl-4 text-[55px]"
                    >
                      <span
                        class="font-normal text-body-light-11 dark:text-body-dark-11 text-[1.25rem] absolute left-0 top-1.5"
                        >$</span
                      >99<span
                        class="text-[1.125rem] inline-block text-body-light-11 dark:text-body-dark-11 font-normal"
                        >/mo</span
                      >
                    </h2> -->
                  </div>
                </div>
                <div class="pt-8 pb-10">
                </div>
                <div>
                  <ul>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>@lang('home.products.whatsapp_blast.benefits.1')</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>@lang('home.products.whatsapp_blast.benefits.2')</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>@lang('home.products.whatsapp_blast.benefits.3')</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>@lang('home.products.whatsapp_blast.benefits.4')</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="scroll-revealed col-12 sm:col-12 lg:col-4">
              <div
                class="rounded-xl py-12 px-9 bg-body-light-1 dark:bg-body-dark-12/10 text-center shadow-card-1 hover:shadow-lg"
              >
                <div>
                  <h6
                    class="inline-block font-medium text-base mb-6 text-primary-color bg-primary rounded-md py-2 px-8 pricing-title"
                  >
                    Omni-channels
                  </h6>
                  <p>
                    @lang('home.products.omnichannels.description')
                  </p>
                  <div class="pt-8">
                    <center>
                      <img src="https://media.istockphoto.com/id/2011254725/vector/omnichannel-marketing-framework-infographic-diagram-chart-illustration-banner-template-with.jpg?s=612x612&w=0&k=20&c=PXjRWLqNzgE0MyIIW1GE1XPvYLH-Yo1_pzyKwIodX1c=" style="width: 150px;" alt="omnichannels">
                    </center>
                    <!-- <h2
                      class="font-semibold inline-block relative pl-4 text-[55px]"
                    >
                      <span
                        class="font-normal text-body-light-11 dark:text-body-dark-11 text-[1.25rem] absolute left-0 top-1.5"
                        >$</span
                      >99<span
                        class="text-[1.125rem] inline-block text-body-light-11 dark:text-body-dark-11 font-normal"
                        >/mo</span
                      >
                    </h2> -->
                  </div>
                </div>
                <div class="pt-8 pb-10">
                </div>
                <div>
                  <ul>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>@lang('home.products.omnichannels.benefits.1')</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>@lang('home.products.omnichannels.benefits.2')</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>@lang('home.products.omnichannels.benefits.3')</span>
                    </li>
                    <li
                      class="text-left relative mb-3 inline-flex gap-3 w-full"
                    >
                      <i
                        class="lni lni-checkmark-circle text-primary text-base leading-[24px]"
                      ></i>
                      <span>@lang('home.products.omnichannels.benefits.4')</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> --}}

      <!-- Modal Request -->
      <div id="requestModal" class="modal-overlay"
          style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.7); z-index:99999; justify-content:center; align-items:center;">
        <div style="max-width:90%;" class="form-scope modal-content bg-body-light-1 dark:bg-primary-dark-2 rounded-xl py-8 sm:py-12 px-6 sm:px-10 z-10 relative shadow-card-1 hover:shadow-lg">
          <div class="text-center max-w-[550px] mx-auto mb-12">
            <h2 class="mb-3">@lang('home.form.demo.title')</h2>
            <p>
              @lang('home.form.demo.sub_title')
            </p>
          </div>

          <form action="{{ route('demo-trial.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="product_request" class="form-title">@lang('home.form.demo.column.name.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fas fa-user" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <input type="text" name="name" id="name" style="padding-left:2.5rem;" required placeholder="@lang('home.form.demo.column.name.placeholder')">
              </div>
            </div>

            <div class="form-group">
              <label for="phone" class="form-title">@lang('home.form.demo.column.phone.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-phone" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <input type="text" name="phone" id="phone" style="padding-left:2.5rem;" required placeholder="@lang('home.form.demo.column.phone.placeholder')">
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="form-title">Email <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-envelope" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <input type="text" name="email" id="email" style="padding-left:2.5rem;" required placeholder="Email">
              </div>
            </div>

            <div class="form-group">
              <label for="company_name" class="form-title">@lang('home.form.demo.column.company_name.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-building" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <input type="text" name="company_name" id="company_name" style="padding-left:2.5rem;" required placeholder="@lang('home.form.demo.column.company_name.placeholder')">
              </div>
            </div>

            <div class="form-group">
              <label for="product_request" class="form-title">@lang('home.form.demo.column.product_request.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-box" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <select id="product_request" name="product_request" style="padding-left:2.5rem;" required placeholder="@lang('home.form.demo.column.company_name.placeholder')">
                    <option disabled selected>@lang('home.form.demo.column.product_request.default')</option>
                    <option value="BPO & MPO Manage Services">BPO & MPO Manage Services</option>
                    <option value="Telesystem">Telesystem</option>
                    <option value="Omni-channels">Omni-channels</option>
                    <option value="WABA API Services">WABA API Services</option>
                    <option value="Chatbot & Voice AI">Chatbot & Voice AI</option>
                    <option value="Premise & Infrastructure">Premise & Infrastructure</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="description" class="form-title">@lang('home.form.demo.column.description.label') <b style="color: red">*</b></label>
              <textarea name="description" id="description" required placeholder="@lang('home.form.demo.column.description.placeholder')"></textarea>
            </div>

            <input type="hidden" name="request_type" id="request_type" value="demo">

              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site') }}"></div>
              </div>

            <div class="form-actions">
              <button type="submit">@lang('home.products.buttons.send')</button>
              <button type="button" class="cancel" onclick="closeModal('requestModal')">@lang('home.products.buttons.cancel')</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Modal Career -->
      <div id="careerModal" class="modal-overlay"
          style="display:none; position:fixed; inset:0; z-index:99999; justify-content:center; align-items:center;">
        <div style="max-width:90%;" class="form-scope modal-content bg-body-light-1 dark:bg-primary-dark-2 rounded-xl py-8 sm:py-12 px-6 sm:px-10 z-10 relative shadow-card-1 hover:shadow-lg">
          <div style="display:flex; align-items:center; gap:10px; margin-bottom:15px;">
            <div class="text-center max-w-[550px] mx-auto mb-12">
              <h2 class="mb-3">@lang('home.form.career.title')</h2>
              <p>
                @lang('home.form.career.sub_title')
              </p>
            </div>
          </div>
          <form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="name" class="form-title">@lang('home.form.career.column.name.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-user" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <input type="text" name="name" id="name" style="padding-left:2.5rem;" required placeholder="@lang('home.form.career.column.name.placeholder')">
              </div>
            </div>

            <div class="form-group">
              <label for="phone" class="form-title">@lang('home.form.career.column.phone.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-phone" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <input type="text" name="phone" id="phone" style="padding-left:2.5rem;" required placeholder="@lang('home.form.career.column.phone.placeholder')">
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="form-title">Email <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-envelope" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <input type="text" name="email" id="email" style="padding-left:2.5rem;" required placeholder="Email">
              </div>
            </div>

            <div class="form-group">
              <label class="form-title">@lang('home.form.career.column.gender.label')</label>
              <div class="gender-toggle">
                <input type="radio" id="gender-male" name="gender" value="male" checked>
                <label for="gender-male">@lang('home.form.career.column.gender.male')</label>

                <input type="radio" id="gender-female" name="gender" value="female">
                <label for="gender-female">@lang('home.form.career.column.gender.female')</label>
              </div>
            </div>

            <div class="form-group">
              <label for="pob" class="form-title">@lang('home.form.career.column.pob.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-globe-asia" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <input type="text" name="pob" id="pob" style="padding-left:2.5rem;" required placeholder="@lang('home.form.career.column.pob.placeholder')">
              </div>
            </div>

            <div class="form-group">
              <label for="dob" class="form-title">@lang('home.form.career.column.dob.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-calendar" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <input type="date" name="dob" id="dob" style="padding-left:2.5rem;" required placeholder="@lang('home.form.career.column.dob.placeholder')">
              </div>
            </div>

            <div class="form-group">
              <label for="marital_status" class="form-title">@lang('home.form.career.column.marital_status.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-heart" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <select id="marital_status" name="marital_status" style="padding-left:2.5rem;" required placeholder="@lang('home.form.career.column.marital_status.placeholder')">
                    <option value="belum menikah">@lang('home.form.career.column.marital_status.single')</option>
                    <option value="sudah menikah">@lang('home.form.career.column.marital_status.married')</option>
                    <option value="bercerai">@lang('home.form.career.column.marital_status.divorced')</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="religion" class="form-title">@lang('home.form.career.column.religion.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-book" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <select id="religion" name="religion" style="padding-left:2.5rem;" required placeholder="@lang('home.form.career.column.religion.placeholder')">
                  <option value="islam">@lang('home.form.career.column.religion.muslim')</option>
                  <option value="katholik">@lang('home.form.career.column.religion.catholic')</option>
                  <option value="kristen">@lang('home.form.career.column.religion.christian')</option>
                  <option value="budha">@lang('home.form.career.column.religion.buddhist')</option>
                  <option value="hindu">@lang('home.form.career.column.religion.hindu')</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="province" class="form-title">@lang('home.form.career.column.province.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-map" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <input type="text" name="province" id="province" style="padding-left:2.5rem;" required placeholder="@lang('home.form.career.column.province.placeholder')">
              </div>
            </div>

            <div class="form-group">
              <label for="regency" class="form-title">@lang('home.form.career.column.regency.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-map" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <input type="text" name="regency" id="regency" style="padding-left:2.5rem;" required placeholder="@lang('home.form.career.column.regency.placeholder')">
              </div>
            </div>

            <div class="form-group">
              <label for="education" class="form-title">@lang('home.form.career.column.education.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-graduation-cap" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <select id="education" name="education" style="padding-left:2.5rem;" required>
                  <option value="SMA/K">@lang('home.form.career.column.education.senior_highscool')</option>
                  <option value="D3">@lang('home.form.career.column.education.d3')</option>
                  <option value="D2">@lang('home.form.career.column.education.d2')</option>
                  <option value="D1">@lang('home.form.career.column.education.d1')</option>
                  <option value="S1">@lang('home.form.career.column.education.s1')</option>
                  <option value="S2">@lang('home.form.career.column.education.s2')</option>
                  <option value="S3">@lang('home.form.career.column.education.s3')</option>
                  <option value="lainnya">@lang('home.form.career.column.education.other')</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="career" class="form-title">@lang('home.form.career.column.position.label') <b style="color: red">*</b></label>
              <div style="position:relative;">
                <i class="fa fa-briefcase" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#888;"></i>
                <select id="career" name="position_id" style="padding-left:2.5rem;" required>
                  @foreach ($careers as $career)
                    <option value="{{ $career->id }}">{{ $career->title }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="address" class="form-title">@lang('home.form.career.column.address.label') <b style="color: red">*</b></label>
              <textarea name="address" id="address" style="padding-left:2.5rem;" required placeholder="@lang('home.form.career.column.address.placeholder')"></textarea>
            </div>

            <div class="form-group">
              <label for="cv" class="form-title">Curriculum Vitae (CV) <small class="text-muted"> <b style="color: red">*</b>@lang('home.form.career.column.cv.placeholder') (2MB)</small></label>
              <input type="file" style="padding-left:2.5rem;" name="cv" id="cv" accept="application/pdf" required>
            </div>

            <div class="form-group">
              <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site') }}"></div>
            </div>

            <div class="form-actions">
              <button type="submit">@lang('home.products.buttons.send')</button>
              <button type="button" class="cancel" onclick="closeModal('careerModal')">@lang('home.products.buttons.cancel')</button>
            </div>
          </form> 
        </div>
      </div>

      <!-- FAQ section -->
      @include('front-office.user.components.faq')

      <!-- Blog section -->
      <section id="blog" class="section-area">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">Blog</h6>
            <h2 class="mb-6">@lang('home.blog.title')</h2>
            <p>
              @lang('home.blog.description')
            </p>
          </div>

          <!-- Articles section -->
          <div class="row mb-10">
            @foreach ($posts as $post)
              <div class="scroll-revealed col-12 sm:col-12 lg:col-4">
                <article class="group">
                  <div class="relative">
                    <a
                      href="{{ route('article.show', [$post->id, $post->slug]) }}"
                      class="w-full aspect-[3/2] rounded-xl overflow-hidden block"
                    >
                      <img
                        src="{{ url($post->image) }}"
                        alt="{{ $post->title }}"
                        class="w-full h-full object-cover group-hover:scale-[1.05] group-hover:rotate-[2deg]"
                      />
                    </a>
                  </div>
                  <span
                    class="block mt-6 w-full text-sm text-body-light-10 dark:text-body-dark-10"
                    >{{$post->user->name . ' - ' . $post->created_at}}</span
                  >
                  <h4 class="mb-6 mt-3 font-semibold text-[1.5rem]">
                    <a
                      href="{{ route('article.show', [$post->id, $post->slug]) }}"
                      class="text-body-light-12 dark:text-body-dark-12"
                      >{{ substr($post->title, 0, 50) . '...' }}</a
                    >
                  </h4>
                  <p>
                    {!! substr($post->content, 0, 250) . '...' !!}
                  </p>
                </article>
              </div>
            @endforeach
          </div>
          <div class="text-center mt-5">
            <a
              href="{{ route('article.index') }}"
              class="btn-navbar ml-5 px-6 py-3 rounded-md bg-primary text-base font-medium text-primary-color"
              role="button"
              >@lang('home.see_more')
            </a>
          </div>
        </div>
      </section>

      <!-- Clients section --> 
      <section id="clients" class="section-area">
        <div class="container">
          <div class="scroll-revealed text-center max-w-[550px] mx-auto mb-12">
            <h6 class="mb-2 block text-lg font-semibold text-primary">
              @lang('home.clients.title')
            </h6>
            <h2 class="mb-6">@lang('home.clients.sub_title')</h2>
            <p>
              @lang('home.clients.description')
            </p>
          </div>

          <div class="client-marquee">
            <div class="scroll-revealed client-row animate-left">
              @foreach ([
                'mitech-client-logo-01-hover.png',
                'mitech-client-logo-02-hover.png',
                'mitech-client-logo-03-hover.png',
                'mitech-client-logo-05-hover.png',
                'mitech-client-logo-06-hover.png',
                'mitech-client-logo-07-hover.png',
                'mitech-client-logo-08-hover.png',
                'mitech-client-logo-09-hover.png',
                'airbnb.svg',
                'mandiri.svg',
                'shopware.svg',
                'walmart.svg'
              ] as $logo)
              <div class="client-logo-wrapper">
                <img src="{{ asset('assets/img/brand/' . $logo) }}" alt="Brand Logo" class="client-logo-img" />
              </div>
              @endforeach
            </div>

            <div class="scroll-revealed client-row animate-right">
              @foreach ([
                'mitech-client-logo-10-hover.png',
                'mitech-client-logo-11-hover.png',
                'mitech-client-logo-12.png',
                'mitech-client-logo-13.png',
                'mitech-client-logo-14.png',
                'mitech-client-logo-15.png',
                'grabjoob-logo.png',
                'hypermart.png',
                'logo-almalik.png',
                'logo-enfagrow.png',
                'logo-mega-auto-finance.png',
                'logo-mega-central-finance.png'
              ] as $logo)
              <div class="client-logo-wrapper">
                <img src="{{ asset('assets/img/brand/' . $logo) }}" alt="Brand Logo" class="client-logo-img" />
              </div>
              @endforeach
            </div>

            <div class="scroll-revealed client-row animate-left">
              @foreach ([
                'Bank BJB Syariah.png',
                'Bank_Neo_Commerce.png',
                'Broadway.png',
                'Bukalapak.png',
                'Buku Warung.png',
                'Carro.png',
                'CBN.png',
                'Celebrity_Fitness_Official_New_Logo.png',
                'Danata.png',
                'Ecoroam.png',
                'Edukita.png',
                'GIP.jpeg'
              ] as $logo)
              <div class="client-logo-wrapper">
                <img src="{{ asset('assets/img/brand/' . $logo) }}" alt="Brand Logo" class="client-logo-img" />
              </div>
              @endforeach
            </div>

            <div class="scroll-revealed client-row animate-right">
              @foreach ([
                'Gofood_logo.svg.png',
                'gopay7196.jpg',
                'Hello Sehat.png',
                'Ilmubox.png',
                'images.png',
                'Immobi.png',
                'Indosat Ooredo.png',
                'LingoAce.png',
                'PayFazz.png',
                'PICT.png',
                'PLN NP.png',
                'princetondg_logo.jpeg'
              ] as $logo)
              <div class="client-logo-wrapper">
                <img src="{{ asset('assets/img/brand/' . $logo) }}" alt="Brand Logo" class="client-logo-img" />
              </div>
              @endforeach
            </div>

            <div class="scroll-revealed client-row animate-left">
              @foreach ([
                'Salesworks.png',
                'SAP.png',
                'Sayurbox.jpeg',
                'senyum-yatim.png',
                'SKF-Logo.png',
                'swa-bhuwana-paksa.png',
                'Telexindo.png',
                'Telmark.png',
                'Trimble.png',
                'Upperclift.png',
                'Wine Cartel.png',
                'XL Axiata.png'
              ] as $logo)
              <div class="client-logo-wrapper">
                <img src="{{ asset('assets/img/brand/' . $logo) }}" alt="Brand Logo" class="client-logo-img" />
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>

      <!-- Contact section -->
      <section id="contact" class="section-area">
        <div class="container">
          <div class="row">
            <div class="col-12 xl:col-4">
              <div class="row">
                <div class="col-12 md:col-6 xl:col-12">
                  <div
                    class="scroll-revealed py-5 px-6 rounded-xl shadow-card-1 bg-body-light-1 dark:bg-primary-dark-2 flex gap-6 hover:shadow-lg"
                  >
                    <div>
                      <i
                        class="lni lni-phone w-[50px] h-[50px] inline-flex items-center justify-center rounded-lg text-[1.25rem] bg-primary text-primary-color"
                      ></i>
                    </div>
                    <div>
                      <h4 class="text-[1.25rem] text-primary mb-3">@lang('home.contacts.contact')</h4>
                      <p class="m-0">+62 851-6864-7348</p>
                      <p class="m-0">bd.team@kalapatec.id</p>
                    </div>
                  </div>
                </div>

                <div class="col-12 md:col-6 xl:col-12">
                  <div
                    class="scroll-revealed py-5 px-6 rounded-xl shadow-card-1 bg-body-light-1 dark:bg-primary-dark-2 flex gap-6 hover:shadow-lg"
                  >
                    <div>
                      <i
                        class="lni lni-map-marker w-[50px] h-[50px] inline-flex items-center justify-center rounded-lg text-[1.25rem] bg-primary text-primary-color"
                      ></i>
                    </div>
                    <div>
                      <h4 class="text-[1.25rem] text-primary mb-3">@lang('home.contacts.address.title')</h4>
                      <p class="m-0">@lang('home.contacts.address.description')</p>
                    </div>
                  </div>
                </div>

                <div class="col-12 md:col-6 xl:col-12">
                  <div
                    class="scroll-revealed py-5 px-6 rounded-xl shadow-card-1 bg-body-light-1 dark:bg-primary-dark-2 flex gap-6 hover:shadow-lg"
                  >
                    <div>
                      <i
                        class="lni lni-alarm-clock w-[50px] h-[50px] inline-flex items-center justify-center rounded-lg text-[1.25rem] bg-primary text-primary-color"
                      ></i>
                    </div>
                    <div>
                      <h4 class="text-[1.25rem] text-primary mb-3">@lang('home.contacts.schedule.title')</h4>
                      <p class="m-0">@lang('home.contacts.schedule.description.hour')</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 xl:col-8">
              <div
                class="scroll-revealed bg-body-light-1 dark:bg-primary-dark-2 rounded-xl py-8 sm:py-12 px-6 sm:px-10 z-10 relative shadow-card-1 hover:shadow-lg"
              >
                <div class="text-center max-w-[550px] mx-auto mb-12">
                  <h6 class="mb-2 block text-lg font-semibold text-primary">
                    @lang('home.get_in_touch.title')
                  </h6>
                  <h2 class="mb-3">@lang('home.get_in_touch.get_started')</h2>
                  <p>
                    @lang('home.get_in_touch.description')
                  </p>
                </div>

                <form action="mailto:recruitment@kalapatec.id" method="get" enctype="text/plain" class="flex flex-col gap-6 form-consultation" id="form-consultation">
                  <div class="row">
                    <div class="col-12 md:col-6">
                      <input
                        type="text"
                        name="name"
                        class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary"
                        placeholder="Name"
                        required
                      />
                    </div>

                    <div class="col-12 md:col-6">
                      <input
                        type="email"
                        name="email"
                        class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary"
                        placeholder="Email"
                        required
                      />
                    </div>

                    <div class="col-12 md:col-6">
                      <input
                        type="text"
                        name="phone"
                        class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary"
                        placeholder="Phone"
                        required
                      />
                    </div>

                    <div class="col-12 md:col-6">
                      <input
                        type="text"
                        name="subject"
                        class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary"
                        placeholder="Subject"
                        required
                      />
                    </div>

                    <div class="col-12">
                      <textarea
                        name="message"
                        rows="5"
                        class="block w-full px-5 py-3 rounded-md border border-solid border-alpha-light dark:border-alpha-dark text-inherit text-base focus:border-primary"
                        placeholder="Type your message"
                        required
                      ></textarea>
                    </div>

                    <div class="col-12">
                      <div class="w-full text-center">
                        <button
                          type="submit"
                          class="inline-block px-5 py-3 rounded-md text-base bg-primary text-primary-color hover:bg-primary-light-10 dark:hover:bg-primary-dark-10 focus:bg-primary-light-10 dark:focus:bg-primary-dark-10"
                        >
                          @lang('home.get_in_touch.send_message')
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Map section -->
      <section id="map" class="w-full h-[500px] overflow-hidden -mt-[12rem]">
        <object
        
          data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63460.43224703256!2d106.75020874863279!3d-6.227161199999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f39340bbbdf5%3A0xe8d07b1bee98da8a!2sKalapa%20Technology%20HQ!5e0!3m2!1sen!2sid!4v1750058870545!5m2!1sen!2sid"
          class="border-0 w-full h-full"
        ></object>
      </section>
@endsection

@push('js')
<script>
  function openModal(modal) {
    document.getElementById(modal).style.display = 'flex';
    document.body.style.overflow = 'hidden';
  }

  function closeModal(modal) {
    document.getElementById(modal).style.display = 'none';
    document.body.style.overflow = '';
  }

  document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".common-carousel", {
      loop: false,
      slidesPerView: 4,
      spaceBetween: 24,
      centerInsufficientSlides: true,
      navigation: {
        nextEl: ".common-carousel .swiper-button-next",
        prevEl: ".common-carousel .swiper-button-prev",
      },
      breakpoints: {
        1024: { slidesPerView: 4 },
        768: { slidesPerView: 4 },
        0: { slidesPerView: 4 },
      },
    });
    
    const swiper1 = new Swiper('.swiper1', {
        pagination: {
            el: '.swiper1 .swiper-pagination',
            clickable: true,
        },
        loop: true,
        speed: 500,
        autoplay: {
          delay: 1750,
          disableOnInteraction: false,
        },
    });
    const fundamentalSwiper = new Swiper(".fundamental-slider", {
      slidesPerView: "auto",
      spaceBetween: 0,
      loop: true,
      freeMode: true,
      speed: 20000,
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
      },
    });
  });

  function showManagementDetail(image, name, desc) {
    document.getElementById('management-image').src = image;
  }
    const formConsultation = document.querySelector('form#form-consultation');
    formConsultation.addEventListener("submit", function(evt) {
      evt.preventDefault();
      var targetobj = evt.target;
      var actionUrl = targetobj.action;
      var message = targetobj.message.value;
      if (actionUrl && actionUrl != "#" && message) {
        var newBodyMsg = subject = "";
        var name = targetobj.name.value;
        var email = targetobj.email.value;

        if (targetobj.subject.value && targetobj.subject.value.trim().length > 0) {
          subject = targetobj.subject.value;
        }

        if (name.trim().length > 0) {
          newBodyMsg += "Hi! my name is " + name + ".";
        }
        if (email.trim().length > 0) {
          if (newBodyMsg.length > 0) {
            newBodyMsg += " & ";
          }
          newBodyMsg += "my email address is " + email + ".";
        }

        if (newBodyMsg.length > 0) {
          newBodyMsg += "\n\n ";
        }
        newBodyMsg += message;
        window.open(actionUrl + "?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(newBodyMsg));
      }
    });

</script>
@endpush