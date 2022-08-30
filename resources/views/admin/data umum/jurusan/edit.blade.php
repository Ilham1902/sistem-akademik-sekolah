@extends('layouts.main')

@section('body')
    <h3>Data Umum > Jurusan > Ubah Jurusan</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        <div class="card-header">
            <a href="/data_umum/jurusan" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>

        <div class="card-body mt-3">
            @foreach ($jurusan as $kl)
                <form action="/data_umum/jurusan/{{ $kl->id_jurusan }}" method="post">
                    @method('put')
                    @csrf

                    <div class="mb-3">
                        <label for="kode_jurusan" class="form-label">Kode Jurusan</label>
                        <input type="text" name="kode_jurusan" class="form-control @error('kode_jurusan') is-invalid @enderror" id="kode_jurusan" value="{{ old('kode_jurusan', $kl->kode_jurusan)}}">
                        @error('kode_jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
                        <input type="text" name="nama_jurusan" class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan" value="{{ old('nama_jurusan', $kl->nama_jurusan)}}">
                        @error('nama_jurusan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="float-end">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan</button>
                    </div>

                </form>
            @endforeach
        </div>
@endsection
