<div>
    <div class="container-home">
        <p class="judul">
            Pengecekan Surat <br> Pengajuan
        </p>
    </div>

    <div class="kotak1 rounded-3" style="margin-top:-0.7rem;">
        <p class="judulsurat">
            <i class="fa-regular fa-envelope"></i>
            {{ $submission->title }}
        </p>
        <hr class="hr" />
        <p class="subjudulbiru">
            Penerimaan Surat Ajuan
        </p>
        <p>
            Status : <b>{{ $submission->Statuses->description }}</b>
        </p>

        <div>
            @foreach ($fields as $field)
                <div class="dtdiri">
                    <label for="{{ $field->Fields->id }}">{{ $field->Fields->title }}</label>
                </div>
                <div class="isidtdiri mt-2">
                    @if ($field->Fields->FieldTypes->type == 'text')
                        <input type="text" class="form-control formgaris" id="{{ $field->Fields->id }}"
                            name="{{ $field->Fields->id }}" placeholder="{{ $field->Fields->description }}"
                            value="{{ $field->entry }}" disabled>
                    @elseif ($field->Fields->FieldTypes->type == 'file')
                        <embed src="{{ url($field->entry) }}"
                            type="{{ explode('.', $field->entry)[1] == 'pdf' ? 'application/pdf' : 'image/jpg' }}"
                            width="100%" height="120px" />
                    @endif
                </div>
            @endforeach

            @if ($submission->Statuses->id == 1)
                <button wire:click="accept" class="btn-daftar rounded-3 mt-4"> Terima Berkas </button>
                <button wire:click="reject" class="btn-daftar rounded-3 mt-4 red"> Tolak Berkas </button>
            @elseif ($submission->Statuses->id == 2)
                <button wire:click="getDocx" class="btn-daftar rounded-3 mt-4">Print Berkas</button>
                <button wire:click="sign" class="btn-daftar rounded-3 mt-4">Sudah ditandatangani</button>
            @endif
        </div>
    </div>
</div>
