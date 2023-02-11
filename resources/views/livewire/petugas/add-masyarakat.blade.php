<div class="container-fluid">
    <h2 class='mb-2'>Tambah Masyarakat</h2>
    <div class="col-12 rounded p-4 bg-white border">
        <form wire:submit.prevent="tambah" action="" method="POST">
             <div class="form-group">
                <label for="nik">Nik</label>
                <input wire:model.defer="masyarakat.nik" type="number" class="form-control">
                @error('masyarakat.nik')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @if (session()->has('nik_duplikat'))
                    <span class="text-danger">{{ session('nik_duplikat') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input wire:model.defer="masyarakat.nama" type="text" class="form-control">
                 @error('masyarakat.nama')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input wire:model.defer="masyarakat.username" type="text" class="form-control">
                 @error('masyarakat.username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @if (session()->has('username_duplikat'))
                    <span class="text-danger">{{ session('username_duplikat') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Passowrd</label>
                <input wire:model.defer="masyarakat.password" type="text" class="form-control">
                 @error('masyarakat.password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary">tambah</button>
                <div wire:loading wire:target="tambah">Loading...</div>
            </div>
        </form>
    </div>
</div>