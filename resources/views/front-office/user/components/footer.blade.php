    <footer class="bg-primary-dark-2 text-white">
      <div class="container py-20 lg:py-[100px]">
        <div class="row">
          <div class="col-12 order-first lg:col-4">
            <div class="w-full">
              <a href="." class="inline-block mb-5">
                <img src="{{ asset('assets/img/logo/logo-kalapatec.png')}}" style="width: 20%;" alt="">
              </a>

              <p class="mb-8 text-body-dark-11">
                @lang('home.footer.description')
              </p>

              <div class="-mx-3 flex items-center">
                <a
                  href="https://facebook.com/kalapatec.id"
                  class="px-3 text-body-dark-11 hover:text-primary text-[22px] leading-none"
                >
                  <i class="lni lni-facebook-fill"></i>
                </a>

                <a
                  href="https://www.instagram.com/kalapatech.id/"
                  class="px-3 text-body-dark-11 hover:text-primary text-[22px] leading-none"
                >
                  <i class="lni lni-instagram-original"></i>
                </a>

                <a
                  href="https://www.linkedin.com/company/palapamitrasolusi"
                  class="px-3 text-body-dark-11 hover:text-primary text-[22px] leading-none"
                >
                  <i class="lni lni-linkedin-original"></i>
                </a>

                <a
                  href="https://www.tiktok.com/@kalapatech"
                  class="px-3 text-body-dark-11 hover:text-primary text-[22px] leading-none"
                >
                  <i class="lni lni-tiktok"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-6 lg:col-2">
            <div class="w-full">
              <h4 class="mb-9 text-lg font-semibold text-inherit">@lang('home.footer.navigation.services')</h4>
              <ul>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="mb-3 inline-block text-body-dark-11 hover:text-primary"
                    >BPO</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="mb-3 inline-block text-body-dark-11 hover:text-primary"
                    >MPO</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="mb-3 inline-block text-body-dark-11 hover:text-primary"
                    >WABA API</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="mb-3 inline-block text-body-dark-11 hover:text-primary"
                    >Telesystem</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="col-6 lg:col-2">
            <div class="w-full">
              <h4 class="mb-9 text-lg font-semibold text-inherit">@lang('home.footer.navigation.support.title')</h4>
              <ul>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="mb-3 inline-block text-body-dark-11 hover:text-primary"
                    >@lang('home.footer.navigation.support.item.1')</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="mb-3 inline-block text-body-dark-11 hover:text-primary"
                    >@lang('home.footer.navigation.support.item.2')</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:void(0)"
                    class="mb-3 inline-block text-body-dark-11 hover:text-primary"
                    >API</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="col-12 -order-3 lg:col-4 lg:order-1">
            <div class="w-full">
              <h4 class="mb-9 text-lg font-semibold text-inherit">@lang('home.footer.navigation.subscribe.title')</h4>

              <p class="text-body-dark-11">
                @lang('home.footer.navigation.subscribe.description')
              </p>

              <form action="#" method="POST" target="_blank" class="mt-8 flex">
                <input
                  type="email"
                  name="email"
                  class="inline-block flex-grow px-5 py-3 rounded-md rounded-e-none border border-solid border-alpha-dark text-inherit text-base focus:border-primary"
                  placeholder="Email address"
                  required
                />

                <button
                  type="submit"
                  class="inline-block py-3 w-[50px] rounded-md rounded-s-none text-center text-lg/none bg-primary text-primary-color hover:bg-primary-light-10 dark:hover:bg-primary-dark-10 focus:bg-primary-light-10 dark:focus:bg-primary-dark-10"
                >
                  <i class="lni lni-envelope"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full border-t border-solid border-alpha-dark"></div>
      <div class="container py-8">
        <div class="flex flex-wrap">
          <div class="w-full md:w-1/2">
            <div class="my-1">
              <div
                class="flex flex-wrap justify-center gap-x-3 md:justify-start"
              >
                <a
                  href="javascript:void(0)"
                  class="text-body-dark-11 hover:text-body-dark-12"
                  >Privacy Policy</a
                >
                <a
                  href="javascript:void(0)"
                  class="text-body-dark-11 hover:text-body-dark-12"
                  >Legal Notice</a
                >
                <a
                  href="javascript:void(0)"
                  class="text-body-dark-11 hover:text-body-dark-12"
                  >Terms of Service</a
                >
              </div>
            </div>
          </div>

          <div class="w-full md:w-1/2">
            <div class="my-1 flex justify-center md:justify-end">
              <p class="text-body-dark-11">
                &#169; 2025 Kalapa Technology Inc. All rights reserved.
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>