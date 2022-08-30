@extends('layouts.main')

@section('body')
    <h3>Buat Informasi</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-3 shadow-lg">
        <div class="card-header">
            <a href="/informasi" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
        <form action="/informasi" method="post">
            @csrf
        <div class="card-body">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Informasi</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" placeholder="Judul Informasi" required autofocus value="{{ old('judul') }}">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi Informasi</label>
                    @error('isi')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                <input id="isi" type="hidden" name="isi">
                <trix-editor input="isi"></trix-editor>
            </div>

            <div class="mb-3">
                <label for="tanggal_buat" class="form-label">Tempat,Tanggal Membuat Informasi</label>
                <input type="text" class="form-control @error('tanggal_buat') is-invalid @enderror" name="tanggal_buat" id="tanggal_buat" placeholder="Bekasi, 10 Oktober 2022" required value="{{ old('tanggal_buat') }}">
                @error('tanggal_buat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_kepsek" class="form-label">Nama Kepala Sekolah</label>
                <input type="text" class="form-control @error('nama_kepsek') is-invalid @enderror" name="nama_kepsek" id="nama_kepsek" placeholder="Drs.Budi Setiawan" required value="{{ old('nama_kepsek') }}">
                @error('nama_kepsek')
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
    </div>

    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection
