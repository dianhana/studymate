<nav class="sticky top-0 z-30 bg-white border-b border-gray-200 h-20 flex items-center justify-between px-8">

    {{-- Left --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800">
            @yield('title','Dashboard')
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Welcome back,
            <span class="font-semibold text-blue-600">
                {{ auth()->user()->name }}
            </span>
        </p>
    </div>

    {{-- Right --}}
    <div class="flex items-center gap-5">

        {{-- Search (sementara belum aktif) --}}
        <div class="relative hidden lg:block">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="absolute left-4 top-3.5 w-5 h-5 text-gray-400"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-5-5m2-5a7 7 0 11-14 0a7 7 0 0114 0z"/>

            </svg>

            <input
                type="text"
                placeholder="Search..."
                class="w-72 pl-11 pr-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        @php
            $notif = \App\Models\Message::where('receiver_id', auth()->id())
                        ->where('is_read', false)
                        ->count();
        @endphp

        {{-- Notification --}}
        <button
            class="relative w-11 h-11 rounded-xl bg-gray-100 hover:bg-blue-50 transition flex items-center justify-center">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6 text-gray-600"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5m6 0a3 3 0 11-6 0h6z"/>

            </svg>

            @if($notif>0)

                <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-red-500 text-white text-[10px] flex items-center justify-center">

                    {{ $notif }}

                </span>

            @endif

        </button>

        {{-- Avatar --}}
        <div class="flex items-center gap-3">

            <img
                src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=2563eb&color=fff"
                class="w-11 h-11 rounded-full shadow">

            <div class="hidden md:block">

                <div class="font-semibold text-gray-800">
                    {{ auth()->user()->name }}
                </div>

                <div class="text-xs text-gray-500">
                    {{ auth()->user()->user_code }}
                </div>

            </div>

        </div>

    </div>

</nav>