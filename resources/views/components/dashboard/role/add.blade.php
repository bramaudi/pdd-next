<button class="btn m-1">
    <i class="fas fa-plus"></i> Tambah Hak Akses Baru
</button>

<div class="table-container">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Hak Akses</th>
        </tr>

        @foreach($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>
                @role('Super Admin') * @else
                {{ implode(', ', $role->getAllPermissions()->toArray()) }}
                @endrole
            </td>
        </tr>
        @endforeach
    </table>
</div>