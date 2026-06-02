<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login | Corte BBS Networks</title>

  <!-- Tailwind local -->
  <script src="../js/tailwindcss.js"></script>

  <!-- Tu CSS actual, si tiene fondo o estilos extra -->
  <link rel="stylesheet" href="../css/login.css">

  <!-- Iconos -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background:
        radial-gradient(circle at top left, rgba(34, 211, 238, 0.16), transparent 32%),
        radial-gradient(circle at bottom right, rgba(16, 185, 129, 0.13), transparent 35%),
        #020817;
    }

    .login-wrapper {
      background: rgba(15, 23, 42, 0.78);
      backdrop-filter: blur(18px);
      border: 1px solid rgba(191, 219, 254, 0.65);
      box-shadow: 0 30px 80px rgba(0, 0, 0, 0.45);
    }

    .login-input {
      background: rgba(15, 23, 42, 0.86);
      border: 1px solid rgba(148, 163, 184, 0.55);
      color: #f8fafc;
      transition: all 0.2s ease;
    }

    .login-input::placeholder {
      color: #64748b;
    }

    .login-input:focus {
      outline: none;
      border-color: #67e8f9;
      box-shadow: 0 0 0 4px rgba(103, 232, 249, 0.14);
    }

    .swal2-popup {
      border-radius: 22px !important;
      background: #0f172a !important;
      color: #f8fafc !important;
      border: 1px solid rgba(125, 211, 252, 0.45) !important;
    }

    .swal2-title {
      color: #f8fafc !important;
    }

    .swal2-html-container {
      color: #cbd5e1 !important;
    }

    .swal2-confirm {
      border-radius: 12px !important;
      background: linear-gradient(90deg, #67e8f9, #6ee7b7) !important;
      color: #020617 !important;
      font-weight: 800 !important;
      box-shadow: none !important;
    }
  </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4 text-white">

  <main class="login-wrapper w-full max-w-5xl rounded-[2rem] overflow-hidden grid grid-cols-1 lg:grid-cols-2">

    <!-- PANEL IZQUIERDO -->
    <section class="relative min-h-[430px] p-8 sm:p-10 bg-gradient-to-br from-cyan-950 via-slate-900 to-blue-950 overflow-hidden flex flex-col justify-between">

      <!-- Decoraciones -->
      <div class="absolute -top-24 -right-24 w-72 h-72 bg-cyan-400/20 rounded-full blur-3xl"></div>
      <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-emerald-400/20 rounded-full blur-3xl"></div>

      <div class="relative z-10">
        <div class="w-24 h-24 rounded-3xl border border-cyan-200/70 bg-cyan-400/10 flex items-center justify-center mb-8 shadow-lg shadow-cyan-500/10">
          <img src="../img/logo-blanco-mo.png" alt="Logo" class="w-16 h-16 object-contain">
        </div>

        <p class="text-cyan-200 text-sm uppercase tracking-[0.35em] font-bold mb-4">
          Bienvenido
        </p>

        <h1 class="text-4xl sm:text-5xl font-black leading-tight">
          Menu BBS <br>
          <span class="text-cyan-300">Networks</span>
        </h1>

        <p class="mt-5 text-slate-300 leading-relaxed max-w-md">
          Consulta ingresos, gastos, movimientos bancarios y distribución de ganancias desde un sistema seguro y moderno.
        </p>
      </div>

      <div class="relative z-10 grid grid-cols-3 gap-3 mt-8">
        <div class="rounded-2xl bg-white/5 border border-white/10 p-4">
          <i data-lucide="wallet" class="w-6 h-6 text-emerald-300 mb-2"></i>
          <p class="text-xs text-slate-300">Ingresos</p>
        </div>

        <div class="rounded-2xl bg-white/5 border border-white/10 p-4">
          <i data-lucide="receipt" class="w-6 h-6 text-cyan-300 mb-2"></i>
          <p class="text-xs text-slate-300">Gastos</p>
        </div>

        <div class="rounded-2xl bg-white/5 border border-white/10 p-4">
          <i data-lucide="bar-chart-3" class="w-6 h-6 text-blue-300 mb-2"></i>
          <p class="text-xs text-slate-300">Reportes</p>
        </div>
      </div>

    </section>

    <!-- PANEL DERECHO / FORMULARIO -->
    <section class="bg-slate-950/80 p-8 sm:p-12 flex items-center">
      <div class="w-full max-w-md mx-auto">

        <div class="mb-8">
          <p class="text-cyan-300 text-xs uppercase tracking-[0.3em] font-bold mb-3">
            Iniciar sesión
          </p>

          <h2 class="text-3xl font-black mb-2">
            Acceso al sistema
          </h2>

          <p class="text-slate-400">
            Ingresa tus credenciales para continuar.
          </p>
        </div>

        <form action="../php/login.php" method="POST" class="space-y-5">

          <!-- USUARIO -->
          <div>
            <label for="username" class="block text-sm font-semibold text-slate-200 mb-2">
              Usuario
            </label>

            <div class="relative">
              <i data-lucide="user" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-cyan-300/80"></i>

              <input
                id="username"
                name="username"
                type="text"
                autocomplete="username"
                placeholder="Ingresa tu usuario"
                required
                class="login-input w-full rounded-2xl py-4 pl-12 pr-4 text-sm"
              >
            </div>
          </div>

          <!-- CONTRASEÑA -->
          <div>
            <label for="password" class="block text-sm font-semibold text-slate-200 mb-2">
              Contraseña
            </label>

            <div class="relative">
              <i data-lucide="lock" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-cyan-300/80"></i>

              <input
                id="password"
                name="password"
                type="password"
                autocomplete="current-password"
                placeholder="Ingresa tu contraseña"
                required
                class="login-input w-full rounded-2xl py-4 pl-12 pr-12 text-sm"
              >

              <button
                type="button"
                onclick="togglePassword()"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-cyan-300 transition"
                aria-label="Mostrar contraseña"
              >
                <i data-lucide="eye" id="iconPassword" class="w-5 h-5"></i>
              </button>
            </div>
          </div>

          <!-- DETALLE -->
          <div class="flex items-center justify-between text-sm">
            <span class="text-slate-500">
              Sistema privado
            </span>

            <span class="text-cyan-300/80 font-semibold">
              BBS Networks
            </span>
          </div>

          <!-- BOTÓN -->
          <button
            type="submit"
            class="w-full rounded-2xl py-4 font-black text-slate-950 bg-gradient-to-r from-cyan-300 to-emerald-300 hover:from-cyan-200 hover:to-emerald-200 transition shadow-lg shadow-cyan-500/20 flex items-center justify-center gap-2"
          >
            <i data-lucide="log-in" class="w-5 h-5"></i>
            Iniciar sesión
          </button>

        </form>

        <div class="mt-8 pt-5 border-t border-slate-700/70 text-center">
          <p class="text-xs text-slate-500">
            © 2026 BBS Networks · Sistema de corte
          </p>
        </div>

      </div>
    </section>

  </main>

  <script>
    lucide.createIcons();

    function togglePassword() {
      const input = document.getElementById('password');
      const icon = document.getElementById('iconPassword');

      if (input.type === 'password') {
        input.type = 'text';
        icon.setAttribute('data-lucide', 'eye-off');
      } else {
        input.type = 'password';
        icon.setAttribute('data-lucide', 'eye');
      }

      lucide.createIcons();
    }

    const params = new URLSearchParams(window.location.search);
    const error = params.get('error');

    if (error === 'credenciales') {
      Swal.fire({
        icon: 'error',
        title: 'Acceso incorrecto',
        text: 'El usuario o la contraseña no son correctos.',
        confirmButtonText: 'Intentar de nuevo'
      });
    }

    if (error === 'conexion') {
      Swal.fire({
        icon: 'error',
        title: 'Error de conexión',
        text: 'No fue posible conectar con la base de datos.',
        confirmButtonText: 'Entendido'
      });
    }

    if (error === 'vacio') {
      Swal.fire({
        icon: 'warning',
        title: 'Campos incompletos',
        text: 'Ingresa tu usuario y contraseña para continuar.',
        confirmButtonText: 'Aceptar'
      });
    }

    if (error === 'metodo') {
      Swal.fire({
        icon: 'warning',
        title: 'Solicitud no válida',
        text: 'Debes iniciar sesión desde el formulario.',
        confirmButtonText: 'Aceptar'
      });
    }
  </script>

</body>
</html>