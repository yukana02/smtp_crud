{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('layouts.log-reg')

@section('title','Register')

@section('content')
 <x-auth-session-status class="mb-4" :status="session('status')" />
    
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="card mb-3">
            <div class="card-body">
                <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Register</h5>
                <p class="text-center small">Enter your email & password</p>
                </div>
                <form  method="POST" action="{{route ('register')}}" class="row g-3 needs-validation" novalidate>
                    @csrf
                <div class="col-12">
                    <label for="yourUsername" class="form-label">name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{old ('name')}}" required>
                    <div class="invalid-feedback">Please enter your name.</div>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{old ('email')}}" required>
                    <div class="invalid-feedback">Please enter your email.</div>
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="pasword"  required>
                    <div class="invalid-feedback">Please enter your password!</div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="col-12">
                    <label for="password_confirmation" class="form-label">Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"  required>
                    <div class="invalid-feedback">Please enter your password!</div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="col-12">
                    
                    <button class="btn btn-primary w-100" type="submit" name="submit">Register</button>
                    @if (Route::has('login'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    @endif
                </div>
                </form>
            </div>
            </div>
            <div class="credits">
            Designed by <a href="#">Yuda J.P.</a>
            </div>
        </div>
        </div>
    </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('failed'))
    <script>
        Swal.fire({
            title: "Ada Yang Salah",
            text: "{{ session('failed') }}",
            icon: "error"
        });
    </script>
    @endif
    @endsection
