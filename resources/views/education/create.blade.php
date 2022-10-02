@extends('adminlte::page')
@section('title', 'Tambah User')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Post</h1>
@stop
@section('content')
<form action="/education" method="POST" enctype="multipart/form-data">
    @csrf
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

          <div class="form-group">
            <input type="text" name="instansi" id="instansi" class="form-control @error('instansi') is-invalid @enderror" placeholder="instansi" value="{{ old('instansi') }}">
            @error('instansi')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" placeholder="jurusan" value="{{ old('jurusan') }}">
            @error('jurusan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="text" name="nilai" id="nilai" class="form-control @error('nilai') is-invalid @enderror" placeholder="nilai" value="{{ old('nilai') }}">
            @error('nilai')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="text" name="mulai" id="mulai" class="form-control @error('mulai') is-invalid @enderror" placeholder="mulai" value="{{ old('mulai') }}">
            @error('mulai')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="text" name="selesai" id="selesai" class="form-control @error('selesai') is-invalid @enderror" placeholder="selesai" value="{{ old('selesai') }}">
            @error('selesai')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <textarea name="deskripsi" id="deskripsi" rows="6" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Post deskripsi">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="text" name="status" id="status" class="form-control @error('status') is-invalid @enderror" placeholder="status" value="{{ old('status') }}">
            @error('status')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="text" name="urutan" id="urutan" class="form-control @error('urutan') is-invalid @enderror" placeholder="urutan" value="{{ old('urutan') }}">
            @error('urutan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
