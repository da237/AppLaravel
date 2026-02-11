<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Navbar --}}
    @include('Layout.navbar')

    {{-- Contenido principal --}}
    <main class="flex-grow container mx-auto p-6">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layout.footer')

    {{-- Alertas globales --}}
    @if(session('Mensaje'))
        <script>
            Swal.fire({
                title: 'Éxito',
                text: @json(session('Mensaje')),
                icon: 'success'
            });
        </script>
    @endif

</body>
</html>
