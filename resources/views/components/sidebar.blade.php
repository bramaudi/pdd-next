<aside class="sidebar">
    <a href="/"><i class="fas fa-home"></i> Home</a>
    @if(Auth::guest())
    @else
        <a href="/dashboard"><i class="fas fa-chart-line"></i> Dashboard</a>

        <!-- Info Desa -->
        <div class="accordion">
            <input type="checkbox" id="accordion-1" name="accordion-checkbox" hidden>
            <label class="accordion-header c-hand" for="accordion-1" tabindex="0">
                <i class="fas fa-info"></i> Info Desa
            </label>
            <div class="accordion-body">
                @if(Auth::user()->can(['config.read', 'config.update']))
                <a href="/dashboard/config"><i class="fas fa-id-card"></i> Identitas Desa</a>
                @endif
            </div>
        </div>

        <!-- Kependudukan -->
        <div class="accordion">
            <input type="checkbox" id="accordion-penduduk" name="accordion-checkbox" hidden>
            <label class="accordion-header c-hand" for="accordion-penduduk" tabindex="0">
                <i class="fas fa-user-friends"></i> Kependudukan
            </label>
            <div class="accordion-body">
                @if(Auth::user()->can(['penduduk.create', 'penduduk.read', 'config.update', 'penduduk.delete']))
                <a href="/dashboard/kependudukan/penduduk"><i class="fas fa-user"></i> Penduduk</a>
                @endif
                @if(Auth::user()->can(['keluarga.create', 'keluarga.read', 'keluarga.update', 'keluarga.delete']))
                <a href="/dashboard/kependudukan/keluarga"><i class="fas fa-users"></i> Keluarga</a>
                @endif
            </div>
        </div>

        <!-- Pengaturan -->
        <div class="accordion">
            <input type="checkbox" id="accordion-2" name="accordion-checkbox" hidden>
            <label class="accordion-header c-hand" for="accordion-2" tabindex="0">
                <i class="fas fa-cog"></i> Pengaturan
            </label>
            <div class="accordion-body">
                @if(Auth::user()->can(['user.create', 'user.read', 'user.update', 'user.delete']))
                <a href="/dashboard/user"><i class="fas fa-users"></i> Pengguna</a>
                <a href="/dashboard/role"><i class="fas fa-lock"></i> Jabatan</a>
                @endif
            </div>
        </div>
    @endif
</aside>
