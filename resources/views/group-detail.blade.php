<x-app-layout>
    <div class="bg-red-200 p-4 mb-5">
    joined = {{ $joined ? 'YES' : 'NO' }} <br>
    owner = {{ $isOwner ? 'YES' : 'NO' }} <br>
    login = {{ auth()->id() }} <br>
    owner_id = {{ $group->owner_id }}
</div>

<div class="max-w-6xl mx-auto py-8 px-4">

    {{-- Cover --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">

        <img
            src="{{ asset('images/groups/'.$group->cover) }}"
            class="w-full h-72 object-cover">

        <div class="p-8">

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

                @if($isOwner)

                <form
                    action="{{ route('materials.store',$group->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-3 mb-8">

                    @csrf

                    <input
                        type="text"
                        name="title"
                        placeholder="Judul Materi"
                        class="w-full border rounded-lg p-3"
                        required>

                    <textarea
                        name="description"
                        rows="3"
                        placeholder="Deskripsi Materi"
                        class="w-full border rounded-lg p-3"></textarea>

                    <input
                        type="file"
                        name="file"
                        class="w-full border rounded-lg p-3"
                        required>

                    <label class="flex items-center gap-2">

                        <input
                            type="checkbox"
                            name="is_premium">

                        <span>

                            Jadikan Premium Material

                        </span>

                    </label>

                    <button
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg">

                        Upload Materi

                    </button>

                </form>

                @endif

                <div class="bg-red-100 p-4 rounded mb-5">
                Jumlah materi :
                {{ $group->materials->count() }}
                </div>

                @forelse($group->materials->sortByDesc('created_at') as $material)

                <div class="border rounded-xl p-5 mb-5">

                    <div class="flex justify-between">

                        <div>

                            <h3 class="font-bold text-lg">

                                {{ $material->title }}

                            </h3>

                            @if($material->description)

                            <p class="text-gray-500 mt-2">

                                {{ $material->description }}

                            </p>

                            @endif

                        </div>

                        @if($material->is_premium)

                        <span
                            class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold h-fit">

                            ⭐ PREMIUM

                        </span>

                        @else

                        <span
                            class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold h-fit">

                            FREE

                        </span>

                        @endif

                    </div>

                    <div class="mt-4 text-sm text-gray-500">

                        👤 {{ $material->user->name }}

                    </div>

                    <div class="text-sm text-gray-500">

                        📅 {{ $material->created_at->format('d M Y H:i') }}

                    </div>

                    <div class="text-sm text-gray-500">

                        📄 {{ $material->file_type }}
                        •
                        {{ $material->file_size }}

                    </div>

                    <div class="text-sm text-gray-500 mb-4">

                        ⬇ {{ $material->downloads }} Download

                    </div>

                    @if(!$joined)

                    <button
                        disabled
                        class="inline-block bg-gray-400 text-white px-5 py-2 rounded-lg cursor-not-allowed">

                        Join Group untuk Download

                    </button>

                @elseif($material->is_premium && !auth()->user()->isPremium())

                    <a
                        href="{{ route('premium') }}"
                        class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg">

                        ⭐ Upgrade Premium

                    </a>

                @else

                    <a
                        href="{{ route('materials.download',$material->id) }}"
                        class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                        Download

                    </a>

                @endif

                </div>
               <div class="flex flex-wrap gap-2 mt-4">

    @if(!$joined)

        <button
            disabled
            class="bg-gray-400 text-white px-5 py-2 rounded-lg cursor-not-allowed">

            Join Group

        </button>

    @elseif($material->is_premium && !auth()->user()->isPremium())

        <a
            href="{{ route('premium') }}"
            class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg">

            ⭐ Upgrade Premium

        </a>

    @else

        <a
            href="{{ route('materials.download',$material->id) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

            Download

        </a>

    @endif

    @if($isOwner)

        <a
            href="{{ route('materials.edit',$material->id) }}"
            class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg">

            ✏ Edit

        </a>

        <form
            action="{{ route('materials.destroy',$material->id) }}"
            method="POST">

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Yakin ingin menghapus materi ini?')"
                class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg">

                🗑 Hapus

            </button>

        </form>

    @endif

</div>

                @empty

                <div class="text-center py-10 text-gray-400">

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