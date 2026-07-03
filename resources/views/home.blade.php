@extends('layouts.app')

@section('content')

<!-- GROUP BELAJAR -->

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

    <!-- CARD 1 -->
    <div class="bg-white rounded-xl shadow">

        <img
            src="https://placehold.co/600x300"
            class="w-full h-48 object-cover rounded-t-xl">

        <div class="p-4">

            <h3 class="font-bold text-lg">
                Belajar Javascript
            </h3>

            <p class="text-gray-500 text-sm">
                Group HighFive
            </p>

            <p class="mt-3 text-sm">
                Javascript digunakan untuk membuat halaman web menjadi interaktif.
            </p>

            <div class="flex gap-2 mt-4">

                <button class="border px-4 py-2 rounded-full">
                    Exit
                </button>

                <button class="bg-purple-600 text-white px-4 py-2 rounded-full">
                    Lanjutkan
                </button>

            </div>

        </div>

    </div>

    <!-- CARD 2 -->
    <div class="bg-white rounded-xl shadow">

        <img
            src="https://placehold.co/600x300"
            class="w-full h-48 object-cover rounded-t-xl">

        <div class="p-4">

            <h3 class="font-bold text-lg">
                Belajar Algoritma
            </h3>

            <p class="text-gray-500 text-sm">
                Group Enhypen
            </p>

            <p class="mt-3 text-sm">
                Dasar logika pemrograman dan penyelesaian masalah.
            </p>

            <div class="flex gap-2 mt-4">

                <button class="border px-4 py-2 rounded-full">
                    Exit
                </button>

                <button class="bg-purple-600 text-white px-4 py-2 rounded-full">
                    Lanjutkan
                </button>

            </div>

        </div>

    </div>

    <!-- CARD 3 -->
    <div class="bg-white rounded-xl shadow">

        <img
            src="https://placehold.co/600x300"
            class="w-full h-48 object-cover rounded-t-xl">

        <div class="p-4">

            <h3 class="font-bold text-lg">
                Materi Developer Masa Depan
            </h3>

            <p class="text-gray-500 text-sm">
                Group NCT Dream
            </p>

            <p class="mt-3 text-sm">
                Teknologi modern untuk membangun aplikasi.
            </p>

            <<div class="flex gap-2 mt-4">

    <button
        onclick="alert('Berhasil keluar dari group')"
        class="border px-4 py-2 rounded-full">
        Exit
    </button>

    <a href="/groups/1"
       class="bg-purple-600 text-white px-4 py-2 rounded-full">
       Lanjutkan
    </a>

</div>

        </div>

    </div>

</div>

<!-- BOTTOM SECTION -->

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">

    <!-- MESSAGES -->
    <div class="bg-white p-5 rounded-xl shadow">

        <h3 class="font-bold text-xl mb-4">
            Messages
        </h3>

        <div class="space-y-3">

            <p>Jay : WOI DIMANA?</p>
            <p>Niki : lanjutin belajar nanti malam dah</p>
            <p>Jeno : gas ngopi</p>
            <p>Lena : gas belajar lagi</p>

        </div>

    </div>

    <!-- GROUPS -->
    <div class="bg-white p-5 rounded-xl shadow">

        <h3 class="font-bold text-xl mb-4">
            Groups
        </h3>

        <div class="space-y-3">

            <p>High Five</p>
            <p>Enhypen Jaya</p>
            <p>NCT Dream</p>

        </div>

    </div>

</div>

@endsection