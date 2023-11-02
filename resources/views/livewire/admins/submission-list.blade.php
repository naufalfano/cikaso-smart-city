<div>
    <div class="container-home">
        <p class="judul">
            Semua Surat
        </p>
    </div>

    <div class="kotakadmin">
        <div class="row">
            <div class="col-1   ">
                <i class="fa-regular fa-envelope fa-xl mt-3"></i>
            </div>
            <div class="col-11">
                <p class="judulsurat ms-2 mt-1">
                    Semua Surat
                </p>
            </div>
        </div>

        @foreach ($submissions as $submission)
            <div class="row mt-8">
                <div class="flex items-center">
                    <div>
                        <img src="{{ asset('img/surat.png') }}" alt="">
                    </div>
                    <div class="w-full text-center">
                        <b>{{ $submission->Forms->title }}</b>
                    </div>

                </div>
                <hr class="hr" />
                <div class="flex flex-col justify-center h-full my-auto">
                    <div>
                        <b>{{ $submission->nik }}</b>
                    </div>
                    <div>
                        {{ $submission->created_at->isoFormat('D MMMM Y') }}
                    </div>
                    <div>
                        {{ $submission->Statuses->description }}
                    </div>
                    <a href="{{ route('submissions.preview', ['id' => $submission->id]) }}">
                        <button class="btn-daftar rounded-3" type="submit"> Cek Surat </button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
