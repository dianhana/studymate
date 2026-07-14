<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>StudyMate</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100 h-screen overflow-hidden">

    @include('partials.sidebar')

    <div class="ml-64 h-screen flex flex-col">

        @include('partials.navbar')

        <main class="flex-1 overflow-hidden p-8">

            {{ $slot }}

        </main>

    </div>

</body>

</html>