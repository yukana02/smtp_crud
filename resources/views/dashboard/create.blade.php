@extends('layouts.dash')
@section('title','Buat Post')
@section('content')

<div class="container" >
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-sm-12 card shadow">
            <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-12 input-group mt-3">
                        <label for="file" class=" inputGroupFile01"></label>
                        <input type="file" id="inputGroupFile01" class="form-control" name="images" accept="image/*">
                    </div>
                    <div class="col-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ old('title')}}" required>
                        <div class="invalid-feedback">Please enter your title!</div> 
                    </div>
                    <div class="col-12">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" cols="30" rows="10"></textarea>
                        <div class="invalid-feedback">Please enter your content</div> 
                    </div>
                    
                </div>
                <button class="btn btn-primary w-100 mt-2 mb-5" type="submit">Simpan</button>
            </form>            
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
{{-- <script>
    $(document).ready(function () {
        // Fungsi untuk mengonversi judul menjadi slug
        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Ganti spasi dengan tanda "-"
                .replace(/[^\w\-]+/g, '')       // Hapus karakter non-word dan non-hyphen
                .replace(/\-\-+/g, '-')         // Ganti dua atau lebih tanda "-" berturut-turut dengan satu tanda "-"
                .replace(/^-+/, '')             // Hapus tanda "-" di awal teks
                .replace(/-+$/, '');            // Hapus tanda "-" di akhir teks
        }

        // Mengamati perubahan pada field judul
        $('#title').on('input', function () {
            var title = $(this).val();
            var slug = slugify(title);

            // Mengisi nilai field slug
            $('#slug').val(slug);
        });
    });
</script> --}}

@endsection

