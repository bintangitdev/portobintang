@extends('adminlte::page')
@section('title', 'List User')
@section('content_header')
    <h1 class="m-0 text-dark">List User</h1>
@stop

@section('content')

    <!-- @if (session('message'))
    <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
                      <strong>{{ session('message') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
    @endif -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('about.create') }}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Image</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($abouts as $key => $a)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $a->nama }}</td>
                                    <td>{{ $a->alamat }}</td>
                                    <td><a href="about/{{ $a->id }}">
                                            <img src="{{ asset('storage\app\public\images' . $a->gambar) }}" width="50"
                                                height="60">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('about.edit', $a) }}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>
                                        <a href="{{ route('about.destroy', $a) }}"
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush
