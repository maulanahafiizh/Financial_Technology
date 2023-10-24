@extends('layouts.master')
@section('content')

<div class="login hidden z-50 bg-white w-10/12 fixed -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2 card max-w-xl p-5 gap-3">
    <div id="close-btn" class="close group self-end">
        <svg class="group-hover:fill-red-500 group-focus:fill-red-500" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg>
    </div>
    <p class="card-title">Login</p>
    <div class="login-error hidden text-center w-full mt-2 bg-red-200 py-2 rounded-md">
        <p>Username or Password Incorrect!</p>
    </div>
    <div class="login-forms mt-4">
        <form class="flex flex-col gap-5">
            <div class="user-id flex flex-col gap-3">
                <label for="" class="card-subtitle">Username</label>
                <input id="user-id" class="w-full focus:outline-none border-2 border-blue-500 focus:border-blue-700 p-2 rounded-xl selection:bg-blue-500 selection:text-white" type="text" placeholder="Enter Your Username ">
            </div>
            <div class="user-password flex flex-col gap-3">
                <label for="" class="card-subtitle">Password</label>
                <input type="password" id="user-password" class="w-full focus:outline-none border-2 border-blue-500 focus:border-blue-700 p-2 rounded-xl selection:bg-blue-500 selection:text-white" type="text" placeholder="Enter Your Password">
            </div>
            <button id="submit-login" class="button">Submit</button>
        </form>
        <div class="user-remember flex flex-col items-center gap-2 mt-6">
            <p>Doesn't Have An Account?</p>
            <button class="text-blue-500">Register Here</button>
        </div>
    </div>
</div>

<div class="success-addproduct hidden fixed z-50 w-10/12 -translate-x-1/2 left-1/2 overflow-hidden card">
    <div id="close-btn-successaddproduct" class="close group self-end">
        <svg class="group-hover:fill-red-500" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
        </svg>
    </div>
    <h1 class="text-xl font-semibold">Added Successfully!</h1>
    <div class="products flex items-center gap-5 w-full overflow-hidden justify-center">
        <div class="product-name flex items-center justify-center w-full">
            <p class="text-gray-600" id="success-product-name"></p>
            <a href="{{ route('cart.index') }}" class="see-cart button">
                See Cart
            </a>
        </div>
    </div>
</div>

<div class="card">
    @if (Auth::user())
    <p class="card-subtitle">Saldomu</p>
    @foreach (Auth::user()->wallet as $user_wallet)
    <h1 class="card-title">
        {{ format_to_rp($user_wallet->credit) }}
    </h1>
    @endforeach
    <div class="grid grid-cols-2 gap-3">
        <a href="{{ route('topup.index')}}" class="top-up button flex flex-row items-center justify-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z" />
            </svg>
            Top Up
        </a>
        <div class="transfer button flex flex-row items-center justify-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
            </svg>
            Transfer
        </div>
    </div>
    @else
    <div class="card-title">
        Masuk untuk melihat saldomu!
    </div>
    @endif
</div>

<div class="card grid grid-cols-12">
    <p class="card-title col-span-12">Katalog Produk</p>
    @foreach ($products as $product)
    <div class="card h-full justify-start col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3">
        <p class="card-subtitle">{{ $product['name'] }}</p>
        <div class="card-body">
            <img src="{{ $product['photo'] }}" alt="Es Nasi" class="w-96 aspect-video">
            <p class="card-price">Harga: {{ format_to_rp($product->price) }}</p>
            <p class="card-desc">{{ $product['desc'] }}</p>
            <form class="flex items-center justify-center gap-2 justify-self-end">
                <input name="quantity" id="quantity" class="w-14 py-1 px-2 mt-2 bg-gray-100 shadow-lg border-2" type="number" min="1" value="1">
                <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                <button data-islogined="@php if(Auth::user()) echo 'logined'; else echo 'not-logined' ; @endphp" id="{{ $product->id }}" type="button" class="add-to-cart button">
                    Tambahkan
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>

@endsection