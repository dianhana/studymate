<div class="bg-white shadow-sm h-20 flex justify-between items-center px-10">

<div>

<h2 class="text-2xl font-semibold">

Dashboard

</h2>

<p class="text-gray-500">

Welcome back,

{{ Auth::user()->name }}

</p>

</div>

<div class="flex gap-4 items-center">

<input
type="text"
placeholder="Search Partner or Group..."
class="search">

<form method="POST"
action="{{ route('logout') }}">

@csrf

<button class="bg-red-500 px-5 py-2 rounded-lg text-white">

Logout

</button>

</form>

</div>

</div>