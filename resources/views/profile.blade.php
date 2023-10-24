@extends('layouts.master')
@section('content')
<div class="flex flex-col w-full gap-4">
    <div class="card">
        <div class="profiles-title flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#003034" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
            <p class="card-title">My Profile</p>
        </div>
        <div class="description">
            <p class="card-desc text-center">
                Name: {{ Auth::user()->name }}
            </p>
            <p class="card-desc text-center">
                Joined Date : {{ Auth::user()->created_at }}
            </p>

        </div>
    </div>
    <div class="card grid grid-cols-12">
        <p class="card-title col-span-12">Mutation History</p>
        @foreach ($transactions as $transaction)
        <div class="card col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3 h-full justify-start">
            <p class="card-title">{{ $transaction->created_at }}</p>
            <p class="card-subtitle">{{ $transaction->status }}</p>
            <p class="card-desc text-center">{{ $transaction->product->name }}</p>
            <p class="card-price">Rp {{ $transaction->price }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection