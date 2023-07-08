<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('app.name', 'laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" />
    {{-- Fontawsome icons --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-6.4.0-web/css/all.min.css') }}">

    {{-- Favicon --}}
    <link rel="icon" href="{{ URL::asset('champ_league-white.ico') }}" type="image/x-icon" />

    <!-- Scripts to incorporate Alpine and Tailwindcss -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- scripts SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Styles -->
    <!-- to incorporate Livewire styles -->
    @livewireStyles

</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">

        <!-- Navigation menu -->
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow-lg">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    <!-- to incorporate Livewire scripts -->
    @livewireScripts

    {{-- SweetAlert2 script  (1st msg, 2nd msg, ['success'/--}}
    <script>
        Livewire.on('alert', function(msg_1, msg_2, msg_3) {
            Swal.fire(
                msg_1,
                msg_2,
                msg_3
            )
        })
    </script>
    <script>
        Livewire.on('alert_delete', function(msg_1) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo(msg_1, 'delete')
                }
            })
        })
    </script>
</body>

</html>
