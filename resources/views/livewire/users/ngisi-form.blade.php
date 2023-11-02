<div>
    <div class="container-home">
        <p class="judul" style="word-wrap: normal">
            {{ $form->title }}
        </p>
    </div>

    <div class="kotak1 rounded-3">
        <p class="judulsurat">
            Pengajuan surat
        </p>
        <hr class="hr" style="margin-top:6px;" />
        <div class="ketsurat">
            Silahkan isi form dibawah ini. Form ini diperuntukkan untuk pengajuan {{ $form->title }} di Desa Cikaso.
        </div>
    </div>

    <form wire:submit.prevent="submit">
        <div class="container-home">

            @foreach ($fields as $field)
                <div class="kotakcyan">
                    <p class="headerattach">
                        <label for="{{ $field['id'] }}">{{ $field['title'] }}</label>
                    </p>
                </div>
                <div class="kotakattach mb-4">
                    <input type="{{ $field['type'] }}" class="form-control" id="{{ $field['id'] }}"
                        name="{{ $field['id'] }}" placeholder="{{ $field['description'] }}"
                        wire:model="fields.{{ $loop->index }}.value">
                </div>
                @error("fields.{{ $loop->index }}.value")
                    <span class="error">{{ $message }}</span>
                @enderror
            @endforeach
            <div class="text-end" style="margin-top:27px;">
                <button class="headerattach btnajukan ">Ajukan Surat <i class="fa-solid fa-arrow-right"></i> </button>
            </div>
        </div>
    </form>
</div>
