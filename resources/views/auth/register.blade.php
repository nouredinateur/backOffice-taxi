@extends('layouts.auth')

@section('auth')
    
<div class="login-signin">
    <div class="mb-20">
        <h3>Sign up</h3>
        <div class="text-muted font-weight-bold">Enter your details to register:</div>
    </div>
    <form action="{{ route('register') }}"  method="post" class="form" id="kt_login_signup_form">
        @csrf
        <div class="form-group mb-5">
            <input class="form-control h-auto form-control-solid py-4 px-8" value="{{ old('name') }}" type="text"
                   placeholder="Fullname" name="name"/>
        </div>
                @error('name')
                    <div class="text-danger p-2">
                        {{ $message }}
                    </div>
                @enderror
        <div class="form-group mb-5">
            <input class="form-control h-auto form-control-solid py-4 px-8" value="{{ old('email') }}" type="text"
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

        <div class="form-group mb-5 text-left">
            <div class="checkbox-inline">
                <label class="checkbox m-0">
                    <input type="checkbox" name="agree"/>
                    <span></span>I Agree the
                    <a href="#" class="font-weight-bold ml-1">terms and conditions</a>.</label>
            </div>
            <div class="form-text text-muted text-center"></div>
        </div>
        <div class="form-group d-flex flex-wrap flex-center mt-10">
            <button type="submit" 
                    class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Sign Up
            </button>
            <button id="kt_login_signup_cancel"
                    class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel
            </button>
        </div>
    </form>
    <div class="mt-10">
        <span class="opacity-70 mr-4">Already have an account?</span>
        <a href="/login "
           class="text-muted text-hover-primary font-weight-bold">Sign In!</a>
    </div>
</div>

<!--end::Login Sign up form-->

@endsection
