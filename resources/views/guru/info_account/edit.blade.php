@extends('layouts.main')

@section('body')
    <h3>Info Account > Ubah Biodata</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        <div class="card-header">
            <a href="/info_account_guru" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>

        <div class="card-body mt-3">
            @foreach ($guru as $gr)
                <form action="/info_account_guru/{{ $gr->id_guru }}" method="post">
                    @method('put')
                    @csrf

                    <table class="table table-responsive">

                        <tr>
                            <td><label for="nip" class="form-label"><strong>NIP</strong></label></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nip" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="10101000" value="{{ old('nip', $gr->nip)}}" disabled>
                                @error('nip')
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
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="10101000" value="{{ old('nama', $gr->nama)}}">
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
                                <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="10101000" value="{{ old('tempat_lahir', $gr->tempat_lahir)}}">
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
                                <input type="text" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="10101000" value="{{ old('tanggal_lahir', $gr->tanggal_lahir)}}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="no_wa" class="form-label"><strong>Nomor Whatsapp</strong></label></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="no_wa" class="form-control @error('no_wa') is-invalid @enderror" id="no_wa" placeholder="10101000" value="{{ old('no_wa', $gr->no_wa)}}">
                                @error('no_wa')
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
                                <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="10101000" value="{{ old('alamat', $gr->alamat)}}">
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
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="10101000" value="{{ old('email', $gr->email)}}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><label for="jabatan" class="form-label"><strong>Jabatan</strong></label></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" placeholder="10101000" value="{{ old('jabatan', $gr->jabatan)}}">
                                @error('tempat_lahir')
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
