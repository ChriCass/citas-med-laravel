<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Clínica Salud')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow-md px-6 py-3 flex justify-between items-center">
        <!-- Logo -->
        <div>
            <a href="{{ url('/') }}" class="text-xl font-bold text-blue-700">Clínica Salud</a>
        </div>
        <!-- Botones -->
        <div>
            @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                        Cerrar sesión
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                   Iniciar sesión
                </a>
            @endauth
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="flex-1 flex items-center justify-center p-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-inner py-4 text-center text-sm text-gray-600">
        © {{ date('Y') }} Clínica Salud - Todos los derechos reservados
    </footer>
</body>
</html>
