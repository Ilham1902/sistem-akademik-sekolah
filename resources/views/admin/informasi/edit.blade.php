@extends('layouts.main')

@section('body')
    <h3>Edit Informasi</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        <div class="card-header">
            <a href="/informasi" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
        @foreach ($informasi as $info)

            <div class="card-body mt-3">
                <form action="/informasi/{{ $info->id_informasi }}" method="post">
                    @method('put')
                    @csrf

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Informasi</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul Informasi" value="{{ old('judul', $info->judul)}}">
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
                        <input id="isi" type="hidden" name="isi" value="{{ $info->isi }}">
                        <trix-editor input="isi"></trix-editor>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_buat" class="form-label">Tempat, tanggal membuat Informasi</label>
                        <input type="text" name="tanggal_buat" class="form-control @error('tanggal_buat') is-invalid @enderror" id="tanggal_buat" placeholder="Bekasi, 10 Oktober 2022" value="{{ $info->tanggal_buat }}">
                        @error('tanggal_buat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nama_kepsek" class="form-label">Nama Kepala Sekolah</label>
                        <input type="text" name="nama_kepsek" class="form-control @error('nama_kepsek') is-invalid @enderror" id="nama_kepsek" placeholder="Drs.Budi Setiawan" value="{{ $info->nama_kepsek }}">
                        @error('nama_kepsek')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="float-end">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan</button>
                    </div>
                </form>
            </div>

        @endforeach
@endsection
