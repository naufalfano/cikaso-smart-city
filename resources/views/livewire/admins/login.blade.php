<div class="container-signin">
    <div class="text-center">
        <img src="{{ asset('img/logo.png') }}" alt="" style="width:auto; height:auto">
    </div>
    <h1 style="padding: top 14px; padding-bottom:25px; text-align:center;">
        Login Admin
    </h1>
    <p class="txtlogin">
        Silakan masuk dengan Username/ID dan Password Anda
    </p>
    <form wire:submit.prevent="login">
        <div class="" style="padding-bottom:24px;">
            <label for="" class="ms-2 position-absolute" style="margin-top: -0.70rem; margin-left:32px;">
                <span class="bg-white px-1" style="font-size:12px; font-color:#49454F">Username/ID</span>
            </label>
            <input name="username" type="text" placeholder="Username" wire:model="username" class="form-control"
                style="border-style:solid; border-width:2px; border-color:#97CBCC;">
            @error('username')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="" style="padding-bottom:24px;">
            <label for="" class="ms-2 position-absolute" style="margin-top: -0.70rem; margin-left:32px;">
                <span class="bg-white px-1" style="font-size:12px; font-color:#49454F">Password</span>
            </label>
            <input name="password" type="password" wire:model="password" class="form-control"
                style="border-style:solid; border-width:2px; border-color:#97CBCC;">
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn-daftar rounded-3" type="submit"> Login </button>
    </form>
</div>
