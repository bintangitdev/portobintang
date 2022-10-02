@extends('adminlte::page')
@section('title', 'Edit User')
@section('content_header')
    <h1 class="m-0 text-dark">Edit User</h1>
@stop
@section('content')
<form action="/education/{{ $education->id }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

          <div class="form-group">
            <input type="text" name="instansi" id="instansi" class="form-control" placeholder="instansi" value="{{ $education->instansi }}" required>
          </div>

          <div class="form-group">
            <input type="text" name="jurusan" id="jurusan" class="form-control" placeholder="jurusan" value="{{ $education->jurusan }}" required>
          </div>

          <div class="form-group">
            <textarea name="deskripsi" id="deskripsi" rows="6" class="form-control" placeholder="Post Content" required>{{ $education->deskripsi }}</textarea>
          </div>

          <div class="form-group">
            <input type="text" name="nilai" id="nilai" class="form-control" placeholder="nilai" value="{{ $education->nilai }}" required>
          </div>

          <div class="form-group">
            <input type="text" name="mulai" id="mulai" class="form-control" placeholder="mulai" value="{{ $education->mulai }}" required>
          </div>

          <div class="form-group">
            <input type="text" name="selesai" id="selesai" class="form-control" placeholder="selesai" value="{{ $education->selesai }}" required>
          </div>

          <div class="form-group">
            <input type="text" name="status" id="status" class="form-control" placeholder="status" value="{{ $education->status }}" required>
          </div>

          <div class="form-group">
            <input type="text" name="urutan" id="urutan" class="form-control" placeholder="urutan" value="{{ $education->urutan }}" required>
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
