<x-app-layout>
@section('title', 'Permintaan Partner')
<div class="max-w-6xl mx-auto">

    <div class="mb-8">

        <p class="text-gray-500 mt-2">
            Terima atau tolak permintaan partner yang masuk.
        </p>
    </div>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="mb-5 rounded-lg bg-green-100 border border-green-300 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    {{-- Alert Error --}}
    @if(session('error'))
        <div class="mb-5 rounded-lg bg-red-100 border border-red-300 p-4 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    @forelse($requests as $request)

    <div class="bg-white rounded-xl shadow-md p-6 mb-5 flex justify-between items-center">

        <div class="flex items-center gap-4">

            <img
                src="https://ui-avatars.com/api/?name={{ urlencode($request->sender->name) }}&background=3b82f6&color=fff"
                class="w-16 h-16 rounded-full">

            <div>

                <h2 class="font-bold text-lg">
                    {{ $request->sender->name }}
                </h2>

                <p class="text-gray-500">
                    {{ $request->sender->user_code }}
                </p>

                <p class="text-sm text-gray-400 mt-1">
                    Mengirim permintaan partner.
                </p>

            </div>

        </div>

        <div class="flex gap-3">

            <form action="{{ route('partner.accept',$request->id) }}" method="POST">
                @csrf

                <button
                    type="submit"
                    class="px-5 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white">
                    ✔ Terima
                </button>

            </form>

            <form action="{{ route('partner.reject',$request->id) }}" method="POST">
                @csrf

                <button
                    type="submit"
                    class="px-5 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white">
                    ✖ Tolak
                </button>

            </form>

        </div>

    </div>

    @empty

    <div class="bg-white rounded-xl shadow-md p-10 text-center">

        <h2 class="text-xl font-semibold text-gray-700">
            Belum ada permintaan partner
        </h2>

        <p class="text-gray-500 mt-2">
            Permintaan dari pengguna lain akan muncul di sini.
        </p>

    </div>

    @endforelse

</div>

</x-app-layout>