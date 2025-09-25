<!-- resources/views/superadmin/usuarios.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - SuperAdmin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Usuarios</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario para crear usuario -->
        <div class="bg-white p-6 rounded shadow mb-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Crear nuevo usuario</h2>
            <form action="{{ url('/superadmin/usuarios') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="dni" placeholder="DNI" required class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <input type="text" name="apellidos" placeholder="Apellidos" required class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <input type="text" name="nombres" placeholder="Nombres" required class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <input type="email" name="email" placeholder="Email" required class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <input type="password" name="password" placeholder="Contraseña" required class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <input type="text" name="rol" placeholder="Rol (ej: superadmin)" required class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded font-semibold transition">Crear Usuario</button>
            </form>
        </div>

        <!-- Tabla de usuarios -->
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Lista de usuarios</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left px-4 py-2 font-medium text-gray-600 border-b">ID</th>
                            <th class="text-left px-4 py-2 font-medium text-gray-600 border-b">DNI</th>
                            <th class="text-left px-4 py-2 font-medium text-gray-600 border-b">Apellidos</th>
                            <th class="text-left px-4 py-2 font-medium text-gray-600 border-b">Nombres</th>
                            <th class="text-left px-4 py-2 font-medium text-gray-600 border-b">Email</th>
                            <th class="text-left px-4 py-2 font-medium text-gray-600 border-b">Roles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border-b">{{ $usuario->id }}</td>
                                <td class="px-4 py-2 border-b">{{ $usuario->dni }}</td>
                                <td class="px-4 py-2 border-b">{{ $usuario->apellidos }}</td>
                                <td class="px-4 py-2 border-b">{{ $usuario->nombres }}</td>
                                <td class="px-4 py-2 border-b">{{ $usuario->email }}</td>
                                <td class="px-4 py-2 border-b">{{ $usuario->roles->pluck('nombre')->join(', ') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
