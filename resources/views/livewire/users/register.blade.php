<div class="container-signin">
    <h1 style="padding-bottom:18.75px;">
        Register
    </h1>

    <form wire:submit.prevent="register">
        <div class="" style="padding-bottom:24px;">
            <input name="nik" type="text" placeholder="NIK" wire:model="nik" class="form-control" placeholder="NIK"
                style="border-style:solid; border-width:2px; border-color:#97CBCC;">
            @error('nik')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <div class="" style="padding-bottom:33px;">
            <input name="tanggal-lahir" type="date" wire:model="tanggal_lahir" class="form-control"
                placeholder="Tanggal Lahir" style="border-style:solid; border-width:2px; border-color:#97CBCC;">
            @error('tanggal_lahir')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn-daftar rounded-3" type="submit"> Daftar </button>
    </form>
</div>
