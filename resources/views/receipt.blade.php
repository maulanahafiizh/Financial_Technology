<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>
    <style>
        @media print {
            #back-to-home {
                display: none;
            }
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body class="p-4">
    <div class="card">
        <img src="{{ asset('images/static/logo-sekolah.png') }}" alt="Logo" class="h-14">
        <div class="flex flex-col gap-5 items-center justify-center w-full">
            <p class="card-title">Top Up Berhasil!</p>
            {{ $currentTopUp->qr_code }}
            <p class="card-subtitle">Tunjukkan ke teller</p>
            <div class="card text-justify items-start">
                <div class="flex flex-col">
                    <p class="card-subtitle font-normal">Total Harga</p>
                    <p class="card-title">{{ format_to_rp($currentTopUp->nominals) }}</p>
                </div>
                <div class="flex flex-col">
                    <p class="card-subtitle font-normal">Kode Top Up</p>
                    <p class="card-title">{{ $currentTopUp->unique_code }}</p>
                </div>
                <div class="flex flex-col">
                    <p class="card-subtitle font-normal">Tanggal</p>
                    <p class="card-title">{{ $currentTopUp->created_at }}</p>
                </div>
            </div>
            <p class="card-subtitle font-normal">Terima kasih <b>{{ Auth::user()->name }}</b></p>
            <div class="grid grid-cols-2 gap-3">
                <button id="back-to-home" onclick="window.location.href = '/'" class="button">Kembali</button>
                <button id="back-to-home" onclick="window.print()" class="button">Cetak</button>
            </div>
        </div>
    </div>

    <script>
        window.print()
    </script>
</body>

</html>