@extends('adminlte::page')
@section('title', 'Edit User')
@section('content_header')
    <h1 class="m-0 text-dark">Edit User</h1>
@stop
@section('content')
    <form action="/experience/{{ $experience->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <input type="text" name="profesi" id="profesi" class="form-control" placeholder="profesi"
                                value="{{ $experience->profesi }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="perusahaan" id="perusahaan" class="form-control"
                                placeholder="perusahaan" value="{{ $experience->perusahaan }}" required>
                        </div>

                        <div class="form-group">
                            <textarea name="deskripsi" id="deskripsi" rows="6" class="form-control" placeholder="Post Content" required>{{ $experience->deskripsi }}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" name="mulai" id="mulai" class="form-control" placeholder="mulai"
                                value="{{ $experience->mulai }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="selesai" id="selesai" class="form-control" placeholder="mulai"
                                value="{{ $experience->selesai }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="jenis" id="jenis" class="form-control" placeholder="selesai"
                                value="{{ $experience->jenis }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="status" id="status" class="form-control" placeholder="status"
                                value="{{ $experience->status }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="urutan" id="urutan" class="form-control" placeholder="urutan"
                                value="{{ $experience->urutan }}" required>
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
