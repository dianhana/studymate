<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'StudyMate') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

        <div class="min-h-screen flex">

            {{-- ========================= --}}
            {{-- LEFT: BRAND PANEL --}}
            {{-- ========================= --}}

            <div class="hidden lg:flex lg:w-1/2 sidebar relative overflow-hidden flex-col justify-between p-12 text-white">

                {{-- Decorative circles --}}
                <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-white/5"></div>
                <div class="absolute bottom-0 -left-16 w-80 h-80 rounded-full bg-white/5"></div>
                <div class="absolute top-1/3 right-10 w-24 h-24 rounded-full bg-white/5"></div>

                <a href="/" class="relative z-10 flex items-center gap-3">
                    <div class="w-11 h-11 rounded-xl bg-white/15 flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <span class="text-2xl font-bold tracking-wide">StudyMate</span>
                </a>

                <div class="relative z-10 max-w-md">
                    <h1 class="text-4xl font-bold leading-tight">
                        Belajar bersama, capai lebih banyak.
                    </h1>
                    <p class="text-blue-100 mt-4 text-lg">
                        Temukan partner belajar, bergabung dengan study group, dan raih target akademikmu bersama StudyMate.
                    </p>

                    <div class="flex items-center gap-4 mt-10">
                        <div class="flex -space-x-3">
                            <img src="https://ui-avatars.com/api/?name=Rara&background=ffffff&color=1d4ed8" class="w-10 h-10 rounded-full ring-2 ring-blue-600">
                            <img src="https://ui-avatars.com/api/?name=Andi&background=ffffff&color=1d4ed8" class="w-10 h-10 rounded-full ring-2 ring-blue-600">
                            <img src="https://ui-avatars.com/api/?name=Budi&background=ffffff&color=1d4ed8" class="w-10 h-10 rounded-full ring-2 ring-blue-600">
                        </div>
                        <p class="text-sm text-blue-100">
                            Bergabung dengan ribuan pelajar lainnya
                        </p>
                    </div>
                </div>

                <p class="relative z-10 text-blue-200 text-sm">
                    &copy; {{ date('Y') }} StudyMate. Learn Together.
                </p>

            </div>

            {{-- ========================= --}}
            {{-- RIGHT: FORM PANEL --}}
            {{-- ========================= --}}

            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-6 sm:px-12 py-12 bg-gray-50">

                {{-- Logo mobile only --}}
                <a href="/" class="lg:hidden flex items-center gap-2 mb-8">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-800">StudyMate</span>
                </a>

                <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 sm:p-10">
                    {{ $slot }}
                </div>

            </div>

        </div>

    </body>
</html>