@extends('layouts.main')

@section('body')
    <h3>Data Umum > Mata Pelajaran > Ubah Mata Pelajaran</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        <div class="card-header">
            <a href="/data_umum/mata_pelajaran" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>

        <div class="card-body mt-3">
            @foreach ($mapel as $mp)
                <form action="/data_umum/mata_pelajaran/{{ $mp->id_mata_pelajaran }}" method="post">
                    @method('put')
                    @csrf

                    <div class="mb-3">
                        <label for="kode_mata_pelajaran" class="form-label">Kode Mata Pelajaran</label>
                        <input type="text" name="kode_mata_pelajaran" class="form-control @error('kode_mata_pelajaran') is-invalid @enderror" id="kode_mata_pelajaran" placeholder="KL-001" value="{{ old('kode_mata_pelajaran', $mp->kode_mata_pelajaran)}}">
                        @error('kode_mata_pelajaran')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_mata_pelajaran" class="form-label">Nama Mata Pelajaran</label>
                        <input type="text" name="nama_mata_pelajaran" class="form-control @error('nama_mata_pelajaran') is-invalid @enderror" id="nama_mata_pelajaran" placeholder="10 TKJ A" value="{{ old('nama_mata_pelajaran', $mp->nama_mata_pelajaran)}}">
                        @error('nama_mata_pelajaran')
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
