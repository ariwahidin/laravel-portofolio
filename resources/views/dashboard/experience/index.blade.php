@extends('dashboard.layout')
@section('konten')
    <p class="card-title">Experience</p>
    <div class="pb-3"><a href="{{ route('experience.create') }}" class="btn btn-primary">+ Tambah Experience</a></div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-1">No.</th>
                    <th>Posisi</th>
                    <th>Nama Perusahaan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
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
                        <td>{{ $item->info1 }}</td>
                        <td>{{ $item->tgl_mulai_indo }}</td>
                        <td>{{ $item->tgl_akhir_indo }}</td>
                        <td>
                            <a href="{{ route('experience.edit', $item->id) }}" class="btn btn-info">Edit</a>
                            <form onsubmit="return confirm('Yakin hapus data ini?')" class="d-inline" action="{{ route('experience.destroy', $item->id) }}" method="POST">
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
