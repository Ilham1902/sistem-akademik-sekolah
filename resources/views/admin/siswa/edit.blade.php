@extends('layouts.main')

@section('body')
    <h3>Siswa > Edit Siswa</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        {{-- header --}}
        <div class="card-header">
            <a href="/data_siswa" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
        {{-- Body --}}
    @foreach ($siswa as $s)

        <form action="/data_siswa/{{ $s->id_siswa }}" method="post">
            <div class="card-body">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="NISN" class="form-label">NISN</label>
                    <input type="text" class="form-control @error ('NISN') is-invalid @enderror" name="NISN" id="NISN" placeholder="1234" required value="{{ old('NISN', $s->NISN) }}">
                    @error('NISN')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control @error ('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Wahyu Pratama" required value="{{ old('nama', $s->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control @error ('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" placeholder="Bekasi" required value="{{ old('tempat_lahir', $s->tempat_lahir) }}">
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="text" class="form-control @error ('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" placeholder="10 Oktober 2000" required value="{{ old('tanggal_lahir', $s->tanggal_lahir) }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error ('email') is-invalid @enderror" name="email" id="email" placeholder="wahyu123@gmail.com" required value="{{ old('email', $s->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error ('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Jl.Albahar Kaliabang bungur rt.001/001 bekasi utara kota bekasi" required value="{{ old('alamat', $s->alamat) }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <select class="form-select" name="jurusan" aria-label="Default select example">
                        @foreach ($jurusan as $jr)
                        <option value="{{ $jr->kode_jurusan }}">{{ $jr->nama_jurusan }}</option>
                        @endforeach
                      </select>
                    @error('jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                    <input type="text" class="form-control @error ('tahun_masuk') is-invalid @enderror" name="tahun_masuk" id="tahun_masuk" placeholder="2022" required value="{{ old('tahun_masuk', $s->tahun_masuk) }}">
                    @error('tahun_masuk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select class="form-select" name="kelas" aria-label="Default select example">
                        @foreach ($kelas as $kl)
                        <option value="{{ $kl->kode_kelas }}" @selected($s->kode_kelas === $kl->kode_kelas)>{{ $kl->nama_kelas }}</option>
                        @endforeach
                      </select>
                    @error('kelas')
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
    @endforeach
@endsection
