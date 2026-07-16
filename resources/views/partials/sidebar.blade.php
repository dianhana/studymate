<div class="fixed h-screen w-64 sidebar text-white flex flex-col">

    {{-- Logo --}}
    <div class="p-8 border-b border-blue-400/30">
        <h1 class="text-3xl font-bold">
            StudyMate
        </h1>

        <p class="text-blue-100 mt-2">
            Learn Together
        </p>
    </div>

    @php
        $unread = \App\Models\Message::where('receiver_id', auth()->id())
                    ->where('is_read', false)
                    ->count();
    @endphp

    {{-- Menu --}}
    <nav class="mt-6 flex-1">

        <a href="{{ route('dashboard') }}"
            class="menu flex items-center justify-between px-8 py-4 hover:bg-blue-700 transition">

            <span>Dashboard</span>

        </a>

        <a href="{{ route('partners') }}"
            class="menu flex items-center justify-between px-8 py-4 hover:bg-blue-700 transition">

            <span>Partners</span>

        </a>

        <a href="{{ route('partner.requests') }}"
            class="menu flex items-center justify-between px-8 py-4 hover:bg-blue-700 transition">

            <span>Permintaan Partner</span>

        </a>

        <a href="{{ route('friends') }}"
            class="menu flex items-center justify-between px-8 py-4 hover:bg-blue-700 transition">

            <span>Partner Saya</span>

        </a>

        <a href="/groups"
            class="menu flex items-center justify-between px-8 py-4 hover:bg-blue-700 transition">

            <span>Groups</span>

        </a>

        <a href="{{ route('messages') }}"
            class="menu flex items-center justify-between px-8 py-4 hover:bg-blue-700 transition">

            <span>Messages</span>

            @if($unread > 0)
                <span
                    class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                    {{ $unread }}
                </span>
            @endif

        </a>

        <a href="/books"
            class="menu flex items-center justify-between px-8 py-4 hover:bg-blue-700 transition">

            <span>Materials</span>

        </a>

        <a href="{{ route('profile.edit') }}"
            class="menu flex items-center justify-between px-8 py-4 hover:bg-blue-700 transition">

            <span>Profile</span>

        </a>

    </nav>

    {{-- Footer --}}
    <div class="p-6 border-t border-blue-400/30">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="w-full bg-red-500 hover:bg-red-600 transition rounded-lg py-2 font-semibold">

                Logout

            </button>

        </form>

    </div>

</div>