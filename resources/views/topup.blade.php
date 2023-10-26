@extends('layouts.master')
@section('content')
<div id="load" class="flex flex-col items-center justify-center !hidden">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <p class="text-xl font-semibold">Top Up Dalam Proses</p>
</div>

<div id="success-topup" class="top-up-success flex card !hidden">
    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z" />
        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z" />
    </svg>
    <h1 class="card-title">Top Up Berhasil</h1>
    <p id="unique-code" class="card-subtitle"></p>
    <p id="user-name" class="card-desc text-center"></p>
    <p id="nominals"></p>
    <form action="{{ route('receipt') }}" method="POST" class="w-full">
        @csrf
        <input id="unique-code-value" type="hidden" name="unique_code" value="">
        <button type="submit" class="button w-full">
            <p>Print</p>
        </button>
    </form>
</div>

<div class="content-top-up flex flex-col gap-5">
    <div class="flex flex-col gap-1">
        <a href="/" class="back flex items-center gap-2 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg>
            <p>Back</p>
        </a>
        <div class="title">
            <h1 class="text-2xl font-semibold">Top Up</h1>
        </div>
    </div>

    <div class="flex flex-col md:flex-row gap-3">
        <div class="card md:w-10/12 h-fit nominals">
            <p class="card-title">Pilih Nominal</p>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 w-full ">
                <div class="card gap-2 p-3 relative active:bg-gray-300">
                    <input type="checkbox" value="10000" name="10" id="10" class="nominal-checkbox w-full h-full absolute opacity-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                    </svg>
                    <p class="font-semibold">{{ format_to_rp(10000) }}</p>
                </div>
                <div class="card gap-2 p-3 relative active:bg-gray-300">
                    <input type="checkbox" value="20000" name="20" id="20" class="nominal-checkbox w-full h-full absolute opacity-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                    </svg>
                    <p class="font-semibold">{{ format_to_rp(20000) }}</p>
                </div>
                <div class="card gap-2 p-3 relative active:bg-gray-300">
                    <input type="checkbox" value="50000" name="50" id="50" class="nominal-checkbox w-full h-full absolute opacity-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                    </svg>
                    <p class="font-semibold">{{ format_to_rp(50000) }}</p>
                </div>
                <div class="card gap-2 p-3 relative active:bg-gray-300">
                    <input type="checkbox" value="100000" name="100" id="100" class="nominal-checkbox w-full h-full absolute opacity-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                    </svg>
                    <p class="font-semibold">{{ format_to_rp(100000) }}</p>
                </div>
                <div class="card gap-2 p-3 relative active:bg-gray-300">
                    <input type="checkbox" value="300000" name="300" id="300" class="nominal-checkbox w-full h-full absolute opacity-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                    </svg>
                    <p class="font-semibold">{{ format_to_rp(300000) }}</p>
                </div>
                <div class="card gap-2 p-3 relative active:bg-gray-300">
                    <input type="checkbox" value="500000" name="500" id="500" class="nominal-checkbox w-full h-full absolute opacity-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                    </svg>
                    <p class="font-semibold">{{ format_to_rp(500000) }}</p>
                </div>
                <div class="card gap-2 p-3 relative active:bg-gray-300">
                    <input type="checkbox" value="1000000" name="1000" id="1000" class="nominal-checkbox w-full h-full absolute opacity-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                    </svg>
                    <p class="font-semibold">{{ format_to_rp(1000000) }}</p>
                </div>
            </div>
        </div>

        <div class="card md:w-auto h-fit">
            <h1 class="card-subtitle">Jumlah Top up</h1>
            <p class="card-title"><span id="top-up-sum">0</span></p>
            <button disabled="true" id="top-up-submit" type="submit" class="button w-full">
                Top Up
            </button>
        </div>
    </div>
</div>


@endsection