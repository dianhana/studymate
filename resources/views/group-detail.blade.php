<x-app-layout>

<div class="max-w-6xl mx-auto">

    {{-- Cover --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <img
            src="{{ asset('images/groups/'.$group->cover) }}"
            class="w-full h-72 object-cover">

        <div class="p-8">

            <div class="flex justify-between items-start">

                <div>

                    <h1 class="text-3xl font-bold">
                        {{ $group->name }}
                    </h1>

                    <p class="text-gray-500 mt-2">
                        {{ $group->description }}
                    </p>

                    <div class="mt-5 flex gap-6 text-gray-600">

                        <span>
                            👑 {{ $group->owner->name }}
                        </span>

                        <span>
                            👥 {{ $group->members->count() }} Members
                        </span>

                    </div>

                </div>

                @if($joined)

                    <form
                        action="{{ route('groups.leave',$group->id) }}"
                        method="POST">

                        @csrf

                        <button
                            class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg">

                            Leave Group

                        </button>

                    </form>

                @else

                    <form
                        action="{{ route('groups.join',$group->id) }}"
                        method="POST">

                        @csrf

                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                            Join Group

                        </button>

                    </form>

                @endif

            </div>

        </div>

    </div>

    {{-- Content --}}
    <div class="grid lg:grid-cols-3 gap-6 mt-8">

        {{-- Materi --}}
        <div class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow p-6">

                <h2 class="font-bold text-xl mb-5">
                    📂 Materi
                </h2>

                @if($joined)

                <form
                    action="{{ route('materials.store',$group->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="mb-6">

                    @csrf

                    <input
                        type="text"
                        name="title"
                        placeholder="Judul Materi"
                        class="w-full border rounded-lg p-3 mb-3"
                        required>

                    <input
                        type="file"
                        name="file"
                        class="w-full border rounded-lg p-3 mb-3"
                        required>

                    <button
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

                        Upload Materi

                    </button>

                </form>

                @endif

                @forelse($group->materials as $material)

                    <div class="border rounded-lg p-4 mb-4">

                        <div class="font-bold text-lg">

                            {{ $material->title }}

                        </div>

                        <div class="text-gray-500 text-sm mt-1">

                            Upload oleh
                            <b>{{ $material->user->name }}</b>

                        </div>

                        <div class="text-gray-400 text-xs mt-1">

                            {{ $material->created_at->format('d M Y H:i') }}

                        </div>

                        <a
                            href="{{ route('materials.download',$material->id) }}"
                            class="inline-block mt-3 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">

                            Download

                        </a>

                    </div>

                @empty

                    <div class="text-center text-gray-400 py-8">

                        Belum ada materi.

                    </div>

                @endforelse

            </div>

            {{-- Diskusi --}}
            <div class="bg-white rounded-xl shadow p-6">

                <h2 class="font-bold text-xl mb-4">
                    💬 Diskusi
                </h2>

                <div class="text-gray-400">

                    Fitur diskusi akan segera tersedia.

                </div>

            </div>

        </div>

        {{-- Sidebar --}}
        <div>

            <div class="bg-white rounded-xl shadow p-6">

                <h2 class="font-bold text-xl mb-5">
                    👥 Anggota
                </h2>

                @foreach($group->members as $member)

                    <div class="flex items-center gap-3 mb-4">

                        <img
                            src="https://ui-avatars.com/api/?name={{ urlencode($member->user->name) }}&background=3b82f6&color=fff"
                            class="w-10 h-10 rounded-full">

                        <div>

                            <div class="font-semibold">

                                {{ $member->user->name }}

                            </div>

                            <div class="text-sm text-gray-500">

                                {{ $member->user->user_code }}

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

</x-app-layout>