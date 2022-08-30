@extends('layouts.main')

@section('body')
    <h3>Data Umum > Kelas > Ubah Kelas</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        <div class="card-header">
            <a href="/data_umum/kelas" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>

        <div class="card-body mt-3">
            @foreach ($kelas as $kl)
                <form action="/data_umum/kelas/{{ $kl->id_kelas }}" method="post">
                    @method('put')
                    @csrf

                    <div class="mb-3">
                        <label for="kode_kelas" class="form-label">Kode Kelas</label>
                        <input type="text" name="kode_kelas" class="form-control @error('kode_kelas') is-invalid @enderror" id="kode_kelas" placeholder="KL-001" value="{{ old('kode_kelas', $kl->kode_kelas)}}">
                        @error('kode_kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_kelas" class="form-label">Nama Kelas</label>
                        <input type="text" name="nama_kelas" class="form-control @error('nama_kelas') is-invalid @enderror" id="nama_kelas" placeholder="10 TKJ A" value="{{ old('nama_kelas', $kl->nama_kelas)}}">
                        @error('nama_kelas')
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
