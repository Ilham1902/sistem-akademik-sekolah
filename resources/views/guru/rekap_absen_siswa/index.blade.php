@extends('layouts.main')

@section('body')

    <h3>Pilih Kelas</h3>

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">
        <div class="card-body">
            @foreach ($kelas as $kl)
                <a href="/rekap_absen_siswa/{{ $kl->id_kelas }}" class="btn btn-info">{{ $kl->nama_kelas }}</a>
            @endforeach
        </div>
    </div>
@endsection
