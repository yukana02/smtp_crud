@extends('layouts.log-reg')
@section('titel','biaya')
@section('content')
    
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-6 pb-4">
                    <h5 class="card-title text-center pb-0 fs-4">pesan </h5>
                    <p class="text-center small">Enter your order </p>
                    </div>
                    {{-- <form  method="POST" action="{{route ('hitung')}}" class="row g-3 needs-validation" novalidate>
                        @csrf
                         --}}
                         <form >
                            <fieldset disabled>
                                <div class="col-12">
                                    <label for="order " class="form-label">Pada Jarak </label>
                                    <input type="order" name="order" class="form-control" id="yourorder" value="{{ $jarak }}" readonly>
                                    <div class="invalid-feedback">Please enter your Km.</div>
                                </div>
                                <div class="col-12">
                                    <label for="order " class="form-label">Jumlah Order User</label>
                                    <input type="order" name="order" class="form-control" id="yourorder" value="{{ $jumlahOrder }}" readonly>
                                    <div class="invalid-feedback">Please enter your Km.</div>
                                </div>
                                <div class="col-12">
                                    <label for="total_bayar" class="form-label">Total Bayar</label>
                                    <input type="text" name="total_bayar" class="form-control" id="yourTotal" value="{{ $totalBiaya }}" readonly>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </fieldset>
                        </form>
                    <div class="col-12 mt-3">
                        <a href="{{route ('back')}}" class="btn btn-primary col-lg-12 col-12 col-md-12 mt-3">back</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
</div>
@endsection
