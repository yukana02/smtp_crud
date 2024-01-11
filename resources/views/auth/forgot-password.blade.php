{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.log-reg')

@section('title','Reset Password')

@section('content')
 {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
    
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="card mb-3">
            <div class="card-body">
                <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Forgot Your Password?</h5>
                <p class="text-left small">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                </div>
                <form  method="POST" action="{{route ('password.email')}}" class="row g-3 needs-validation" novalidate>
                    @csrf
                <div class="col-12">
                    <label for="yourUsername" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="yourUsername" value="{{old ('email')}}" required>
                    <div class="invalid-feedback">Please enter your email.</div>
                    {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                </div>
                    <button class="btn btn-primary w-100 flex item-center" type="submit" name="submit">Send Link</button>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(Session::has('email'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: '{{ Session::get("email") }}',
    });
</script>
@endif
    @if(Session::has('status'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ Session::get("status") }}',
        });
    </script>
@endif

   
    
    @endsection
