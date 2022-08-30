@extends('layouts.main')

@section('body')
    <h3>Guru > Edit Guru</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        {{-- header --}}
        <div class="card-header">
            <a href="/data_guru" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
        {{-- Body --}}
    @foreach ($guru as $g)

        <form action="/data_guru/{{ $g->id_guru }}" method="post">
            <div class="card-body">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="NIP" class="form-label">NIP/NUPTK</label>
                    <input type="text" class="form-control @error ('NIP') is-invalid @enderror" name="NIP" id="NIP" placeholder="1234" required value="{{ old('NIP', $g->NIP) }}">
                    @error('NIP')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control @error ('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Wahyu Pratama, S.Pdi" required value="{{ old('nama', $g->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control @error ('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" placeholder="Bekasi" required value="{{ old('tempat_lahir', $g->tempat_lahir) }}">
                    @error('tempat_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="text" class="form-control @error ('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" placeholder="10 Oktober 2000" required value="{{ old('tanggal_lahir', $g->tanggal_lahir) }}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_wa" class="form-label">NO WA</label>
                    <input type="no_wa" class="form-control @error ('no_wa') is-invalid @enderror" name="no_wa" id="no_wa" placeholder="081112345678" required value="{{ old('no_wa', $g->no_wa) }}">
                    @error('no_wa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error ('email') is-invalid @enderror" name="email" id="email" placeholder="wahyu123@gmail.com" required value="{{ old('email', $g->email) }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error ('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Jl.Albahar Kaliabang bungur rt.001/001 bekasi utara kota bekasi" required value="{{ old('alamat', $g->alamat) }}">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control @error ('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" placeholder="Guru" required value="{{ old('jabatan', $g->jabatan) }}">
                    @error('jabatan')
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
