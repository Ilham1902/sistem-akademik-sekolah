@extends('layouts.main')

@section('body')
    <h3>Info Account</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="card-body mt-3">

            @foreach ($siswa as $sw)

            <table class="table table-responsive ms-4">

                <tr>
                    <td><strong>NISN</strong></td>
                    <td>:</td>
                    <td>{{ Auth::user()->nisn }}</td>
                </tr>

                <tr>
                    <td><strong>Nama</strong></td>
                    <td>:</td>
                    <td>{{ Auth::user()->username }}</td>
                </tr>
                <tr>
                    <td><strong>Kelas</strong></td>
                    <td>:</td>
                    <td>{{ $sw->nama_kelas }}</td>
                </tr>
                <tr>
                    <td><strong>Tempat Lahir</strong></td>
                    <td>:</td>
                    <td>{{ $sw->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal Lahir</strong></td>
                    <td>:</td>
                    <td>{{ $sw->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td><strong>Tahun Masuk</strong></td>
                    <td>:</td>
                    <td>{{ $sw->tahun_masuk }}</td>
                </tr>
                <tr>
                    <td><strong>Alamat</strong></td>
                    <td>:</td>
                    <td>{{ $sw->alamat }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>:</td>
                    <td>{{ Auth::user()->email }}</td>
                </tr>


            </table>

            <a href="/info_account_siswa/{{ $sw->id_siswa }}/edit" class="btn btn-primary float-end mt-3 me-3">Ubah Biodata</a>
            @endforeach

        </div>

    </div>
@endsection
