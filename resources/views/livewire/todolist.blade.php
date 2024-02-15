<div class="p-8 max-w-4xl mx-auto shadow rounded my-10">
    <h1 class="text-2xl text-slate-500 font-semibold mb-5">To Do List</h1>
    <form wire:submit='save'>
        <input type="text" class="input input-bordered w-full mb-3" wire:model.live='title'>
        <button type="submit" class="btn btn-accent text-white">{{ $isEdit == true && $title != '' ? 'Edit' : 'Tambah'
            }}</button>
    </form>
    <hr class="my-5">
    <form action="">
        <input type="text" wire:model.live='search' class="input input-bordered w-full" placeholder="Cari . . . ">
    </form>
    <div class="">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1
                @endphp
                @foreach ($items as $item)
                <tr class="{{ $item->id == $idnya && $title == $item->title ? 'bg-base-200' : '' }}">
                    <th>{{ $no++ }}</th>
                    <td>{{ $item->title }}</td>
                    <td class="flex gap-2">
                        <button class="btn btn-sm btn-warning text-white "
                            wire:click='edit({{ $item->id }})'>Edit</button>
                        <button class="btn btn-sm btn-error text-white "
                            wire:click='delete({{ $item->id }})'>Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>