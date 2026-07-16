<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>StudyMate</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100">

    @include('partials.sidebar')

    <div class="ml-64">

        @include('partials.navbar')

        <div class="p-8">

            {{ $slot }}

        </div>

    </div>

</body>

</html>