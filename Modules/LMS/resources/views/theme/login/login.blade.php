@php
    $settings = [
        'components' => [
            'inner-header-top' => '',
        ],
    ];
@endphp

<x-auth-layout class="home-online-education" :data="$settings">
    <div class="flex items-center min-w-full min-h-screen">
        <div class="hidden w-full h-full min-h-screen p-3 grow lg:w-1/2 bg-primary-50 lg:flex-center">
            <img data-src="{{ asset('lms/frontend/assets/images/auth/auth-loti.svg') }}" alt="loti">
        </div>
        <div class="flex-col w-full h-full min-h-screen px-3 pt-32 pb-12 grow lg:w-1/2 lg:p-3 flex-center">
            <h2 class="area-title">{{ translate('Sign In') }}!</h2>
            <p class="max-w-screen-sm mx-auto mt-5 text-center area-description">
                {{ translate('Discover, learn, and thrive with us. Experience a smooth and rewarding educational adventure. Let\'s get started') }}!
            </p>

            <div class="flex-wrap gap-2 mt-10 dashkit-tab flex-center" id="userRegisterTab">
                <button type="button" aria-label="Login tab for Student"
                    class="dashkit-tab-btn login-credentials btn b-light btn-primary-light btn-lg h-11 !rounded-full text-[14px] sm:text-[16px] md:text-[18px] [&.active]:bg-primary [&.active]:text-white active"
                    id="asStudent">
                    {{ translate('Student') }}
                </button>
                <button type="button" aria-label="Login tab for Instructor"
                    class="dashkit-tab-btn login-credentials btn b-light btn-primary-light btn-lg h-11 !rounded-full text-[14px] sm:text-[16px] md:text-[18px] [&.active]:bg-primary [&.active]:text-white"
                    id="asStudent">
                    {{ translate('Instructor') }}
                </button>
                <button type="button" aria-label="Login tab for Organization"
                    class="dashkit-tab-btn login-credentials btn b-light btn-primary-light btn-lg h-11 !rounded-full text-[14px] sm:text-[16px] md:text-[18px] [&.active]:bg-primary [&.active]:text-white"
                    id="asStudent">
                    {{ translate('Organization') }}
                </button>
                <button type="button" aria-label="Login tab for Admin"
                    class="dashkit-tab-btn btn b-light btn-primary-light btn-lg h-11 !rounded-full text-[14px] sm:text-[16px] md:text-[18px] [&.active]:bg-primary [&.active]:text-white"
                    id="admin">
                    {{ translate('Admin') }}
                </button>
            </div>

            <div class="dashkit-tab-content w-full max-w-screen-sm *:hidden" id="userRegisterTabContent">
                <div class="dashkit-tab-pane !block" data-tab="asStudent">
                    <x-theme::form.login-form />
                </div>
                <!-- JOIN AS STUDENT -->
                <div class="dashkit-tab-pane" data-tab="admin">
                    <form action="{{ route('admin.login') }}" class="w-full max-w-screen-sm mt-10 form" method="POST">
                        @csrf
                        <div class="grid grid-cols-2 gap-x-3 gap-y-5">
                            <div class="col-span-full">
                                <div class="relative">
                                    <input type="email" name="email" id="admin_email"
                                        class="rounded-full form-input peer" placeholder="" />
                                    <label for="admin_email"
                                        class="form-label floating-form-label">{{ translate('Email') }} <span
                                            class="text-danger">*</span></label>
                                </div>
                                <span class="error-text content_err"></span>
                            </div>
                            <div class="col-span-full">
                                <div class="relative">
                                    <input type="password" name="password" id="admin_password"
                                        class="rounded-full form-input peer" placeholder="" />
                                    <label for="admin_password"
                                        class="form-label floating-form-label">{{ translate('Password') }} <span
                                            class="text-danger">*</span></label>
                                    <!-- type toggler -->
                                    <label
                                        class="absolute -translate-y-1/2 rounded-full cursor-pointer size-8 flex-center hover:bg-gray-200 focus:bg-gray-200 top-1/2 right-2 rtl:right-auto rtl:left-2">
                                        <input type="checkbox" class="inputTypeToggle peer/it" hidden>
                                        <i
                                            class="ri-eye-off-line text-gray-500 dark:text-dark-text peer-checked/it:before:content-['\ecb5']"></i>
                                    </label>
                                </div>
                                <span class="error-text content_err"></span>
                            </div>

                            <div class="col-span-full">
                                <button type="submit" aria-label="Login"
                                    class="btn b-solid btn-secondary-solid !text-heading dark:text-white btn-xl !rounded-full font-bold w-full h-12">
                                    {{ translate('Log in') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div
                class="relative inset-0 w-full max-w-screen-sm py-6 font-normal flex-center h-max text-heading dark:text-white before:absolute before:w-full before:h-px before:bg-border">
                <span class="relative z-10 px-5 text-sm bg-white">{{ translate('OR') }}</span>
            </div>
            <div class="text-heading">
                {{ translate('Don\'t have an account yet') }}?
                <a href="{{ route('register.page') }}" class="text-primary hover:underline"
                    aria-label="Sign up page">{{ translate('Sign up') }}</a>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            var loginPortals = $('.login-credentials');

            loginPortals.each(function() {
                let loginPortal = $(this);

                if (loginPortal.hasClass('active')) {
                    let email = loginPortal.data('email');
                    let password = loginPortal.data('password');
                    $("#email").val(email);
                    $("#password").val(password);
                }
            });

            $(document).on('click', '.login-credentials', function() {
                let email = $(this).data('email');
                let password = $(this).data('password');
                $('.dashkit-tab-btn').removeClass('active');
                $(this).addClass('active');

                $("#email").val(email)


                ;
                $("#password").val(password);
            })
        </script>
    @endpush
</x-auth-layout>
