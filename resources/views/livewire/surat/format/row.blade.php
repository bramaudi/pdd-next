<tr>
    <td>{{ $data->id }}</td>
    <td>
        <button class="btn btn-sm btn-warning tooltip" data-tooltip="Ganti Nama" @click="modal = 'update'"
            wire:click="$emit('loadData', {{ $data->id }})">
            <i class="icon icon-edit"></i>
        </button>

        <button class="btn btn-sm btn-{{ $data->active ? 'primary' : 'success' }} tooltip"
            data-tooltip="{{ $data->active ? 'Sembunyikan Format' : 'Tampilkan Format' }}" wire:click="hideToggle">
            <i class="fas fa-{{ $data->active ? 'lock' : 'lock-open' }}"></i>
        </button>

        <button class="btn btn-sm btn-error tooltip" data-tooltip="Hapus Format" @click="modal = 'delete'"
            wire:click="$emit('loadData', {{ $data->id }})">
            <i class="icon icon-delete"></i>
        </button>
    </td>
    <td>
        <button class="btn btn-sm btn-warning tooltip" data-tooltip="Ganti Nama" @click="modal = 'update'"
            wire:click="$emit('loadData', {{ $data->id }})">
            <i class="icon icon-edit"></i>
        </button>

        <button class="btn btn-sm btn-{{ $data->active ? 'primary' : 'success' }} tooltip"
            data-tooltip="{{ $data->active ? 'Sembunyikan Format' : 'Tampilkan Format' }}" wire:click="hideToggle">
            <i class="fas fa-{{ $data->active ? 'lock' : 'lock-open' }}"></i>
        </button>

        <button class="btn btn-sm btn-error tooltip" data-tooltip="Hapus Format" @click="modal = 'delete'"
            wire:click="$emit('loadData', {{ $data->id }})">
            <i class="icon icon-delete"></i>
        </button>
    </td>
    <td>{{ $data->prefix }}</td>
    <td>{{ $data->name }}</td>
    <td>Lampiran, Lampiran, Lampiran</td>
</tr>
