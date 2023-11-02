<div>
    <div class="container-home">
        <p class="judul" style="word-wrap: normal">
            {{ $surat->Forms->title }}
        </p>
    </div>

    <div class="kotak1 rounded-3">
        <p class="judulsurat">
            Review permohonan surat
        </p>
        <hr class="hr" style="margin-top:6px;" />
        <div class="ketsurat">
            Berikut adalah data-data yang telah diisi oleh anda untuk pengajuan {{ $surat->Forms->title }}, mohon tunggu
            karena pengajuan sedang diproses.
            <br>
            Status saat ini : <b>{{ $surat->Statuses->description }}</b>
        </div>
    </div>

    <form wire:submit.prevent="submit">
        <div class="container-home">

            @foreach ($fields as $field)
                <div class="kotakcyan">
                    <p class="headerattach">
                        <label for="{{ $field->Fields->id }}">{{ $field->Fields->title }}</label>
                    </p>
                </div>
                <div class="kotakattach mb-4">
                    @if ($field->Fields->FieldTypes->type == 'text')
                        <input type="text" class="form-control" id="{{ $field->Fields->id }}"
                            name="{{ $field->Fields->id }}" placeholder="{{ $field->Fields->description }}"
                            wire:model="fields.{{ $loop->index }}.entry">
                    @elseif ($field->Fields->FieldTypes->type == 'file')
                        <embed src="{{ url($field->entry) }}" class="form-control" width="100%" height="171px"
                            type="{{ explode('.', $field->entry)[1] == 'pdf' ? 'application/pdf' : 'image/jpg' }}"
                            onclick="window.location.href = '{{ url($field->entry) }}'" />
                    @endif
                </div>
            @endforeach
        </div>
    </form>
</div>
