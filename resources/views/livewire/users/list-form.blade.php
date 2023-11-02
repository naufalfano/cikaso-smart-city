<div>
    <div class="container-home">
        <p class="judul">
        <div class="judulhome">
            Aplikasi Pelayanan <br> Desa Cikaso
        </div>
        </p>
    </div>

    <div class="kotak1 rounded-3" style="">
        <div class="row">
            <div class="col me-0 mb-0">
                <p class="subjudul mb-0">
                    Pelacakan Surat
                </p>
            </div>
            <div class="col me-0 ms-0 mt-2 text-end">
                <img src="{{ asset('img/lacak.png') }}">
            </div>
        </div>
        <div class="isi" style="margin-top:-0.70rem">
            Anda dapat melacak status <br> Surat Pengajuan yang telah <br> anda buat dan telah <br>disubmit disini
        </div>
        <div class="lck">
            <a href="{{ route('form.my') }}" class="biru">
                <label style="display: flex;justify-content: center;align-items: center;">
                    Lacak Surat
                    <svg class="h-[26px] ms-1 mb-0.5" xmlns="http://www.w3.org/2000/svg" width="7" height="12"
                        viewBox="0 0 7 12" fill="none">
                        <path d="M1 1L5 6L1 11" stroke="#01B7BB" stroke-width="2" />
                    </svg>
                </label>
            </a>
        </div>
    </div>

    <div class="container-home">
        <p class="subjudul">
            Pengajuan Surat
        </p>
        <div class="kotak3">
            @foreach ($forms as $form)
                <a href="{{ route('form.isi', ['id' => $form->id]) }}" class="hitam">
                    <div class="row">
                        <div class="col-2 me-0" style="display: flex;align-items: center;">
                            <img src="{{ asset('img/surat.png') }}" alt="">
                        </div>
                        <div class="col-10" style="margin-left:-1rem;">
                            {{ $form->title }}
                        </div>
                    </div>
                </a>
                <hr class="hr" />
            @endforeach
        </div>
        <div class="kotak4">
            <div class="row">
                <div class="col-2">
                    <img src="{{ asset('img/wa.png') }}" alt="">
                </div>
                <div class="col-9" style="margin-left:-1rem;">
                    Kontak Pengurus Desa
                </div>
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12"
                        fill="none">
                        <path d="M1 1L5 6L1 11" stroke="#9C9D9F" stroke-width="2" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="kotak5">
            <a href="{{ url('/logout') }}" class="text-danger text-center">Keluar Akun</a>
        </div>
    </div>

</div>
