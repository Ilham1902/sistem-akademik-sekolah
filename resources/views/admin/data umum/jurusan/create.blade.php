@extends('layouts.main')

@section('body')
    <h3>Data Umum > Jurusan > Tambah Jurusan</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        {{-- header --}}
        <div class="card-header">
            <a href="/data_umum/jurusan" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
        {{-- Body --}}
        <form action="/data_umum/jurusan" method="post">
            <div class="card-body">
                @csrf
                <div class="mb-3">
                    <label for="kode_jurusan" class="form-label">Kode Jurusan</label>
                    <input type="text" class="form-control @error ('kode_jurusan') is-invalid @enderror" name="kode_jurusan" id="kode_jurusan" placeholder="JR-001" required value="{{ old('kode_jurusan') }}">
                    @error('kode_jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                    <input type="text" class="form-control @error ('nama_jurusan') is-invalid @enderror" name="nama_jurusan" id="nama_jurusan" placeholder="Teknik Kendaraan Ringan" required value="{{ old('nama_jurusan') }}">
                    @error('nama_jurusan')
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
