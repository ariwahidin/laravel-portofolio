@extends('dashboard.layout')
@section('konten')
    <div class="pb-3">
        <a href="{{ route('education.index') }}" class="btn btn-secondary">
            << Kembali</a>
    </div>
    <form action="{{ route('education.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Nama Instansi</label>
            <input type="text" class="form-control form-control-sm" name="judul" id="judul" aria-describedby="helpId"
                placeholder="Nama Instansi Pendidikan" value="{{ Session::get('judul') }}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Prodi</label>
            <input type="text" class="form-control" name="info2" id="info2" aria-describedby="helpId"
                placeholder="Program Studi" value="{{ Session::get('info2') }}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">IPK/Nilai Akhir</label>
            <input type="text" class="form-control" name="info3" id="info3" aria-describedby="helpId"
                placeholder="IPK/NIlai Akhir" value="{{ Session::get('info3') }}">
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tahun Mulai</div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" name="tanggal_mulai" placeholder="dd/mm/yyy"
                        value="{{ Session::get('tanggal_mulai') }}">
                </div>
                <div class="col-auto">Tahun Lulus</div>
                <div class="col-auto">
                    <input type="date" class="form-control form-control-sm" name="tanggal_akhir" placeholder="dd/mm/yyy"
                        value="{{ Session::get('tanggal_akhir') }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
    </form>
@endsection
