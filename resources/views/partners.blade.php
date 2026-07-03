@extends('layouts.app')

@section('content')

<div class="flex justify-between mb-10">

    <h2 class="text-3xl font-bold">
        Cari Teman Belajar Kamu!
    </h2>

    <input
        type="text"
        placeholder="Cari disini..."
        class="border rounded-full px-5 py-2 w-80">

</div>

<div class="grid md:grid-cols-3 gap-8">

@for($i=1;$i<=6;$i++)

<div class="bg-white rounded-xl shadow p-5">

    <img
        src="https://placehold.co/400x250"
        class="rounded-lg">

    <h3 class="font-bold text-xl mt-4">
        Dian Hana
    </h3>

    <p class="text-gray-500">
        Teknik Informatika
    </p>

    <p class="mt-3 text-sm">
        Tertarik belajar Web Development,
        Machine Learning dan UI/UX.
    </p>

    <div class="flex gap-2 mt-4">

        <button
            onclick="addFriend('Dian Hana')"
            class="bg-indigo-600 text-white px-4 py-2 rounded-lg">
            Tambah Partner
        </button>

        <a href="/messages"
           class="bg-green-600 text-white px-4 py-2 rounded-lg">
           Chat
        </a>

    </div>

</div>
@endfor

</div>

@endsection
<script>

function addFriend(name){

    alert(name + ' berhasil ditambahkan sebagai partner belajar');

}

</script>