<aside class="sidebar">

    <a href="/"><i class="fas fa-home"></i> Home</a>

    @if(Auth::user())

        <a href="/dashboard"><i class="fas fa-chart-line"></i> Dashboard</a>

        <!-- Desa -->
        <div class="accordion">
            <input type="checkbox" id="accordion-1" name="accordion-checkbox" hidden>
            <label class="accordion-header c-hand" for="accordion-1" tabindex="0">
                <i class="fas fa-info"></i> Info Desa
            </label>
            <div class="accordion-body">
                <a href="/dashboard/desa/config"><i class="fas fa-id-card"></i> Identitas Desa</a>
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

    @endif

</aside>
