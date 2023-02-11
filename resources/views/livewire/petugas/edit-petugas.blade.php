<div class="container-fluid">
 <div class="row d-flex justify-content-between">
    <div class="col-md-6 border  rounded bg-white p-4">
        <h2>{{ __('Edit Petugas') }}</h2>
        <hr>
        <form wire:submit.prevent="updatePetugas" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" wire:model.defer="dataPetugas.nama_petugas" value="{{ $dataPetugas['nama_petugas'] ?? '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" wire:model.defer="dataPetugas.username" value="{{ $dataPetugas['username'] ?? '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">No Hp</label>
                <input type="text" wire:model.defer="dataPetugas.no_telp" value="{{ $dataPetugas['no_telp'] ?? '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="level">level</label>
                <select wire:model.defer="dataPetugas.level" class="form-control" id="level">
                    @foreach ($role as $rol)
                    @if ($dataPetugas['level'] === $rol)
                    <option selected value="{{ $rol }}">{{ $rol }}</option>
                    @else
                    <option value="{{ $rol }}">{{ $rol }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <button name="kirim" class="btn btn-primary">UPDATE</button>
                <span wire:loading wire:target="updatePetugas">Loading...</span>
            </div>
        </form>
    </div>
    <div class="col-md-5 align-self-start border rounded bg-white p-4">
        <h1>{{ __('Password') }}</h1>
        <hr>
        <form method="POST" wire:submit.prevent="updatePassword" action="">
            @csrf
            <div class="form-group">
                <label for="password">Password Baru</label>
                <input type="text" wire:model.defer="password_setting.password" class="form-control">
                @error('password_setting.password')
                <i class="text-danger">{{$message}}</i>
                @enderror
            </div>

            <div class="form-group">
                <label for="ketikan_ulang">Ketikan Ulang Password Baru</label>
                <input wire:model.defer="password_setting.password_confirmation" type="text" class="form-control">
                @error('password_setting.password_confirmation')
                <i class="text-danger">{{$message}}</i>
                @enderror
            </div>
            <div class="mt-3">
                <button class="btn btn-danger">Ubah Password</button>
                <span wire:loading wire:target="updatePassword">Loading...</span>
            </div>
        </form>
    </div>
</div>
</div>
<script>
    window.addEventListener('password_hasben_changed', function(){
        alert("Password Berhasil di update");
    });
    window.addEventListener('petugas_hasben_edited', function(){
        alert("Data Petugas berhasil di update");
    })
</script>