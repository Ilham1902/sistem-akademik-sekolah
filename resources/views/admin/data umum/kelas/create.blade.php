@extends('layouts.main')

@section('body')
    <h3>Data Umum > Kelas > Tambah Kelas</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        {{-- header --}}
        <div class="card-header">
            <a href="/data_umum/kelas" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
        {{-- Body --}}
        <form action="/data_umum/kelas" method="post">
            <div class="card-body">
                @csrf
                <div class="mb-3">
                    <label for="kode_kelas" class="form-label">Kode Kelas</label>
                    <input type="text" class="form-control @error ('kode_kelas') is-invalid @enderror" name="kode_kelas" id="kode_kelas" placeholder="KL-001" required value="{{ old('kode_kelas') }}">
                    @error('kode_kelas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="text" class="form-control @error ('nama_kelas') is-invalid @enderror" name="nama_kelas" id="nama_kelas" placeholder="10 TKJ A" required value="{{ old('nama_kelas') }}">
                    @error('nama_kelas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-end"><i class="bi bi-save2"></i> Simpan</button>
            </div>
        </form>
@endsection
