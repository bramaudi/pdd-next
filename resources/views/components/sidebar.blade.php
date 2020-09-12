<aside class="sidebar">
    <ul class="menu menu-nav">
        <li class="menu-item"><a href="/dashboard"><i data-feather="activity"></i> Dashboard</a></li>
    </ul>
    @role('Super Admin')
    <div class="accordion menu menu-nav">
        <input type="checkbox" id="accordion-1" name="accordion-checkbox" hidden>
        <label class="accordion-header c-hand" for="accordion-1">
            <i data-feather="settings"></i>
            Pegaturan
            <i class="icon icon-arrow-right float-right mt-1 mr-1"></i>
        </label>
        <div class="accordion-body">
            <ul class="menu menu-nav">
                <li class="menu-item"><a href="/dashboard/user"><i data-feather="users"></i> Pengguna</a></li>
                <li class="menu-item"><a href="/dashboard/role"><i data-feather="lock"></i> Jabatan</a></li>
            </ul>
        </div>
    </div>
    @endrole
</aside>
