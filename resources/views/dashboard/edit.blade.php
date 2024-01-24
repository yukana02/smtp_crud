@extends('layouts.dash')
@section('title','Edit Post')
@section('content')
    
<div class="container" >
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-sm-12 card shadow">
            <form method="POST" action="{{ route('prosesedit',$data->id) }}" enctype="multipart/form-data">
                
                @csrf
                @method('patch')
                <div class="row mb-3">
                    <div class="col-12 input-group mt-3">
                        <label for="file" class=" inputGroupFile01"></label>
                        <input type="file" id="inputGroupFile01" class="form-control" name="images" accept="image/*">
                        <input type="hidden" name="current_image" class="form-control" name="images" value="{{ $data->image }}">
                    </div>
                    @if ($data->image)
                        <div class="col-12 mt-3">
                            <img src="{{ asset('/storage/images/'.$data->image) }}" class="rounded" style="width: 300px" alt="Image">
                        </div>
                    @endif
                    <div class="col-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ old('title',$data->title)}}" required>
                        <div class="invalid-feedback">Please enter your title!</div> 
                    </div>
                    <div class="col-12">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" id="content" cols="30" rows="10"> {{ old ('content',$data->content) }}</textarea>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            title: "Success",
            text: "{{ session('success') }}",
            icon: "success"
        });
    </script>
    @endif
    
@endsection