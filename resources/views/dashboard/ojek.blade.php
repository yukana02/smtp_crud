@extends('layouts.log-reg')
@section('titel','Pesan ojek')
@section('content')
    
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">pesan </h5>
                    <p class="text-center small">Enter your order </p>
                    </div>
                    <form  method="POST" action="{{route ('hitung')}}" class="row g-3 needs-validation" novalidate>
                        @csrf
                        
                    <div class="col-12">
                        <label for="order " class="form-label">input in KM</label>
                        <input type="order" name="order" class="form-control" id="yourorder" value="{{old ('order')}}" required>
                        <div class="invalid-feedback">Please enter your Km.</div>
                    </div>
                   
                    <div class="col-12">
                        
                        <button class="btn btn-primary w-100" type="submit" name="submit">PESAN</button>
                    
                    </form>

                    <div class="col-12 mt-3">
                        <a href="{{route ('logout')}}" class="btn btn-primary col-lg-12 col-12 col-md-12 mt-3">logout</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>
</div>
@endsection
