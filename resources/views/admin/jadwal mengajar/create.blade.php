@extends('layouts.main')

@section('body')
    <h3>Jadwal Mengajar > Tambah Jadwal Mengajar</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        {{-- header --}}
        <div class="card-header">
            <a href="/jadwal_mengajar" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
        {{-- Body --}}
        <form action="/jadwal_mengajar" method="post">
            <div class="card-body">
                @csrf
                <div class="mb-3">
                    <label for="jam" class="form-label">Jam</label>
                    <input type="time" class="form-control @error ('jam') is-invalid @enderror" name="jam" id="jam" placeholder="07:00 - 09:00" required value="{{ old('jam') }}">
                    @error('jam')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
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
                </div>
                <div class="mb-3">
                    <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                    <select class="form-select" name="mata_pelajaran" aria-label="Default select example">
                        @foreach ($mata_pelajaran as $mp)
                        <option value="{{ $mp->kode_mata_pelajaran }}">{{ $mp->nama_mata_pelajaran }}</option>
                        @endforeach
                      </select>
                    @error('mata_pelajaran')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="guru" class="form-label">Guru</label>
                    <select class="form-select" name="guru" aria-label="Default select example">
                        @foreach ($guru as $g)
                        <option value="{{ $g->nip }}">{{ $g->nama }}</option>
                        @endforeach
                      </select>
                    @error('mata_pelajaran')
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
@endsection
