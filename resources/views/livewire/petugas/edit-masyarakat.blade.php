<div class="container-fluid">
   <div class="row d-flex justify-content-between">
    <div class="col-md-6 border  rounded bg-white p-4">
        <h2>{{ __('Edit Masyarakat') }}</h2>
        <hr>
        <form wire:submit.prevent="update" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" wire:model.defer="masyarakat.nama" value="{{ $masyarakat['nama'] ?? '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" wire:model.defer="masyarakat.username" value="{{ $masyarakat['username'] ?? '' }}" class="form-control">
                @error('masyarakat.username')
                <i class="text-danger">{{$message}}</i>
                @enderror

                @if (session()->has('username_duplikat'))
                    <span class="text-danger">{{ session('username_duplikat'); }}</span>
                @endif
             
            </div>
            <div class="mt-3">
                <button name="kirim" class="btn btn-primary">UPDATE</button>
                <span wire:loading wire:target="update">Loading...</span>
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
                <input type="text" wire:model.defer="passwordUpdate.password" class="form-control">
                @error('passwordUpdate.password')
                <i class="text-danger">{{$message}}</i>
                @enderror
            </div>

            <div class="form-group">
                <label for="ketikan_ulang">Ketikan Ulang Password Baru</label>
                <input wire:model.defer="passwordUpdate.password_confirmation" type="text" class="form-control">
                @error('passwordUpdate.password_confirmation')
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
    window.addEventListener('password_berahsil_di_update', function(){
        alert("Password Berhasil di update");
    });
    window.addEventListener('masyarakat_berhasil_di_update', function(){
        alert("Data Masyarakat berhasil di update");
    })
</script>