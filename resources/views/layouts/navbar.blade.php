<nav class="nav flex-column px-3">
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('admin.dashboard') }}"
           class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
           @if(request()->routeIs('admin.dashboard')) aria-current="page" @endif>
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="{{ route('admin.kelas.index') }}"
           class="nav-link {{ request()->routeIs('admin.kelas.*') ? 'active' : '' }}"
           @if(request()->routeIs('admin.kelas.*')) aria-current="page" @endif>
            <i class="bi bi-door-open"></i> Data Kelas
        </a>

        <a href="{{ route('admin.siswa.index') }}"
           class="nav-link {{ request()->routeIs('admin.siswa.*') ? 'active' : '' }}"
           @if(request()->routeIs('admin.siswa.*')) aria-current="page" @endif>
            <i class="bi bi-people"></i> Data Siswa
        </a>

        <a href="{{ route('admin.guru.index') }}"
           class="nav-link {{ request()->routeIs('admin.guru.*') ? 'active' : '' }}"
           @if(request()->routeIs('admin.guru.*')) aria-current="page" @endif>
            <i class="bi bi-person-badge"></i> Data Guru
        </a>

        <a href="{{ route('admin.wali-murid.index') }}"
           class="nav-link {{ request()->routeIs('admin.wali-murid.*') ? 'active' : '' }}"
           @if(request()->routeIs('admin.wali-murid.*')) aria-current="page" @endif>
            <i class="bi bi-person-hearts"></i> Data Wali Murid
        </a>

        <hr class="text-white">

        <a href="{{ route('admin.jenis-prestasi.index') }}"
           class="nav-link {{ request()->routeIs('admin.jenis-prestasi.*') ? 'active' : '' }}"
           @if(request()->routeIs('admin.jenis-prestasi.*')) aria-current="page" @endif>
            <i class="bi bi-trophy"></i> Jenis Prestasi
        </a>

        <a href="{{ route('admin.jenis-pelanggaran.index') }}"
           class="nav-link {{ request()->routeIs('admin.jenis-pelanggaran.*') ? 'active' : '' }}"
           @if(request()->routeIs('admin.jenis-pelanggaran.*')) aria-current="page" @endif>
            <i class="bi bi-exclamation-triangle"></i> Jenis Pelanggaran
        </a>

        <hr class="text-white">

        <a href="{{ route('admin.users.index') }}"
           class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
           @if(request()->routeIs('admin.users.*')) aria-current="page" @endif>
            <i class="bi bi-person-gear"></i> Kelola Akun
        </a>

    @elseif(auth()->user()->role === 'guru')
        <a href="{{ route('guru.dashboard') }}"
           class="nav-link {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}"
           @if(request()->routeIs('guru.dashboard')) aria-current="page" @endif>
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="{{ route('guru.siswa.index') }}"
           class="nav-link {{ request()->routeIs('guru.siswa.*') ? 'active' : '' }}"
           @if(request()->routeIs('guru.siswa.*')) aria-current="page" @endif>
            <i class="bi bi-people"></i> Data Siswa
        </a>

        <a href="{{ route('guru.prestasi.index') }}"
           class="nav-link {{ request()->routeIs('guru.prestasi.*') ? 'active' : '' }}"
           @if(request()->routeIs('guru.prestasi.*')) aria-current="page" @endif>
            <i class="bi bi-trophy"></i> Input Prestasi
        </a>

        <a href="{{ route('guru.pelanggaran.index') }}"
           class="nav-link {{ request()->routeIs('guru.pelanggaran.*') ? 'active' : '' }}"
           @if(request()->routeIs('guru.pelanggaran.*')) aria-current="page" @endif>
            <i class="bi bi-exclamation-triangle"></i> Input Pelanggaran
        </a>

        <a href="{{ route('guru.laporan.index') }}"
           class="nav-link {{ request()->routeIs('guru.laporan.*') ? 'active' : '' }}"
           @if(request()->routeIs('guru.laporan.*')) aria-current="page" @endif>
            <i class="bi bi-file-earmark-text"></i> Laporan
        </a>

    @elseif(auth()->user()->role === 'siswa')
        <a href="{{ route('siswa.dashboard') }}"
           class="nav-link {{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}"
           @if(request()->routeIs('siswa.dashboard')) aria-current="page" @endif>
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="{{ route('siswa.biodata') }}"
           class="nav-link {{ request()->routeIs('siswa.biodata') ? 'active' : '' }}"
           @if(request()->routeIs('siswa.biodata')) aria-current="page" @endif>
            <i class="bi bi-person-vcard"></i> Biodata Saya
        </a>

        <a href="{{ route('siswa.prestasi') }}"
           class="nav-link {{ request()->routeIs('siswa.prestasi') ? 'active' : '' }}"
           @if(request()->routeIs('siswa.prestasi')) aria-current="page" @endif>
            <i class="bi bi-trophy"></i> Prestasi Saya
        </a>

        <a href="{{ route('siswa.pelanggaran') }}"
           class="nav-link {{ request()->routeIs('siswa.pelanggaran') ? 'active' : '' }}"
           @if(request()->routeIs('siswa.pelanggaran')) aria-current="page" @endif>
            <i class="bi bi-exclamation-triangle"></i> Pelanggaran Saya
        </a>

    @elseif(auth()->user()->role === 'wali')
        <a href="{{ route('wali.dashboard') }}"
           class="nav-link {{ request()->routeIs('wali.dashboard') ? 'active' : '' }}"
           @if(request()->routeIs('wali.dashboard')) aria-current="page" @endif>
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="{{ route('wali.biodata') }}"
           class="nav-link {{ request()->routeIs('wali.biodata') ? 'active' : '' }}"
           @if(request()->routeIs('wali.biodata')) aria-current="page" @endif>
            <i class="bi bi-person-vcard"></i> Biodata Anak
        </a>

        <a href="{{ route('wali.prestasi') }}"
           class="nav-link {{ request()->routeIs('wali.prestasi') ? 'active' : '' }}"
           @if(request()->routeIs('wali.prestasi')) aria-current="page" @endif>
            <i class="bi bi-trophy"></i> Prestasi Anak
        </a>

        <a href="{{ route('wali.pelanggaran') }}"
           class="nav-link {{ request()->routeIs('wali.pelanggaran') ? 'active' : '' }}"
           @if(request()->routeIs('wali.pelanggaran')) aria-current="page" @endif>
            <i class="bi bi-exclamation-triangle"></i> Pelanggaran Anak
        </a>
    @endif
</nav>