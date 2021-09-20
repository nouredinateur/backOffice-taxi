@extends('layouts.auth')

@section('auth')
    
<div class="login-signin">
    <div class="mb-20">
        <h3>Sign In</h3>
        <div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
    </div>
    <form action="{{ route('login') }}" method="POST" class="form" >
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
</div>

@endsection