@extends('dashboard.layout')
@section('konten')
    <p class="card-title">Halaman</p>
    <div class="pb-3"><a href="{{ route('halaman.create') }}" class="btn btn-primary">+ Tambah halaman</a></div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">No.</th>
                    <th>Judul</th>
                    <th class="col-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>
                            <a href="{{ route('halaman.edit', $item->id) }}" class="btn btn-info">Edit</a>
                            <form onsubmit="return confirm('Yakin hapus data ini?')" class="d-inline" action="{{ route('halaman.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
