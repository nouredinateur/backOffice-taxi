@extends('layouts.auth')

@section('auth')

<div class="login-signin">
    <div class="mb-20">
        <h3>Password reset</h3>
        <div class="text-muted font-weight-bold">Enter your your password to reset your account:</div>
    </div>
    <form action="{{ route('password.update') }}" method="POST" class="form" >
        @csrf
        <div class="form-group mb-5">
            <input type="email" name="email" class="form-control h-auto form-control-solid py-4 px-8" placeholder="Email" >
        </div>
        @error('email')
            <div class="text-danger p-2">
                {{ $message }}
            </div>
        @enderror
        <div class="form-group mb-5">
           <input type="password" name="password" class="form-control h-auto form-control-solid py-4 px-8" placeholder="Password" >
        </div>
        @error('password')
            <div class="text-danger p-2">
                {{ $message }}
            </div>
        @enderror
        <div class="form-group mb-5">
            <input type="password" name="password_confirmation" class="form-control h-auto form-control-solid py-4 px-8" placeholder="Confirm Password" >
        </div>
        
        <button type="submit"
                class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Reset
        </button>
    </form>
</div>

@endsection