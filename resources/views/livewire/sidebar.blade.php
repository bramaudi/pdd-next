<aside class="sidebar">

    <a href="/"><i class="fas fa-home"></i> Home</a>

    @auth

        <a href="/dashboard"><i class="fas fa-chart-line"></i> Dashboard</a>

        <!-- Desa -->
        <div class="accordion">
            <input type="checkbox" id="accordion-1" name="accordion-checkbox" hidden>
            <label class="accordion-header c-hand" for="accordion-1" tabindex="0">
                <i class="fas fa-info"></i> Info Desa
            </label>
            <div class="accordion-body">
                <a href="/dashboard/desa/config"><i class="fas fa-id-card"></i> Identitas Desa</a>
                <a href="/dashboard/desa/wilayah"><i class="fas fa-map"></i> Wilayah Administratif</a>
            </div>
        </div>

        <!-- Kependudukan -->
        <div class="accordion">
            <input type="checkbox" id="accordion-penduduk" name="accordion-checkbox" hidden>
            <label class="accordion-header c-hand" for="accordion-penduduk" tabindex="0">
                <i class="fas fa-user-friends"></i> Kependudukan
            </label>
            <div class="accordion-body">
                <a href="/dashboard/kependudukan/penduduk"><i class="fas fa-user"></i> Penduduk</a>
                <a href="/dashboard/kependudukan/keluarga"><i class="fas fa-users"></i> Keluarga</a>
            </div>
        </div>

        <!-- Surat -->
        <div class="accordion">
            <input type="checkbox" id="accordion-3" name="accordion-checkbox" hidden>
            <label class="accordion-header c-hand" for="accordion-3" tabindex="0">
                <i class="fas fa-envelope"></i> Layanan Surat
            </label>
            <div class="accordion-body">
                <a href="{{ route('surat.create') }}"><i class="fas fa-print"></i> Buat Surat</a>
                <a href="{{ route('surat.format.index') }}"><i class="fas fa-file"></i> Format Surat</a>
                <a href="{{ route('surat.index') }}"><i class="fas fa-book"></i> Arsip Surat</a>
            </div>
        </div>

        <!-- Pengaturan -->
        <div class="accordion">
            <input type="checkbox" id="accordion-2" name="accordion-checkbox" hidden>
            <label class="accordion-header c-hand" for="accordion-2" tabindex="0">
                <i class="fas fa-cog"></i> Sistem
            </label>
            <div class="accordion-body">
                <a href="/dashboard/sistem/user"><i class="fas fa-users"></i> Pengguna</a>
                <a href="/dashboard/sistem/role"><i class="fas fa-lock"></i> Jabatan</a>
            </div>
        </div>

    @endauth

</aside>
