@extends('adminlte::page')
@section('title', 'Edit User')
@section('content_header')
    <h1 class="m-0 text-dark">Edit User</h1>
@stop
@section('content')
    <form action="/portofolio/{{ $Portofolio->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="nama"
                                value="{{ $Portofolio->nama }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="link" id="link" class="form-control" placeholder="link"
                                value="{{ $Portofolio->link }}" required>
                        </div>

                        <div class="form-group">
                            <textarea name="deskripsi" id="deskripsi" rows="6" class="form-control" placeholder="Post Content" required>{{ $Portofolio->deskripsi }}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" name="status" id="status" class="form-control" placeholder="status"
                                value="{{ $Portofolio->status }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="urutan" id="urutan" class="form-control" placeholder="urutan"
                                value="{{ $Portofolio->urutan }}" required>
                        </div>

                        <div class="form-group">
                            <input type="file" name="file" id="file" accept="image/*" class="form-control">
                        </div>

                        <img src="{{ asset('storage/images/' . $Portofolio->gambar) }}" class="img-fluid img-thumbnail"
                            width="150">

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
