<div class="fixed left-0 top-0 h-screen w-64 bg-gradient-to-b from-blue-600 to-blue-800 text-white shadow-xl flex flex-col">

    @php
        $unread = \App\Models\Message::where('receiver_id', auth()->id())
                    ->where('is_read', false)
                    ->count();
    @endphp

    {{-- Logo --}}
    <div class="px-6 py-6 border-b border-white/10">

        <h1 class="text-2xl font-bold tracking-wide">
            StudyMate
        </h1>

        <p class="text-blue-200 text-sm mt-1">
            Learn Together
        </p>

    </div>

    {{-- User --}}
    <div class="px-5 py-5 border-b border-white/10">

        <div class="flex items-center gap-3">

            <img
                src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=ffffff&color=2563eb"
                class="w-11 h-11 rounded-full border border-white">

            <div>

                <h2 class="font-semibold leading-none">
                    {{ auth()->user()->name }}
                </h2>

                <p class="text-xs text-blue-200 mt-1">
                    {{ auth()->user()->user_code }}
                </p>

            </div>

        </div>

    </div>

    {{-- Menu --}}
    <nav class="sidebar-scroll flex-1 overflow-y-auto px-4 py-6 space-y-2">

        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
            {{ request()->routeIs('dashboard') ? 'bg-white/15 border-l-4 border-white' : 'hover:bg-white/10' }}">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 12l9-9 9 9M5 10v10h14V10"/>
            </svg>

            <span>Dashboard</span>

        </a>

        <a href="{{ route('partners') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
            {{ request()->routeIs('partners') ? 'bg-white/15 border-l-4 border-white' : 'hover:bg-white/10' }}">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 00-3-3.87"/>
            </svg>

            <span>Partner</span>

        </a>

        <a href="{{ route('partner.requests') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
            {{ request()->routeIs('partner.requests') ? 'bg-white/15 border-l-4 border-white' : 'hover:bg-white/10' }}">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 8l9 6 9-6"/>
                <rect x="3" y="5" width="18" height="14" rx="2"/>
            </svg>

            <span>Permintaan</span>

        </a>

        <a href="{{ route('friends') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
            {{ request()->routeIs('friends') ? 'bg-white/15 border-l-4 border-white' : 'hover:bg-white/10' }}">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                <circle cx="10" cy="7" r="4"/>
            </svg>

            <span>Partner Saya</span>

        </a>

        <a href="{{ route('groups') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
            {{ request()->is('groups*') ? 'bg-white/15 border-l-4 border-white' : 'hover:bg-white/10' }}">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 7h18M3 12h18M3 17h18"/>
            </svg>

            <span>Groups</span>

        </a>

        <a href="{{ route('messages') }}"
            class="flex items-center justify-between px-4 py-3 rounded-xl transition-all duration-200
            {{ request()->routeIs('messages') ? 'bg-white/15 border-l-4 border-white' : 'hover:bg-white/10' }}">

            <div class="flex items-center gap-3">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 10h8M8 14h5"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/>
                </svg>

                <span>Messages</span>

            </div>

            @if($unread > 0)
                <span class="bg-red-500 text-xs font-semibold rounded-full px-2 py-0.5">
                    {{ $unread }}
                </span>
            @endif

        </a>

        <a href="/books"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 hover:bg-white/10">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6l-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5z"/>
            </svg>

            <span>Materials</span>

        </a>

        <a href="{{ route('profile.edit') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 hover:bg-white/10">

            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4"/>
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6 20a6 6 0 0112 0"/>
            </svg>

            <span>Profile</span>

        </a>

    </nav>

    {{-- Bottom --}}
    <div class="border-t border-white/10 p-4 space-y-3">

        @if(auth()->user()->isPremium())

            <div class="bg-yellow-400/20 border border-yellow-300 rounded-lg p-3 text-center text-sm">
                ⭐ Premium Member
            </div>

        @else

            <a href="{{ route('premium') }}"
                class="block text-center bg-white/10 hover:bg-white/20 rounded-lg py-2 text-sm transition">

                Upgrade Premium

            </a>

        @endif

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                class="w-full py-2 rounded-lg bg-red-500 hover:bg-red-600 transition">

                Logout

            </button>

        </form>

    </div>

</div>