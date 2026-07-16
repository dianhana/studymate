<x-app-layout>

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold">
                Study Groups
            </h1>

            <p class="text-gray-500 mt-2">
                Belajar bersama teman dengan membuat atau bergabung ke group.
            </p>

        </div>

        <button
            onclick="document.getElementById('createGroup').classList.remove('hidden')"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg">

            + Create Group

        </button>

    </div>

    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif


    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse($groups as $group)

        
        
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition">

    <a href="{{ route('groups.show',$group->id) }}" class="block">

        <img
            src="{{ asset('images/groups/'.$group->cover) }}"
            class="rounded-t-xl w-full h-40 object-cover">

        <div class="p-6">

            <h2 class="font-bold text-xl">
                {{ $group->name }}
            </h2>

            <p class="text-gray-500 mt-2">
                {{ $group->description }}
            </p>

            <div class="mt-4 text-sm text-gray-400">
                👥 {{ $group->members_count }} Members
            </div>

        </div>

    </a>

    <div class="px-6 pb-6">

        @php
            $joined=\App\Models\GroupMember::where('group_id',$group->id)
                ->where('user_id',auth()->id())
                ->exists();
        @endphp

        @if($joined)

            <form action="{{ route('groups.leave',$group->id) }}" method="POST">
                @csrf

                <button
                    class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-lg">

                    Leave Group

                </button>

            </form>

        @else

            <form action="{{ route('groups.join',$group->id) }}" method="POST">
                @csrf

                <button
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg">

                    Join Group

                </button>

            </form>

        @endif

    </div>

</div>

        @empty

        <div class="col-span-3">

            <div class="bg-white rounded-xl shadow p-12 text-center">

                <h2 class="text-2xl font-bold">

                    Belum Ada Group

                </h2>

                <p class="text-gray-500 mt-3">

                    Jadilah orang pertama yang membuat Study Group.

                </p>

            </div>

        </div>

        @endforelse

    </div>

</div>


{{-- Modal Create Group --}}

<div
    id="createGroup"
    class="hidden fixed inset-0 bg-black/40 flex justify-center items-center">

    <div class="bg-white rounded-xl w-full max-w-lg p-8">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold">

                Create Study Group

            </h2>

            <button
                onclick="document.getElementById('createGroup').classList.add('hidden')">

                ✕

            </button>

        </div>

        <form
            action="{{ route('groups.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <input
                type="text"
                name="name"
                placeholder="Nama Group"
                class="w-full border rounded-lg p-3 mb-4"
                required>

            <textarea
                name="description"
                rows="4"
                placeholder="Deskripsi"
                class="w-full border rounded-lg p-3 mb-5"></textarea>

                <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Cover Group
                </label>

                <input
                    type="file"
                    name="cover"
                    accept="image/*"
                    class="w-full border rounded-lg p-3">

                <p class="text-gray-400 text-sm mt-2">
                    Kosongkan jika ingin menggunakan cover default.
                </p>

            </div>

            <button
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg">

                Buat Group

            </button>

        </form>

    </div>

</div>

</x-app-layout>