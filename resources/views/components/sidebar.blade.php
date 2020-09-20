<aside class="sidebar">
    <a href="/"><i class="fas fa-home"></i> Home</a>
    @if(Auth::guest())
    @else
        <a href="/dashboard"><i class="fas fa-chart-line"></i> Dashboard</a>

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
