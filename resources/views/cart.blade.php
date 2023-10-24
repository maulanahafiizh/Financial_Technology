@extends('layouts.master')
@section('content')
<a href="/" class="back flex items-center gap-2 cursor-pointer">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    <p>Back</p>
</a>
<div class="title">
    <h1 class="text-2xl font-semibold">Halaman Keranjang</h1>
</div>
<div class="container-cart flex flex-col lg:flex-row xl:flex-row gap-3">
    @if(count($carts))
    <div class="cart-list w-full grid grid-cols-1 sm:grid-cols-2 gap-3 lg:w-3/4 p-2 ">
        @foreach ($carts as $cart)
        <div class="card">
            <div class="product-img h-full w-full rounded-lg overflow-hidden">
                <img class="w-full h-full object-cover" src="{{ $cart->product->photo }}" alt="Gambar">
            </div>
            <div class="description">
                <p class="card-subtitle">{{ $cart->product->name }}</p>
                <p class="card-title price-products">{{ format_to_rp($cart->product->price) }}</p>
            </div>
            <div class="action right-4 bottom-4">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                    </svg>
                    <input data-old-value="0" id="{{ $cart->id }}" name="quantity" class="quantities w-14 py-1 px-2 bg-gray-100 shadow-lg border-2" type="number" min="1" value="{{ $cart->quantity }}">
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="price-list-balance w-full lg:w-1/2 flex flex-col gap-3">
        <div class="balance card">
            <p class="card-subtitle">Uangmu</p>
            @foreach (Auth::user()->wallet as $wallet)
            <p class="card-title">{{ format_to_rp($wallet->credit) }}</p>
            @endforeach
        </div>
        <div class="price-list card">
            <p class="text-xl font-semibold">Total Belanja</p>
            <div class="shoping-total">
                <p class="card-subtitle">Total Harga</p>
                <p class="card-title">{{ format_to_rp($total_prices) }}</p>
            </div>
            <form action="{{ route('cart.pay') }}" method="post" class="w-full">
                @method('PUT')
                @csrf
                <input type="hidden" name="transaction_id">
                <button class="button w-full">Bayar</button>
            </form>
        </div>
    </div>
    @else
    <div class="empty-cart card">
        <img src="{{ asset('images/static/keranjang-kosong.png') }}" alt="empty" class="h-48">
        <h1 class="card-subtitle">Kosong</h1>
    </div>
    @endif
</div>
@endsection