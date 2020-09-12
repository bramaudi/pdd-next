<aside class="sidebar">
    <ul class="menu menu-nav">
        <li class="menu-item"><a href="/dashboard">Dashboard</a></li>
    </ul>
    @role('Super Admin')
    <div class="accordion menu menu-nav">
        <input type="checkbox" id="accordion-1" name="accordion-checkbox" hidden>
        <label class="accordion-header c-hand" for="accordion-1">
            Pegaturan
            <i class="icon icon-arrow-right float-right mt-1 mr-1"></i>
        </label>
        <div class="accordion-body">
            <ul class="menu menu-nav">
                <li class="menu-item"><a href="/dashboard/user">Pengguna</a></li>
                <li class="menu-item"><a href="/dashboard/role">Jabatan</a></li>
            </ul>
        </div>
    </div>
    @endrole
</aside>
