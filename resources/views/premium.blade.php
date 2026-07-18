<x-app-layout>
@section('title', 'Upgrade Premium')
<div class="max-w-6xl mx-auto py-10">

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mb-8">
            {{ session('success') }}
        </div>
    @endif

    @if(session('warning'))
        <div class="bg-yellow-100 border border-yellow-300 text-yellow-700 p-4 rounded-lg mb-8">
            {{ session('warning') }}
        </div>
    @endif

    <div class="text-center mb-10">

        <h1 class="text-4xl font-bold">
            🚀 Upgrade ke StudyMate Premium
        </h1>

        <p class="text-gray-500 mt-3 text-lg">
            Dapatkan akses ke seluruh materi premium dan berbagai fitur eksklusif.
        </p>

    </div>

    <div class="grid md:grid-cols-2 gap-8">

        {{-- FREE --}}
        <div class="bg-white rounded-2xl shadow-lg p-8 border">

            <h2 class="text-2xl font-bold mb-6">
                Free
            </h2>

            <div class="text-5xl font-bold mb-6">
                Rp0
            </div>

            <ul class="space-y-3 text-gray-600">

                <li>✅ Join Study Group</li>
                <li>✅ Chat Partner</li>
                <li>✅ Upload Materi</li>
                <li>✅ Download Materi Gratis</li>
                <li>❌ Download Materi Premium</li>
                <li>❌ Mentor Eksklusif</li>
             

            </ul>

            @if(auth()->user()->isFree())

                <button
                    class="mt-8 w-full bg-gray-300 text-gray-700 py-3 rounded-lg font-semibold cursor-default">

                    Paket yang Digunakan

                </button>

            @endif

        </div>

        {{-- PREMIUM --}}
        <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl shadow-xl p-8 text-white">

            <div class="inline-block bg-yellow-400 text-black px-4 py-1 rounded-full text-sm font-bold mb-5">

                ⭐ TERPOPULER

            </div>

            <h2 class="text-2xl font-bold mb-3">

                Premium

            </h2>

            <div class="text-5xl font-bold mb-6">

                Rp39.000

                <span class="text-lg font-normal">
                    /bulan
                </span>

            </div>

            <ul class="space-y-3">

                <li>✅ Semua Materi Premium</li>
                <li>✅ Download Tanpa Batas</li>
                <li>✅ Mentor Eksklusif</li>
                <li>✅ Prioritas Matching Partner</li>
                <li>✅ Akses Fitur Terbaru</li>

            </ul>

            @if(auth()->user()->isPremium())

                <button
                    class="mt-8 w-full bg-green-500 py-3 rounded-lg font-bold cursor-default">

                    ✔ Membership Premium Aktif

                </button>

            @else

                <a
                    href="{{ route('premium.checkout') }}"
                    class="block mt-8 w-full bg-white text-blue-700 text-center font-bold py-3 rounded-lg hover:bg-gray-100 transition">

                    Upgrade Sekarang


                </a>

                <p class="text-center text-sm mt-3 text-blue-100">

                    Kamu akan diarahkan ke halaman pembayaran.

                </p>

            @endif

        </div>

    </div>

</div>

</x-app-layout>