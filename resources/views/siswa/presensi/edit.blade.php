@extends('layouts.main')

@section('body')
    <h3>Form Presensi Siswa</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        <div class="card-header">
            <a href="/presensi_siswa" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>

        <div class="card-body mt-3">

            @foreach ($history as $hs)
            <form action="/presensi_siswa/{{ $hs->id_presensi }}" method="post">
                @method('put')
                @csrf

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="text" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="10 Oktober 2022" value="{{ old('tanggal', $hs->tanggal)}}" disabled>
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_guru" class="form-label">Nama Guru</label>
                    <input type="text" name="nama_guru" class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru" placeholder="Agus Trisusillo, S.Kom" value="{{ old('nama_guru', $hs->nama)}}" disabled>
                    @error('nama_guru')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                    <input type="text" name="mata_pelajaran" class="form-control @error('mata_pelajaran') is-invalid @enderror" id="mata_pelajaran" placeholder="Agus Trisusillo, S.Kom" value="{{ old('mata_pelajaran', $hs->nama_mata_pelajaran)}}" disabled>
                    @error('mata_pelajaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="kelas" placeholder="Agus Trisusillo, S.Kom" value="{{ old('kelas', $hs->nama_kelas)}}" disabled>
                    @error('kelas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kelas" class="form-label">Presensi</label>
                    <select class="form-select" name="kehadiran" aria-label="Default select example">
                        @foreach ($kehadiran as $hadir)
                        <option value="{{ $hadir->kode_kehadiran }}" @selected($hs->kehadiran === $hadir->kode_kehadiran)>{{ $hadir->nama_kehadiran }}</option>
                        @endforeach
                    </select>
                    @error('kehadiran')
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
    </div>
@endsection
