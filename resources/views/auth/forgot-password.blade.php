@extends('layouts.guest')

@section('title', 'Forgot Password |')

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Forgot Password -->

            <div class="card">
            <div class="card-body">
                <h4 class="mb-2">Forgot Password?</h4>
                <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
                <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" class="form-control" name="email" value="{{old('email')}}" required autofocus />
                    </div>
                    <button class="btn btn-primary d-grid w-100">{{ __('Email Password Reset Link') }}</button>
                </form>
                <div class="text-center">
                <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                    Back to login
                </a>
                </div>
            </div>
            </div>
            <!-- /Forgot Password -->
        </div>
        </div>
    </div>

    <!-- / Content -->
@endsection
