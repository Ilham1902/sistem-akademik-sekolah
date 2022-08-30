<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">

        {{-- Admin --}}
        @if (Auth::user()->level === "admin")
        <a class="navbar-brand ms-3" href="/informasi">SMK EPJ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Informasi") || ($title === "Buat Informasi") || ($title === "Edit Informasi") ? 'active' : '' }} " aria-current="page" href="/informasi"><i class="bi bi-info-circle"></i> Informasi</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle {{ ($title === "Data Kelas") || ($title === "Tambah Kelas") || ($title === "Ubah Kelas") || ($title === 'Data Siswa per-Kelas') || ($title === "Mata Pelajaran") || ($title === "Tambah Mata Pelajaran") || ($title === "Ubah Mata Pelajaran") || ($title === "Data Jurusan") || ($title === "Tambah Jurusan") || ($title === "Ubah Jurusan") || ($title === 'Data Siswa per-Jurusan') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-journal-bookmark-fill"></i> Data Umum
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/data_umum/kelas">Kelas</a></li>
                <li><a class="dropdown-item" href="/data_umum/jurusan">Jurusan</a></li>
                <li><a class="dropdown-item" href="/data_umum/mata_pelajaran">Mata Pelajaran</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle {{ ($title === "Jadwal Mengajar") || ($title === "Tambah Jadwal Mengajar") ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-clock-history"></i> Jadwal Mengajar
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/jadwal_mengajar">Daftar Jadwal</a></li>
                <li><a class="dropdown-item" href="/jadwal_mengajar/create">Tambah Jadwal</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle {{ ($title === "Data Siswa") || ($title === "Tambah Siswa") || ($title === "Edit Siswa") ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-people-fill"></i> Data Siswa
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/data_siswa">Daftar Siswa</a></li>
                <li><a class="dropdown-item" href="/data_siswa/create">Tambah Siswa</a></li>
              </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ ($title === "Data Guru") || ($title === "Tambah Guru") || ($title === "Edit Guru") ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-fill"></i> Data Guru
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/data_guru">Daftar Guru</a></li>
                  <li><a class="dropdown-item" href="/data_guru/create">Tambah Guru</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ ($title === "Data Absen Siswa") || ($title === "Rekap Absen Guru") ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-fill"></i> Data Absen
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/data_absen_guru">Guru</a></li>
                  <li><a class="dropdown-item" href="/data_absen_siswa">Siswa</a></li>
                </ul>
            </li>

          </ul>

          <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle {{ ($title === "Info Account") ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      wellcome Back, {{ Auth::user()->username }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/info_account">Info Account</a></li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                  </ul>
                </li>
          </ul>
        @endif

        @if (Auth::user()->level === "guru")
        <a class="navbar-brand ms-3" href="/mengajar">SMK EPJ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Informasi Sekolah") ? 'active' : '' }} " aria-current="page" href="/informasi_sekolah"><i class="bi bi-info-circle"></i> Informasi</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link {{ ($title === "Jadwal Mengajar") || ($title === "Buat Informasi") || ($title === "Edit Informasi") ? 'active' : '' }} " aria-current="page" href="/mengajar"><i class="bi bi-clock"></i> Jadwal Mengajar</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Rekap Absen Siswa") ? 'active' : '' }} " aria-current="page" href="/rekap_absen_siswa"><i class="bi bi-list-check"></i> Rekap Absen</a>
                  </li>

            </ul>


        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ ($title === "Info Account") ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    wellcome Back, {{ Auth::user()->username }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/info_account_guru">Info Account</a></li>
                    <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
                </li>
        </ul>

        @endif

        @if (Auth::user()->level === "siswa")

        <a class="navbar-brand ms-3" href="/mengajar">SMK EPJ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Informasi Sekolah") ? 'active' : '' }} " aria-current="page" href="/informasi_sekolah"><i class="bi bi-info-circle"></i> Informasi</a>
                  </li>

                <li class="nav-item">
                  <a class="nav-link {{ ($title === "Presensi") ? 'active' : '' }} " aria-current="page" href="/presensi_siswa"><i class="bi bi-info-circle"></i> Presensi</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ ($title === "Info Account") ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        wellcome Back, {{ Auth::user()->username }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/info_account_siswa">Info Account</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                    </li>
            </ul>
        @endif
          </div>
        </div>
      </div>
    </div>
  </nav>
