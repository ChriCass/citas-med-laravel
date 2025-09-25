<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Cajero</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Header -->
    <header class="bg-white shadow-sm py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-2xl font-bold text-gray-800">💵 Panel Cajero</h1>
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
        <p class="text-gray-600 mb-6 text-center">
            Bienvenido al área de cajeros. Aquí puedes gestionar pagos y registrar transacciones de pacientes.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Tarjeta: Ver Pagos -->
            <a href="{{ url('/cajero/pagos') }}" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Ver Pagos</h2>
                        <p class="text-gray-500 mt-1">Consulta y administra los pagos registrados</p>
                    </div>
                    <div class="text-green-500 text-3xl">📑</div>
                </div>
            </a>

            <!-- Tarjeta: Historial de Pagos -->
            <a href="{{ url('/cajero/historial') }}" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Historial de Pagos</h2>
                        <p class="text-gray-500 mt-1">Revisa los pagos realizados previamente</p>
                    </div>
                    <div class="text-blue-500 text-3xl">🗂️</div>
                </div>
            </a>

            <!-- Tarjeta: Reportes -->
            <a href="{{ url('/cajero/reportes') }}" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Reportes</h2>
                        <p class="text-gray-500 mt-1">Genera reportes de pagos y transacciones</p>
                    </div>
                    <div class="text-yellow-500 text-3xl">📊</div>
                </div>
            </a>

        </div>
    </main>

</body>
</html>
