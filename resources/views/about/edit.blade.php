@extends('adminlte::page')
@section('title', 'Edit User')
@section('content_header')
    <h1 class="m-0 text-dark">Edit User</h1>
@stop
@section('content')
    <form action="/about/{{ $about->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="nama"
                                value="{{ $about->nama }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="alamat"
                                value="{{ $about->alamat }}" required>
                        </div>

                        <div class="form-group">
                            <input type="file" name="file" id="file" accept="image/*" class="form-control">
                        </div>

                        <img src="{{ asset('public/images/' . $about->gambar) }}" class="img-fluid img-thumbnail"
                            width="150">

                        <div class="form-group">
                            <textarea name="deskripsi" id="deskripsi" rows="6" class="form-control" placeholder="Post Content" required>{{ $about->deskripsi }}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" name="email" id="email" class="form-control" placeholder="email"
                                value="{{ $about->email }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="telp" id="telp" class="form-control" placeholder="telp"
                                value="{{ $about->telp }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="urutan" id="urutan" class="form-control" placeholder="urutan"
                                value="{{ $about->urutan }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
@endsection
