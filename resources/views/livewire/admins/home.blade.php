<div>
    <div class="container-home">
        <p class="judul">
            Aplikasi Pelayanan <br> Desa Cikaso
        </p>
    </div>

    <div class="kotak1 rounded-3" style="">
        <div class="row">
            <div class="col me-0 mb-0">
                <p class="subjudul mb-0">
                    Fitur admin <img src="{{ asset('img/admin_settings.png') }}" alt="">
                </p>
            </div>
            <div class="col me-0 ms-0 mt-2 text-end">
                <img src="{{ asset('img/lacak.png') }}">
            </div>
        </div>
        <div class="isi" style="margin-top:-0.70rem">
            <ul>
                <li>List surat masuk</li>
                <li>Progres verifikasi</li>
                <li>Edit template surat</li>
                <li>Database dan berkas <br> pengajuan surat</li>
            </ul>
        </div>
        <div class="lck">
            <a href="{{ route('submissions') }}" class="biru">
                <label style="display: flex;justify-content: center;align-items: center;">
                    Lihat Semua Surat
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
            Dashboard
        </p>
        <div class="row">
            <div class="col-5 kotakkecil">
                <div class="jmlsurat mt-2">
                    <div class=row>
                        <div class="col-7">
                            {{ $total_diterima }}
                        </div>
                        <div class="col-5">
                            <i class="fa-solid fa-envelope fa-xs"></i>
                        </div>
                    </div>
                    <div class="desckotak mt-4">
                        Surat diterima
                    </div>
                </div>
            </div>

            <div class="col-5 kotakkecil ">
                <div class="jmlsurat mt-2">
                    <div class=row>
                        <div class="col-7">
                            {{ $total_ditolak }}
                        </div>
                        <div class="col-5">
                            <i class="fa-regular fa-circle-xmark fa-xs"></i>
                        </div>
                    </div>
                    <div class="desckotak mt-4">
                        Surat yang ditolak
                    </div>
                </div>
            </div>
            <div class="col-5 kotakkecil">
                <div class="jmlsurat mt-2">
                    <div class=row>
                        <div class="col-7">
                            {{ $total_sedang_tanda_tangan }}
                        </div>
                        <div class="col-5">
                            <i class="fa-regular fa-circle-check fa-xs"></i>
                        </div>
                    </div>
                    <div class="desckotak mt-4">
                        Sedang ditandatangani
                    </div>
                </div>
                </a>
            </div>
            <div class="col-5 kotakkecil">
                <div class="jmlsurat mt-2">
                    <div class=row>
                        <div class="col-7">
                            {{ $total_siap_cetak }}
                        </div>
                        <div class="col-5">
                            <i class="fa-solid fa-envelope-open fa-xs"></i>
                        </div>
                    </div>
                    <div class="desckotak mt-4">
                        Surat siap cetak
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="kotak5 mb-4">
                    <a href="{{ url('/logout') }}" class="text-danger text-center">Keluar Akun</a>
                </div>
            </div>
        </div>
    </div>
</div>
