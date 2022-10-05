@extends('adminlte::page')
@section('title', 'Edit User')
@section('content_header')
    <h1 class="m-0 text-dark">Edit User</h1>
@stop
@section('content')
<form action="/skills/{{ $Skill->id }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

          <div class="form-group">
            <input type="text" name="nama" id="nama" class="form-control" placeholder="nama" value="{{ $Skill->nama }}" required>
          </div>

          <div class="form-group">
            <input type="text" name="jenis" id="jenis" class="form-control" placeholder="jenis" value="{{ $Skill->jenis }}" required>
          </div>

          <div class="form-group">
            <input type="file" name="file" id="file" accept="image/*" class="form-control">
          </div>

          <img src="{{ asset('storage/images/'.$Skill->gambar) }}" class="img-fluid img-thumbnail" width="150">

          <div class="form-group">
            <input type="text" name="urutan" id="urutan" class="form-control" placeholder="urutan" value="{{ $Skill->urutan }}" required>
          </div>

          <div class="form-group">
            <input type="text" name="status" id="status" class="form-control" placeholder="status" value="{{ $Skill->status }}" required>
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
