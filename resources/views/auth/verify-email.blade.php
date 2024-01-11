{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}



@extends('layouts.log-reg')

@section('title','Reset Password')

@section('content')
    
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="card mb-3">
            <div class="card-body">
                <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Verify Your Email Now</h5>
                <p class="text-left small">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>
                </div>
                <form  method="POST" action="{{route ('verification.send')}}" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <button class="btn btn-primary w-100 flex item-center" type="submit" name="submit">Send Link</button>
                    @if (Route::has('logout'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Logout?') }}
                    </a>
                    @endif
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(Session::has('status'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            // text: '{{ Session::get("status") }}',
            text: 'Email Verifikasi Sudah Terkirim',
        });
    </script>
@endif

   
    
    @endsection
