@extends('layouts.main')

@section('body')
    <h3>Jadwal Mengajar > Edit Jadwal Mengajar</h3>
    <hr>
    <div class="card rounded-4 col-lg-12 mb-4 mt-4 p-2 shadow-lg">

        <div class="card-header">
            <a href="/jadwal_mengajar" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>

        <div class="card-body mt-3">
            @foreach ($jadwal_mengajar as $jadwal)
                <form action="/jadwal_mengajar/{{ $jadwal->id_mengajar }}" method="post">
                    @method('put')
                    @csrf

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" placeholder="01/07/2022" value="{{ old('tanggal', $jadwal->tanggal)}}">
                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jam" class="form-label">Jam</label>
                        <input type="text" name="jam" class="form-control @error('jam') is-invalid @enderror" id="jam" placeholder="09:00 - 11:00" value="{{ old('jam', $jadwal->jam)}}">
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
                            <option value="{{ $kl->kode_kelas }}" @selected($jadwal->kode_kelas === $kl->kode_kelas)>{{ $kl->nama_kelas }}</option>
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
                            <option value="{{ $mp->kode_mata_pelajaran }}" @selected($jadwal->kode_mata_pelajaran === $mp->kode_mata_pelajaran)>{{ $mp->nama_mata_pelajaran }}</option>
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
                            <option value="{{ $g->nip }}" @selected($jadwal->nip === $g->nip)>{{ $g->nama }}</option>
                            @endforeach
                          </select>
                        @error('guru')
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
@endsection
