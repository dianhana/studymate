<x-app-layout>

<div class="max-w-6xl mx-auto">

    <div class="mb-8">

        <h1 class="text-3xl font-bold">
            Partner Saya
        </h1>

        <p class="text-gray-500">
            Semua partner belajar yang sudah terhubung.
        </p>

    </div>

    @forelse($friends as $friend)

    <div class="bg-white rounded-xl shadow p-5 mb-4 flex justify-between items-center">

        <div class="flex items-center gap-4">

            <img
                src="https://ui-avatars.com/api/?name={{ urlencode($friend->friend->name) }}"
                class="w-14 h-14 rounded-full">

            <div>

                <h2 class="font-bold">
                    {{ $friend->friend->name }}
                </h2>

                <p class="text-gray-500">
                    {{ $friend->friend->user_code }}
                </p>

            </div>

        </div>

        <span
            class="bg-green-100 text-green-700 px-4 py-2 rounded-full">
            ✓ Partner
        </span>

    </div>

    @empty

    <div class="bg-white rounded-xl shadow p-8 text-center">

        Belum memiliki partner.

    </div>

    @endforelse

</div>

</x-app-layout>