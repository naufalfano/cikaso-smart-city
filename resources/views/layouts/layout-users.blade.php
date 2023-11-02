<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- <script defer src="{{ asset('js/cdn.min.js') }}"></script> --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @livewireStyles

    <style>
        .hitam {
            color: #1D1B20;
        }

        .biru {
            color: #01B7BB;
        }

        a {
            text-decoration: none;
        }

        .error {
            color: red;
        }

        .link {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }

        #body {
            display: flex-column;
            justify-content: center;
            background-color: #F8FAFF;
            height: 0px;
            position: absolute;
            left: 50%;
            top: 1%;
            transform: translate(-50%, -50%);
            background: url('/img/bg-desa1.png');
            background-width: 100%;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container-signin {
            padding-right: 20px;
            padding-left: 20px;
            padding-top: 21px;
            padding-bottom: 20px;
        }

        .container-home {
            padding: 20px 16px 20px;
        }

        .h1-signin {
            font-size: 30px;
            font-family: "Roboto";
            font-style: bold;
        }

        .btn-daftar {
            width: 100%;
            height: 32px;
            background-color: #01B7BB;
            color: #ffffff;
            border-style: none;
            font-family: "Roboto";
            font-style: bold;
        }

        .txtlogin {
            font-family: Roboto;
            font-size: 16px;
            font-style: medium;
            font-weight: 500;
            line-height: 24px;
            /* 150% */
            letter-spacing: 0.25px;
            text-align: left;
            padding-left: 20px;
            padding-right: 20px;
        }

        .formlogin {
            border-style: solid;
            border-width: 2px;
            border-color: #97CBCC;
            padding-bottom: 24px;
        }

        .kotak1 {
            margin-top: 25px;
            margin-left: 16px;
            margin-right: 16px;
            background-color: #fff;
            min-height: 160px;
            max-height: auto;
            width: 328px;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.05);
            padding-left: 16px;
            padding-top: 12px;
            padding-right: 16px;
            padding-bottom: 12px;
        }

        .kotak2 {
            margin-top: 36px;
            margin-left: 16px;
            margin-right: 16px;
            margin-bottom: 36px;
            background-color: #fff;
            height: 106px;
            width: 328px;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.05);
            padding: 12px 16px 12px;
        }

        .kotak3 {
            width: 328px;
            height: auto;
            padding: 12px 7px 12px;
            border-radius: 10px;
            background: #FFF;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.05);
        }

        .kotak4 {
            margin-top: 24px;
            width: 328px;
            height: 64px;
            flex-shrink: 0;
            padding: 22px 15px 22px;
            background: #FFFFFF;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.05);
        }

        .kotak5 {
            margin-top: 24px;
            width: 328px;
            height: 40px;
            flex-shrink: 0;
            border-radius: 10px;
            background: rgba(255, 9, 9, 0.10);
            padding: 8px;
        }

        .kotak6 {
            padding: 9px;
            width: 328px;
            height: 90px;
            flex-shrink: 0;
            border-radius: 10px;
            background: #FFFFFF;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.05);
        }

        .kotakcyan {
            width: 328px;
            flex-shrink: 0;
            border-radius: 10px 10px 0px 0px;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.05);
            background: #01B7BB;
            padding: 12px 16px 12px;
        }

        .kotakattach {
            width: 328px;
            height: auto;
            flex-shrink: 0;
            border-radius: 0px 0px 10px 10px;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.05);
            background: #FFFFFF;
            padding: 4px 15px 4px;
        }

        .kotakkecil {
            width: 156px;
            height: 120px;
            flex-shrink: 0;
            border-radius: 10px;
            background: #FFF;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.10);
            margin-left: 16px;
            margin-bottom: 16px;
            padding: 12px;
        }

        .kotakadmin {
            width: 360px;
            min-height: 60px;
            height: auto;
            flex-shrink: 0;
            background: #FFF;
            padding: 16px;
            padding-bottom: 40px;
        }

        .judul {
            color: #FFF;
            font-family: Roboto;
            font-size: 30px;
            font-style: normal;
            font-weight: 500;
            line-height: 40px;
            /* 133.333% */
            letter-spacing: 0.25px;
            margin-left: 16px;
        }

        .judulhome {
            color: #FFF;
            font-family: Roboto;
            font-size: 30px;
            font-style: normal;
            font-weight: 500;
            line-height: 40px;
            /* 133.333% */
            letter-spacing: 0.25px;
            margin-left: 16px;
            margin-top: 20px;
        }

        .subjudul {
            color: var(--m-3-sys-light-on-surface, #1D1B20);
            font-family: Roboto;
            font-size: 16px;
            font-style: normal;
            font-weight: 700;
            line-height: 24px;
            /* 150% */
            letter-spacing: 0.5px;
        }

        .judulsurat {
            color: #1D1B20;
            font-family: Roboto;
            font-size: 24px;
            font-style: normal;
            font-weight: 500;
            line-height: 24px;
            /* 166.667% */
            letter-spacing: 0.25px;
        }

        .ketsurat {
            color: var(--m-3-sys-light-on-surface-variant, #49454F);
            font-family: Roboto;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            /* 142.857% */
            letter-spacing: 0.25px;
        }

        .isi {
            color: var(--m-3-sys-light-on-surface-variant, #49454F);
            /* M3/body/medium */
            font-family: Roboto;
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            /* 142.857% */
            letter-spacing: 0.25px;
        }

        .lck {
            margin-top: 8px;
            color: #01B7BB;
            text-align: center;
            font-family: Roboto;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: 24px;
            /* 150% */
            letter-spacing: 0.5px;

        }

        .nama {
            color: var(--m-3-sys-light-on-surface, #1D1B20);
            /* M3/title/medium */
            font-family: Roboto;
            font-size: 16px;
            font-style: medium;
            font-weight: 500;
            line-height: 24px;
            /* 150% */
            letter-spacing: 0.15px;
        }

        .nohp {
            color: #777777;
            font-family: Roboto;
            font-size: 14px;
            font-style: medium;
            font-weight: 500;
            line-height: 20px;
            /* 142.857% */
            letter-spacing: 0.25px;
        }

        .alamat {
            color: #777777;
            font-family: Roboto;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            /* 166.667% */
            letter-spacing: 0.25px;
        }

        .jdlsurat {
            align-self: stretch;
            color: #49454F;
            /* M3/title/medium */
            font-family: Roboto;
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            line-height: 24px;
            /* 150% */
            letter-spacing: 0.15px;
        }

        .logasadmin {
            color: #01B7BB;
            font-family: Roboto;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            /* 166.667% */
            letter-spacing: 0.25px;
            padding: 16px 0px 10px;
        }

        .dtdiri {
            color: #49454F;
            /* M3/body/small */
            font-family: Roboto;
            font-size: 12px;
            font-style: normal;
            font-weight: 400;
            line-height: 16px;
            /* 133.333% */
            margin-top: 13px;
        }

        .isidtdiri {
            width: 236px;
            color: var(--m-3-sys-light-on-surface, #1D1B20);
            font-family: Roboto;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 24px;
            /* 150% */
            letter-spacing: 0.15px;
        }

        .formgaris {
            width: 296px;
            border-width: 1px;
            border-style: solid;
            border-color: #CAC4D0;
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
            border-radius: 0;
        }

        .headerattach {
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 16px;
            font-style: normal;
            font-weight: 600;
            line-height: 24px;
            /* 150% */
            letter-spacing: 0.5px;
        }

        .btnajukan {
            width: 180px;
            height: 32px;
            flex-shrink: 0;
            border-radius: 10px;
            background: #01B7BB;
            border: 0px;
        }

        .juduladmin {
            color: #1D1B20;
            font-family: Roboto;
            font-size: 24px;
            font-style: normal;
            font-weight: 500;
            line-height: 24px;
            /* 100% */
            letter-spacing: 0.15px;
        }

        .jmlsurat {
            color: var(--m-3-sys-light-on-surface, #1D1B20);
            font-family: Roboto;
            font-size: 48px;
            font-style: normal;
            font-weight: 600;
            line-height: 20px;
            /* 41.667% */
            letter-spacing: 0.5px;
        }

        .desckotak {
            color: var(--m-3-sys-light-on-surface, #1D1B20);
            font-family: Roboto;
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            /* 125% */
            letter-spacing: 0.5px;
        }

        .subjudulbiru {
            color: #01B7BB;
            font-family: Roboto;
            font-size: 20px;
            font-style: normal;
            font-weight: 500;
            line-height: 24px;
            /* 120% */
            letter-spacing: 0.15px;
        }

        .namanik {
            margin-left: -1rem;
            color: #49454F;
            /* M3/title/medium */
            font-family: Roboto;
            font-size: 16px;
            font-style: normal;
            font-weight: 500;
            line-height: 24px;
            /* 150% */
            letter-spacing: 0.15px;
        }

        .red {
            background-color: #E05634
        }

        .merah {
            color: #E05634
        }
    </style>
</head>

<body id="body">
    <a href="{{ url()->previous() }}">
        <i class="fa-solid fa-arrow-left" style="color: #ffffff;padding-top:22px;padding-left:22px;"></i>
    </a>

    {{ $slot }}

    @livewireScripts
    @if (session('toastr-toast'))
        <script defer>
            // wait for document ready
            document.addEventListener('DOMContentLoaded', function() {
                toastrToast({
                    type: "{{ session('toastr-toast')['type'] }}",
                    title: "{{ session('toastr-toast')['title'] }}",
                    text: "{{ session('toastr-toast')['text'] }}",
                })
            }, false);
        </script>
    @endif
</body>

</html>
