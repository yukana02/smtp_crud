@extends('layouts.log-reg')

@section('title','Reset Password')

@section('content')

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf --}}

        <!-- Password Reset Token -->
        {{-- <input type="hidden" name="token" value="{{ $request->route('token') }}"> --}}

        <!-- Email Address -->
        {{-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
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
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div> --}}
         {{-- </form> --}}
{{-- </x-guest-layout> --}}


        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="card mb-3">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Reset Password Your Account</h5>
                        <p class="text-center small">Enter your new password </p>
                        </div>
                        <form  method="POST" action="{{route ('password.store')}}" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{old ('email', $request->email)}}" required autofocus autocomplete="username">
                            <div class="invalid-feedback">Please enter your email.</div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required autocomplete="new-passwor">
                            <div class="invalid-feedback">Please enter your password!</div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="col-12">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required autocomplete="new-passwor">
                            <div class="invalid-feedback">Please enter your password!</div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit" name="submit">Reset Password</button>
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
@endsection