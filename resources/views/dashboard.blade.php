<x-app-layout>

@section('title', 'Dashboard')

<h1 class="text-4xl font-bold">
    Halo, {{ Auth::user()->name }}! 👋
</h1>

<p class="text-gray-500 mt-2">
    Let's learn something amazing today.
</p>

{{-- Stats --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-10">

    <a href="{{ route('friends') }}" class="card hover:shadow-lg transition">
        <h3 class="font-semibold text-gray-500">Partners</h3>
        <p class="text-4xl mt-3 font-bold">{{ $partnerCount }}</p>
    </a>

    <a href="{{ route('groups') }}" class="card hover:shadow-lg transition">
        <h3 class="font-semibold text-gray-500">Groups</h3>
        <p class="text-4xl mt-3 font-bold">{{ $groupCount }}</p>
    </a>

    <div class="card">
        <h3 class="font-semibold text-gray-500">Materials</h3>
        <p class="text-4xl mt-3 font-bold">{{ $materialCount }}</p>
    </div>

    <a href="{{ route('messages') }}" class="card hover:shadow-lg transition">
        <h3 class="font-semibold text-gray-500">Unread Messages</h3>
        <p class="text-4xl mt-3 font-bold">{{ $messageCount }}</p>
    </a>

</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-10">

    {{-- Recent Groups --}}
    <div class="card">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl">Group Terbaru</h2>
            <a href="{{ route('groups') }}" class="text-sm text-blue-600 hover:underline">Lihat semua</a>
        </div>

        <ul class="mt-5 space-y-3">

            @forelse($recentGroups as $group)
                <li>
                    <a href="{{ route('groups.show', $group->id) }}"
                       class="flex items-center justify-between hover:text-blue-600 transition">
                        <span>{{ $group->name }}</span>
                        <span class="text-xs text-gray-400">{{ $group->members_count }} members</span>
                    </a>
                </li>
            @empty
                <li class="text-gray-400">Belum ada group. Yuk buat group pertamamu!</li>
            @endforelse

        </ul>
    </div>

    {{-- Recent Materials --}}
    <div class="card">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-xl">Materi Terbaru</h2>
        </div>

        <ul class="mt-5 space-y-3">

            @forelse($recentMaterials as $material)
                <li class="flex items-center justify-between">
                    <div>
                        <p>{{ $material->title }}</p>
                        <p class="text-xs text-gray-400">
                            {{ $material->user->name ?? 'Unknown' }} &middot;
                            {{ $material->created_at->diffForHumans() }}
                        </p>
                    </div>

                    @if($material->is_premium)
                        <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full">Premium</span>
                    @endif
                </li>
            @empty
                <li class="text-gray-400">Belum ada materi yang dibagikan.</li>
            @endforelse

        </ul>
    </div>

</div>

</x-app-layout>