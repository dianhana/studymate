@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold mb-8">
    Materi Pembelajaran
</h2>

<div class="bg-white p-6 rounded-xl shadow">

    <table class="w-full">

        <tr class="border-b">
            <th class="text-left p-3">Materi</th>
            <th class="text-left p-3">Aksi</th>
        </tr>

        <tr>
            <td class="p-3">Modul Laravel</td>
            <td class="p-3">
                Download
            </td>
        </tr>

        <tr>
            <td class="p-3">Machine Learning Dasar</td>
            <td class="p-3">
                Download
            </td>
        </tr>

    </table>

</div>

@endsection