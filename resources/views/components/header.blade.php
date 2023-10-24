<header class="bg-blue-900 shadow-lg sticky top-0 z-50">
    <div class="container mx-auto lg:px-12 py-4 px-4 flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-0">
        <div class="title-search flex items-center gap-4">
            <a href="/">
                <img src="{{ asset('images/static/logo-sekolah.png') }}" alt="SMK Negeri 10 Jakarta" class="h-12 xl:h-14">
            </a>
        </div>
        <div class="header-charts flex items-center gap-6">
            @if (Auth::user())
            <a href="{{ Auth::user() ? route('cart.index') : '/' }}" class="carts relative block">
                @if (Auth::user() && count(Auth::user()->transcations) >= 1)
                <div class="pulse w-3 h-3 animate-pulse bg-blue-500 rounded-full absolute right-0 top-0">
                </div>
                @endif
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="#fff" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
            </a>
            @endif
            @if (!Auth::user())
            <div class="header-menu grid grid-cols-2 items-center gap-4 font-semibold">
                <button id="login-btn" class="bg-blue-700 hover:bg-blue-800 px-4 py-2 rounded-lg text-white font-medium lg:text-xl">Login</button>
                <button class="bg-blue-700 hover:bg-blue-800 px-4 py-2 rounded-lg text-white font-medium lg:text-xl">Sign Up</button>
            </div>
            @else
            <div class="if-logined flex items-center gap-5">
                <a href="{{ route('profile') }}" class="user  flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#fff" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                    <h1 class="text-white">{{ Auth::user()->name }}</h1>
                </a>
                <form action="{{ route('logout') }}" method="post" class="logout flex items-center">
                    @csrf
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#fff" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                    </button>
                </form>
            </div>
            @endif
        </div>

    </div>
</header>