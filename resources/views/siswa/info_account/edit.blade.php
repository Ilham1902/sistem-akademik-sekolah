@extends('layouts.main')

@section('body')
    <h3>Info Account > Ubah Biodata</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        <div class="card-header">
            <a href="/info_account_siswa" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>

        <div class="card-body mt-3">
            @foreach ($siswa as $sw)
                <form action="/info_account_siswa/{{ $sw->id_siswa }}" method="post">
                    @method('put')
                    @csrf

                    <table class="table table-responsive">

                        <tr>
                            <td><label for="nisn" class="form-label"><strong>NISN</strong></label></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" id="nisn" placeholder="10101000" value="{{ old('nisn', $sw->NISN)}}" disabled>
                                @error('nisn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="nama" class="form-label"><strong>Nama</strong></label></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="10101000" value="{{ old('nama', $sw->nama)}}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="tempat_lahir" class="form-label"><strong>Tempat Lahir</strong></label></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Bekasi" value="{{ old('tempat_lahir', $sw->tempat_lahir)}}">
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="tanggal_lahir" class="form-label"><strong>Tanggal Lahir</strong></label></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="10 Oktober 2000" value="{{ old('tanggal_lahir', $sw->tanggal_lahir)}}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="kelas" class="form-label"><strong>Kelas</strong></label></td>
                            <td>:</td>
                            <td>
                                <select class="form-select" name="kelas" aria-label="Default select example">
                                    @foreach ($kelas as $kl)
                                        <option value="{{ $kl->kode_kelas }}">{{ $kl->nama_kelas }}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="tahun_masuk" class="form-label"><strong>Tahun Masuk</strong></label></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="tahun_masuk" class="form-control @error('tahun_masuk') is-invalid @enderror" id="tahun_masuk" placeholder="2022" value="{{ old('tahun_masuk', $sw->tahun_masuk)}}">
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="alamat" class="form-label"><strong>Alamat</strong></label></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat Lengkap" value="{{ old('alamat', $sw->alamat)}}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="email" class="form-label"><strong>Email</strong></label></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="10101000" value="{{ old('email', $sw->email)}}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>

                    </table>

                    <div class="float-end">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan</button>
                    </div>

                </form>
            @endforeach
        </div>
@endsection
