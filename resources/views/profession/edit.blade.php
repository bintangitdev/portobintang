@extends('adminlte::page')
@section('title', 'Edit User')
@section('content_header')
    <h1 class="m-0 text-dark">Edit User</h1>
@stop
@section('content')
    <form action="/profession/{{ $profession->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <input type="text" name="profesi" id="profesi" class="form-control" placeholder="profesi"
                                value="{{ $profession->profesi }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="status" id="status" class="form-control" placeholder="status"
                                value="{{ $profession->status }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" name="urutan" id="urutan" class="form-control" placeholder="urutan"
                                value="{{ $profession->urutan }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
