<div class="contaner-fluid">
    <h3>Tambah Petugas</h3>
    <div class="col-12 p-3 bg-white rounded border">
        @if (session()->has('error'))
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endif
        <form action="" method="POST" wire:submit.prevent="tambah">
            <div class="form-group">
                <label for="nama_petugas">Nama Petugas</label>
                <input wire:model.defer="petugas.nama_petugas" type="text" name="nama_petugas" class="form-control">
                @error('petugas.nama_petugas')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nomor Telepon</label>
                <input type="number" wire:model.defer="petugas.no_telp" name="no_telp" class="form-control">
                @error('petugas.no_telp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                 @if (session()->has('error_telpon'))
                    <span class="text-danger">{{ session()->get('error_telpon'); }}</span>
               @endif
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" wire:model.defer="petugas.username" name="username" class="form-control">
                @error('petugas.username')
                     <span class="text-danger">{{ $message }}</span>
               @enderror
               @if (session()->has('error_username'))
                    <span class="text-danger">{{ session()->get('error_username'); }}</span>
               @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input wire:model.defer="petugas.password" type="password" name="password" class="form-control">
                @error('petugas.password')
                       <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="Verification">Verification</label>
                <div class="checbox">
                    <input wire:model.defer="petugas.verification" @checked(true) type="radio" name="verification" value="Y" id="YA">
                    <label for="YA">YA</label>
                </div>
                <div class="checbox">
                    <input wire:model.defer="petugas.verification"  type="radio" name="verification" value="N" id="NO">
                    <label for="NO">NO</label>
                </div>
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <select wire:model.lazy="petugas.level" class="form-control" name="level" id="level">
                    <option value="petugas">Petugas</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="mt-4 mb-3">
                <button class="btn btn-success"><i class="fal fa-plus"></i>Tambah</button>
                <div wire:loading wire:target='tambah'>Loading...</div>
            </div>
        </form>
    </div>
</div>