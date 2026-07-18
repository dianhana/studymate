<x-app-layout>
@section('title', 'Edit Materi')
<div class="max-w-3xl mx-auto py-10">

    <div class="bg-white rounded-xl shadow p-8">

        <h1 class="text-2xl font-bold mb-6">
            Edit Materi
        </h1>

        <form
            action="{{ route('materials.update',$material->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label class="font-semibold">
                    Judul
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title',$material->title) }}"
                    class="w-full border rounded-lg p-3">

            </div>

            <div class="mb-4">

                <label class="font-semibold">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="w-full border rounded-lg p-3">{{ old('description',$material->description) }}</textarea>

            </div>

            <label class="flex items-center gap-2 mb-6">

                <input
                    type="checkbox"
                    name="is_premium"
                    {{ $material->is_premium ? 'checked' : '' }}>

                Jadikan Premium

            </label>

            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

</x-app-layout>