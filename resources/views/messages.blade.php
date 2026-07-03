@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Messages
</h1>

<div class="grid md:grid-cols-3 gap-6">

    <!-- LIST TEMAN -->
    <div class="bg-white rounded-xl shadow p-5">

        <h3 class="font-bold mb-4">
            Teman Belajar
        </h3>

        <ul class="space-y-3">

            <li class="border-b pb-2">
                Dian Hana
            </li>

            <li class="border-b pb-2">
                Hani
            </li>

            <li class="border-b pb-2">
                Mila
            </li>

            <li class="border-b pb-2">
                Lena
            </li>

        </ul>

    </div>

    <!-- CHAT -->
    <div class="md:col-span-2 bg-white rounded-xl shadow p-5">

        <h3 class="font-bold mb-5">
            Chat Room
        </h3>

        <div class="space-y-4">

            <div class="bg-gray-100 p-3 rounded">
                Hani : Besok belajar Laravel?
            </div>

            <div class="bg-blue-100 p-3 rounded">
                Dian : Boleh jam 7 malam
            </div>

            <div class="bg-gray-100 p-3 rounded">
                Mila : Aku ikut juga
            </div>

        </div>

        <div class="flex gap-2 mt-6">

            <input
                type="text"
                placeholder="Ketik pesan..."
                class="border p-3 rounded w-full">

            <button
                onclick="alert('Pesan berhasil dikirim')"
                class="bg-indigo-600 text-white px-4 rounded">
                Kirim
            </button>

        </div>

    </div>

</div>

@endsection