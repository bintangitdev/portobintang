@extends('adminlte::page')
@section('title', 'Tambah User')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Skills</h1>
@stop
@section('content')
<form action="/skills" method="POST" enctype="multipart/form-data">
    @csrf
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

          <div class="form-group">
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" value="{{ old('nama') }}">
            @error('nama')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <input type="text" name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror" placeholder="jenis" value="{{ old('jenis') }}">
            @error('jenis')
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
            <input type="file" name="file" id="file" accept="image/*" class="form-control @error('file') is-invalid @enderror">
            @error('file')
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
          <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
