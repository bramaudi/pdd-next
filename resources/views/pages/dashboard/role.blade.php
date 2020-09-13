<div class="container py-2">
    <h5>Informasi Jabatan</h5>

    @foreach($roles as $role)
    <div class="dropdown">
        <a href="#" class="btn btn-link dropdown-toggle" tabindex="0">
            {{ $role->name }} <i class="icon icon-caret"></i>
        </a>
        <ul class="menu">
            @foreach($role->permissions as $can)
            <li class="menu-item"><a href="#">{{ $can->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <br>
    @endforeach

</div>
