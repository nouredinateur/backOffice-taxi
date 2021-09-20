@extends('layouts.auth')

@section('auth')

        <div class="">
            <div class="mb-20">
                <h3>Forgotten Password ?</h3>
                <div class="text-muted font-weight-bold">Enter your email to reset your password</div>
            </div>
            <form class="form" method="POST" action="{{ route('password.confirm') }}" id="kt_login_forgot_form">
                @csrf
                <div class="form-group mb-10">
                    <input class="form-control form-control-solid h-auto py-4 px-8" type="text"
                           placeholder="Password" type="password" name="password" :value="old('password')"  autocomplete="off"/>
                </div>
                <div class="form-group d-flex flex-wrap flex-center mt-10">
                    <button type="submit" id="kt_login_forgot_submit"
                            class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Request
                    </button>
                    <button id="kt_login_forgot_cancel"
                            class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel
                    </button>
                </div>
            </form>
        </div>
    
@endsection