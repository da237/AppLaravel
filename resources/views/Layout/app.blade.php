<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    @yield('content')

    @if(session('Mensaje'))
        <script>
            Swal.fire({
                title: 'Éxito',
                text: '{{ session("Mensaje") }}',
                icon: 'success'
            });
        </script>
    @endif

</body>
</html>
