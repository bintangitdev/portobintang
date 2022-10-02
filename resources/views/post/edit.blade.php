@extends('adminlte::page')
@section('title', 'Edit User')
@section('content_header')
    <h1 class="m-0 text-dark">Edit User</h1>
@stop
@section('content')
<form action="/post/{{ $post->id }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

          <div class="form-group">
            <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ $post->title }}" required>
          </div>

          <div class="form-group">
            <input type="text" name="category" id="category" class="form-control" placeholder="Category" value="{{ $post->category }}" required>
          </div>

          <div class="form-group">
            <input type="file" name="file" id="file" accept="image/*" class="form-control">
          </div>

          <img src="{{ asset('storage/images/'.$post->image) }}" class="img-fluid img-thumbnail" width="150">

          <div class="form-group">
            <textarea name="content" id="content" rows="6" class="form-control" placeholder="Post Content" required>{{ $post->content }}</textarea>
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
