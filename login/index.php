<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="../js/tailwindcss.js"></script>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body class="flex h-screen items-center justify-center">
    <div class="w-80 h-96 p-8 backdrop-blur-sm border-2 border-gradient-to-r from-orange-500 via-orange-300 to-yellow-300 rounded-2xl">
        <div class="flex items-center justify-center">
            <img src="../img/logo-blanco-mo.png" alt="Logo" class="w-48">
        </div>
        <form action="../php/login.php" method="POST" class="mt-16">
            <!-- <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Usuario" required>
            </div> -->
            <div class="sm:col-span-4">
                <div class="mt-2">
                    <input name="username" type="text" autocomplete="" placeholder="Usuario" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
            </div>
            <div class="sm:col-span-4">
                <div class="mt-10">
                    <input name="password" type="password" autocomplete="" placeholder="Password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                </div>
            </div>
            <!-- <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
            </div> -->
            <div class="flex items-center justify-center">
                <button type="submit" class="pointer-events-auto rounded-md bg-indigo-600 px-3 py-2 text-[0.8125rem]/5 font-semibold text-white hover:bg-indigo-500 mt-8">Iniciar Sesión</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
