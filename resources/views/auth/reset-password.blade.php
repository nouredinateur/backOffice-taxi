{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}



<head>
    <base href="../../../../">
    <meta charset="utf-8"/>
    <title>Taxi-M</title>
    <meta name="description" content="Login page"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="canonical" href="https://keenthemes.com/metronic"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('assets/login-4.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('assets/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/prismjs.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('assets/base/light.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/menu/light.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/brand/dark.css') }}" rel="stylesheet" type="text/css"/>
    <link href=" {{ asset('assets/aside/dark.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico"/>

</head>
<body id="kt_body"
  class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
<!--begin::Login-->
<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
    <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
         style="background-image: url({{ asset('assets/media/bg-3.jpg') }});">
        <div class="login-form text-center p-7 position-relative overflow-hidden">
            <!--begin::Login Header-->
            <div class="d-flex flex-center mb-15">
                <a href="#">
                    <img src="{{ asset('assets/media/logo-letter-13.png' )}}" class="max-h-75px" alt=""/>
                </a>
            </div>
            <!--end::Login Header-->
            <!--begin::Login Sign in form-->
            <div class="login-signin">
                <div class="mb-20">
                    <h3>Sign In To Admin</h3>
                    <div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
                </div>
                <form action="{{ route('password.update') }}" method="POST" class="form" >
                    @csrf
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                               placeholder="Email" name="email" autocomplete="off"/>
                    </div>
                    @error('email')
                        <div class="text-danger p-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                               placeholder="Password" name="password"/>
                    </div>
                    @error('password')
                        <div class="text-danger p-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                               placeholder="Confirm Password" name="password_confirmation"/>
                    </div>
                    @error('password')
                        <div class="text-danger p-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                        <div class="checkbox-inline">
                            <label class="checkbox m-0 text-muted">
                                <input type="checkbox" name="remember"/>
                                <span></span>Remember me</label>
                        </div>
                        <a href="{{ route('password.request') }}" id="kt_login_forgot" class="text-muted text-hover-primary">Forget
                            Password ?</a>
                    </div>
                    <button type="submit"
                            class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign In
                    </button>
                </form>
                {{-- <div class="mt-10">
                    <span class="opacity-70 mr-4">Don't have an account yet?</span>
                    <a href="javascript:;" id="kt_login_signup"
                       class="text-muted text-hover-primary font-weight-bold">Sign Up!</a>
                </div> --}}
            </div>
            <!--end::Login Sign in form-->
            <!--begin::Login Sign up form-->
            <div class="login-signup">
                <div class="mb-20">
                    <h3>Sign Up</h3>
                    <div class="text-muted font-weight-bold">Enter your details to create your account</div>
                </div>
                
            </div>
            <!--end::Login Sign up form-->
            <!--begin::Login forgot password form-->
            <div class="login-forgot">
                <div class="mb-20">
                    <h3>Forgotten Password ?</h3>
                    <div class="text-muted font-weight-bold">Enter your email to reset your password</div>
                </div>
                <form class="form" id="kt_login_forgot_form">
                    <div class="form-group mb-10">
                        <input class="form-control form-control-solid h-auto py-4 px-8" type="text"
                               placeholder="Email" name="email" autocomplete="off"/>
                    </div>
                    <div class="form-group d-flex flex-wrap flex-center mt-10">
                        <button id="kt_login_forgot_submit"
                                class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Request
                        </button>
                        <button id="kt_login_forgot_cancel"
                                class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel
                        </button>
                    </div>
                </form>
            </div>
            <!--end::Login forgot password form-->
        </div>
    </div>
</div>
<!--end::Login-->
</div>
<!--end::Main-->
