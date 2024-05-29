@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('penulis') }}
                    </div>
                    <div class="float-end">
                        <form action="{{ route('penulis.view-pdf') }}" method="post">
                            @csrf
                            <a href="{{ route('penulis.create') }}" class="btn btn-sm btn-outline-primary">Tambah
                                Data</a>
                            <button type="submit" class="btn btn-sm btn-outline-success">Export PDF</button>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penulis</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($penulis as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->email}}</td>
                                    </td>
                                    <td>
                                        <form action="{{ route('penulis.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('penulis.show', $data->id) }}"
                                                class="btn btn-sm btn-outline-dark">Show</a>
                                            <a href="{{ route('penulis.edit', $data->id) }}"
                                                class="btn btn-sm btn-outline-success">Edit</a>
                                            <button type="submit" onsubmit="return confirm('Are You Sure ?');"
                                                class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Data data belum Tersedia.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
