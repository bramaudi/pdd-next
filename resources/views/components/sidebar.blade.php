<aside id="sidebar">
    <div class="backdrop" onclick="closeSidebar()"></div>

    <div class="sidebar-links">
        <a href="/"> <i class="fas fa-home"></i> Beranda</a>
        <a href="/dashboard"> <i class="fas fa-tachometer-alt"></i> Dashboard</a>
    </div>
    
    @role('Super Admin')
    <div class="sidebar-dropdown">
        <button class="title" onclick="toggleSidebarDropdown(event)">
            <i class="fas fa-cog"></i>
            Pengaturan
            <i class="fas fa-chevron-right"></i>
            <i class="fas fa-chevron-down"></i>
        </button>

        <a href="/dashboard/user"> <i class="fas fa-users"></i> Pengguna</a>
        <a href="/dashboard/role"> <i class="fas fa-lock"></i> Jabatan</a>
    </div>
    @endrole
    
</aside>
    
<script>
    function closeSidebar () {
        document.querySelector('aside#sidebar').classList.toggle('active');
        document.querySelector('header .nav-btn').classList.toggle('focus');
    }
    function toggleSidebarDropdown (event) {
        event.target.classList.toggle('active')
    }
</script>