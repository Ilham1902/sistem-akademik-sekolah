@extends('layouts.main')

@section('body')
    <h3>Data Umum > Mata Pelajaran > Tambah Mata Pelajaran</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        {{-- header --}}
        <div class="card-header">
            <a href="/data_umum/mata_pelajaran" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
        {{-- Body --}}
        <form action="/data_umum/mata_pelajaran" method="post">
            <div class="card-body">
                @csrf
                <div class="mb-3">
                    <label for="kode_mata_pelajaran" class="form-label">Kode Mata Pelajaran</label>
                    <input type="text" class="form-control @error ('kode_mata_pelajaran') is-invalid @enderror" name="kode_mata_pelajaran" id="kode_mata_pelajaran" placeholder="MP-001" required value="{{ old('kode_mata_pelajaran') }}">
                    @error('kode_mata_pelajaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_mata_pelajaran" class="form-label">Nama Mata Pelajaran</label>
                    <input type="text" class="form-control @error ('nama_mata_pelajaran') is-invalid @enderror" name="nama_mata_pelajaran" id="nama_mata_pelajaran" placeholder="Bahasa Indonesia" required value="{{ old('nama_mata_pelajaran') }}">
                    @error('nama_mata_pelajaran')
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
