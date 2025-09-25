<!-- resources/views/superadmin/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperAdmin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Header -->
    <header class="bg-white shadow-sm py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold text-gray-800">👑 SuperAdmin Dashboard</h1>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg font-medium transition">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <p class="text-gray-600 mb-6 text-center">Bienvenido al panel de administración, gestiona usuarios, roles y configuraciones de la aplicación.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Tarjeta: Usuarios -->
            <a href="{{ url('/superadmin/usuarios') }}" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Usuarios</h2>
                        <p class="text-gray-500 mt-1">Gestiona todos los usuarios de la plataforma</p>
                    </div>
                    <div class="text-blue-500 text-3xl">👤</div>
                </div>
            </a>

            <!-- Tarjeta: Roles -->
            <a href="#" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Roles</h2>
                        <p class="text-gray-500 mt-1">Asigna y gestiona permisos por rol</p>
                    </div>
                    <div class="text-green-500 text-3xl">🛡️</div>
                </div>
            </a>

            <!-- Tarjeta: Configuración -->
            <a href="#" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Configuración</h2>
                        <p class="text-gray-500 mt-1">Ajustes generales de la aplicación</p>
                    </div>
                    <div class="text-yellow-500 text-3xl">⚙️</div>
                </div>
            </a>

            <!-- Tarjeta: Estadísticas -->
            <a href="#" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Estadísticas</h2>
                        <p class="text-gray-500 mt-1">Visualiza métricas y reportes de la app</p>
                    </div>
                    <div class="text-purple-500 text-3xl">📊</div>
                </div>
            </a>

        </div>
    </main>

</body>
</html>
