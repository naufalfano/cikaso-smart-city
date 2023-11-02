<div class="container-signin">
    <div class="text-center">
        <img src="{{ asset('img/logo.png') }}" alt="" style="width:auto; height:auto">
    </div>
    <h1 style="padding: top 14px; padding-bottom:25px; text-align:center;">
        Selamat datang!
    </h1>
    <p class="txtlogin">
        Silakan masuk dengan Username/ID dan Password Anda
    </p>
    <form wire:submit.prevent="login">
        <div class="" style="padding-bottom:24px;">
            <label for="" class="ms-2 position-absolute" style="margin-top: -0.70rem; margin-left:32px;">
                <span class="bg-white px-1" style="font-size:12px; font-color:#49454F">NIK</span>
            </label>
            <input name="nik" type="text" class="form-control" placeholder="NIK" wire:model="nik"
                style="border-style:solid; border-width:2px; border-color:#97CBCC;">

            @error('nik')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="" style="padding-bottom:24px;">
            <label for="" class="ms-2 position-absolute" style="margin-top: -0.70rem; margin-left:32px;">
                <span class="bg-white px-1" style="font-size:12px; font-color:#49454F">Tanggal Lahir</span>
            </label>
            <input type="date" name="tanggal-lahir" class="form-control" placeholder="" wire:model="tanggal_lahir"
                style="border-style:solid; border-width:2px; border-color:#97CBCC;">
            @error('tanggal_lahir')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn-daftar rounded-3" type="submit">
            Login
        </button>
    </form>
    <div class="logasadmin text-center">
        <p>
            <a href="{{ url('/admin/login') }}">Login sebagai admin</a> <br> Belum punya akun? <a
                href="{{ url('/register') }}">Daftar disini</a>
        </p>
    </div>




</div>
