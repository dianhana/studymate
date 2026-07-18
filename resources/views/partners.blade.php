<x-app-layout>
@section('title', 'Study Partners')
<div class="max-w-6xl mx-auto">

    {{-- Header --}}
    <div class="mb-8">

        <p class="text-gray-500 mt-2">
            Temukan partner belajar baru berdasarkan ID StudyMate.
        </p>
    </div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mb-5">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-lg mb-5">
            {{ session('error') }}
        </div>
    @endif


    {{-- ========================= --}}
    {{-- PARTNER SAYA --}}
    {{-- ========================= --}}

    <h2 class="text-2xl font-bold mb-5">
        Partner Saya
    </h2>

    @if($friends->count())

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">

        @foreach($friends as $friend)

        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition p-6 flex flex-col items-center">

            {{-- Avatar --}}
            <img
                src="https://ui-avatars.com/api/?name={{ urlencode($friend->friend->name) }}&background=10b981&color=fff&size=128"
                class="w-24 h-24 rounded-full mb-4">

            {{-- Nama --}}
            <h3 class="font-bold text-xl text-center">
                {{ $friend->friend->name }}
            </h3>

            {{-- ID --}}
            <p class="text-gray-500 mb-5">
                {{ $friend->friend->user_code }}
            </p>

            {{-- Status --}}
            <div class="flex items-center gap-2 text-green-600 font-semibold mb-4">

                <span class="w-3 h-3 rounded-full bg-green-500"></span>

                <span>Partner</span>

            </div>

            {{-- Tombol Message --}}
            <a href="{{ url('/messages?user='.$friend->friend->id) }}"
               class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition">

                💬 Message

            </a>

        </div>

        @endforeach

    </div>

    @else

    <div class="bg-white rounded-xl shadow p-8 text-center mb-10">

        <p class="text-gray-500">
            Kamu belum mempunyai partner.
        </p>

    </div>

    @endif


    {{-- ========================= --}}
    {{-- TAMBAH PARTNER --}}
    {{-- ========================= --}}

    <h2 class="text-2xl font-bold mb-5">
        Tambah Partner
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    @forelse($users as $user)

        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition p-6">

            <img
                src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=3b82f6&color=fff&size=128"
                class="w-20 h-20 rounded-full mx-auto">

            <h3 class="font-bold text-center text-lg mt-4">
                {{ $user->name }}
            </h3>

            <p class="text-center text-gray-500">
                {{ $user->user_code }}
            </p>

            @if(in_array($user->id, $sentRequests))

                <button
                    disabled
                    class="mt-5 w-full bg-green-600 text-white py-2 rounded-lg cursor-not-allowed">

                    ✓ Permintaan Terkirim

                </button>

            @else

                <form action="{{ route('partner.request',$user->id) }}" method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="mt-5 w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg transition">

                        Tambah Partner

                    </button>

                </form>

            @endif

        </div>

    @empty

        <div class="col-span-3">

            <div class="bg-white rounded-xl shadow-md p-10 text-center">

                <h2 class="text-2xl font-bold">
                    🎉 Semua pengguna sudah menjadi partner.
                </h2>

                <p class="text-gray-500 mt-3">
                    Tidak ada pengguna lain yang bisa ditambahkan.
                </p>

            </div>

        </div>

    @endforelse

    </div>

</div>

</x-app-layout>