@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Group HighFive
</h1>

<div class="grid md:grid-cols-2 gap-6">

    <!-- ANGGOTA -->
    <div class="bg-white p-5 rounded-xl shadow">

        <h2 class="font-bold text-xl mb-4">
            Anggota Group
        </h2>

        <ul class="space-y-2">

            <li>Dian Hana</li>
            <li>Hani</li>
            <li>Mila</li>
            <li>Lena</li>

        </ul>

    </div>

    <!-- MATERI -->
    <div class="bg-white p-5 rounded-xl shadow">

        <h2 class="font-bold text-xl mb-4">
            Materi Group
        </h2>

        <ul class="space-y-2">

            <li>Laravel Dasar.pdf</li>
            <li>Algoritma.pdf</li>
            <li>Machine Learning.pdf</li>

        </ul>

    </div>

</div>

<div class="bg-white p-5 rounded-xl shadow mt-6">

    <h2 class="font-bold text-xl mb-4">
        Diskusi Group
    </h2>

    <div class="space-y-3">

        <p>Hani : Besok belajar Laravel?</p>

        <p>Dian : Siap</p>

        <p>Mila : Aku ikut</p>

    </div>

</div>

@endsection