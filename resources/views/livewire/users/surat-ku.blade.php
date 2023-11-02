<div>
    <div class="container-home">
        <p class="judul">
            Suratku
        </p>
    </div>

    <div class="kotak1 rounded-3" style="">
        <p class="subjudul"> Lacak Surat </p>
        <p class="isi">Di halaman ini akan tercantum semua surat-surat yang sudah anda ajukan. Suratmu akan
            segera diproses dan dicetak, Silahkan mengecek progres surat untuk pengambilan!</p>
    </div>

    <div class="kotak1 rounded-3">

        @foreach ($surat as $s)
            <div class="row mb-4">
                <div class="flex items-center">
                    <div>
                        <img src="{{ asset('img/surat.png') }}" alt="">
                    </div>
                    <div class="w-full text-center">
                        <b>{{ $s->Forms->title }}</b>
                    </div>

                </div>
                <hr class="hr" />
                <div class="flex flex-col justify-center h-full my-auto">
                    <div>
                        {{ $s->created_at->isoFormat('D MMMM Y') }}
                    </div>
                    <div>
                        {{ $s->Statuses->description }}
                    </div>
                    <a href="{{ route('form.my.view', ['id' => $s->id]) }}">
                        <button class="btn-daftar rounded-3" type="submit"> Cek Surat </button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container-home">
        <a href="{{ url('/home') }}">
            <button class="btn-daftar rounded-3" type="submit"> Kembali ke Home </button>
        </a>
    </div>
</div>
