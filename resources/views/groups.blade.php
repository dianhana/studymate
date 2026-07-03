@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Study Groups
</h1>

<div class="grid md:grid-cols-3 gap-6">

    <div class="bg-white p-5 rounded-xl shadow">

        <h3 class="font-bold">
            Web Programming
        </h3>

        <p>
            25 Anggota
        </p>

        <a href="/groups/1"
           class="inline-block mt-4 bg-indigo-600 text-white px-4 py-2 rounded">
            Lihat Group
        </a>

    </div>

    <div class="bg-white p-5 rounded-xl shadow">

        <h3 class="font-bold">
            Machine Learning
        </h3>

        <p>
            18 Anggota
        </p>

        <a href="/groups/2"
           class="inline-block mt-4 bg-indigo-600 text-white px-4 py-2 rounded">
            Lihat Group
        </a>

    </div>

</div>

@endsection