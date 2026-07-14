<x-app-layout>

<h1 class="text-4xl font-bold">

Halo !

{{ Auth::user()->name }}

</h1>

<p class="text-gray-500 mt-2">

Let's learn something amazing today.

</p>

<div class="grid grid-cols-4 gap-6 mt-10">

<div class="card">

<h3 class="font-semibold">

Partners

</h3>

<p class="text-4xl mt-3">

12

</p>

</div>

<div class="card">

<h3>

Groups

</h3>

<p class="text-4xl mt-3">

5

</p>

</div>

<div class="card">

<h3>

Materials

</h3>

<p class="text-4xl mt-3">

32

</p>

</div>

<div class="card">

<h3>

Messages

</h3>

<p class="text-4xl mt-3">

18

</p>

</div>

</div>

<div class="grid grid-cols-2 gap-8 mt-10">

<div class="card">

<h2 class="font-bold text-xl">

Popular Groups

</h2>

<ul class="mt-5 space-y-3">

<li>Laravel Indonesia</li>

<li>Machine Learning</li>

<li>Java Programming</li>

<li>UI UX Design</li>

</ul>

</div>

<div class="card">

<h2 class="font-bold text-xl">

Recent Discussion

</h2>

<ul class="mt-5 space-y-3">

<li>Rara shared PDF Laravel</li>

<li>Andi created Java Group</li>

<li>Budi joined ML Group</li>

</ul>

</div>

</div>

</x-app-layout>