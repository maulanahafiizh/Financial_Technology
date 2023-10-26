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

            .cetak-hanya-ini {
                display: block;
            }
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body class="p-4">
    <div id="invoice" class="card">
        <img src="{{ asset('images/static/logo-sekolah.png') }}" alt="Logo" class="h-14">
        <div class="flex flex-col gap-5 items-center justify-center w-full">
            <p class="card-title">Pembayaran Berhasil!</p>
            {{ $currentTransactions->qr_code }}
            <div class="flex flex-col gap-1">
                <p class="card-desc">Pembayaran dengan total</p>
                <p class="card-price">{{ format_to_rp($currentTransactions->total_prices) }}</p>
            </div>
            <table class="w-full">
                <tr>
                    <th class="border-[1.5px] border-black p-2">No</th>
                    <th class="border-[1.5px] border-black p-2">Nama Produk</th>
                    <th class="border-[1.5px] border-black p-2">Jumlah</th>
                    <th class="border-[1.5px] border-black p-2">Harga Total</th>
                </tr>
                @foreach ($currentTransactions as $transaction)
                <tr>
                    <td class="border-[1.5px] border-black p-2">{{ $transaction->id }}</td>
                    <td class="border-[1.5px] border-black p-2">{{ $transaction->product->name }}</td>
                    <td class="border-[1.5px] border-black p-2">{{ $transaction->quantity }}</td>
                    <td class="border-[1.5px] border-black p-2">{{ format_to_rp($transaction->price) }}</td>
                </tr>
                @endforeach
            </table>
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