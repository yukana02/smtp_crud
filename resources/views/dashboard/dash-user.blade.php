@extends('layouts.dash')
@section('title','Dashboard')
@section('content')

<div class="container" style="min-height: 550px;" >
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-sm-12 card shadow">
            <a href="{{route ('createdata')}}" class="btn btn-primary col-lg-3 col-12 col-md-6 mt-3">Tambah Data</a>
            <table class="table col-lg-12 col-md-12 col-sm-12" id="dataTable"><br>
                <div class=" mb-3 input-group col-form-label">
                    <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        {{-- <a href="{{route ('cari')}}" class="btn btn-primary ">Cari Judul</a> --}}
                    </div>
                </div>
                <thead>
                    <tr class="text-center">
                        <th class="col-2">No</th>
                        <th class="col-8">Title</th>
                        <th class="col-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $data2)
                      <tr>
                            <td class="text-center">{{$no++}}</td>
                          {{-- <td class="text-center">
                              <img src="{{ asset('/storage/Crud/'.$data2->image) }}" class="rounded" style="width: 150px">
                          </td> --}}
                          <td >{{ $data2->title }}</td>
                          <td class="text-center " style="text-align: center;">
                            <a href="" class="btn btn-sm btn-dark p-1 col-lg-5 col-md-12 col-12 mb-2">show</a>
                            <a href="" class="btn btn-sm btn-primary p-1 col-lg-5 col-md-12 col-12">Edit</a>
                              {{-- <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $data2->id) }}" method="POST">
                                  <a href="{{ route('posts.show', $data2->id) }}" class="btn btn-sm btn-dark">show</a>
                                  <a href="{{ route('posts.edit', $data2->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                              </form> --}}
                          </td>
                      </tr>
                    @empty
                        {{-- <div class="alert alert-danger">
                            Data Post belum Tersedia.
                        </div> --}}
                    @endforelse
                    
                  </tbody>
            </table>
              {{-- {{ $data->links() }} --}}
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
            
                    @php
                        $start = max(1, $data->currentPage() - 1);
                        $end = min($data->lastPage(), $start + 2);
                    @endphp
            
                    @if($start > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $data->url(1) }}">1</a>
                        </li>
                        @if($start > 2)
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                        @endif
                    @endif
            
                    @for ($i = $start; $i <= $end; $i++)
                        <li class="page-item {{ $data->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
            
                    @if($end < $data->lastPage())
                        @if($end < $data->lastPage() - 1)
                            <li class="page-item disabled">
                                <span class="page-link">...</span>
                            </li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{ $data->url($data->lastPage()) }}">{{ $data->lastPage() }}</a>
                        </li>
                    @endif
            
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
        </div>
    </div>
</div>
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