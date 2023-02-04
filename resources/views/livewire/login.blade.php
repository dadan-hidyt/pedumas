<div class="col-md-4 mx-auto mt-5">
 <!-- panel start -->
 <div id="panel-1" class="panel auth">
   <div class="panel-hdr">
     <h3> LOGIN - {{ config('app.name') }} </h3>
   </div>
   <div class="panel-container show">
     <div class="panel-content">
       <div id="view">
        @if (session()->has('login_gagal'))
        <p class="alert alert-danger">{{ session('login_gagal') }}</p>
        @endif
        @if (session()->has('success_daftar'))
        <p class="alert alert-success">{{ session('success_daftar') }}</p>
        @endif
        <form action="" wire:submit.prevent="login">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" placeholder="Ketikan username anda!" wire:model="user.username" class="form-control" id="username" name="username">
            @error('user.username')
            <span class="form-title text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">password</label>
            <input type="password" placeholder="Ketikan password anda" class="form-control" wire:model="user.password" id="password" name="password">
            @error('user.password')
            <span class="form-title text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="login_sebagai">Login Sebagai</label>
            <select required wire:model="login_sebagai" class="form-control">
              <option value="masyakarat">Masyarakat</option>
              <option value="petugas">Petugas</option>
            </select>
          </div>
          <div class="mt-3 mb-3">
            <button class="btn btn-primary">LOGIN
              <div wire:loading wire:target='login' class="spinner-grow" style="height: 20px; width: 20px" role="status">
              </div></button>
            </div>
            <div class="mt-3">
              <span>Belum Ada akun?<a href="{{ route('daftar') }}">Daftar</a></span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- e:panel -->
</div>