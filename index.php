<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login/index.php");
    exit();
}
// Guardar el tipo de usuario
$tipoUsuario = $_SESSION['tipo'];
//echo "Bienvenido, " . $_SESSION['username'];
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    @keyframes borderPulse {
      0% { filter: hue-rotate(0deg); }
      100% { filter: hue-rotate(360deg); }
    }
    .animate-border {
      animation: borderPulse 8s linear infinite;
    }
  </style>
</head>

<body class="bg-gradient-to-b from-[#0f0f0f] to-[#1a1a1a] text-white min-h-screen flex items-center justify-center relative">

  <!-- Marca de agua -->
  <div class="absolute inset-0 flex justify-center items-center pointer-events-none z-0 opacity-5">
    <img src="img/logo-blanco-mo.png" class="w-[60%] max-w-2xl" alt="Marca de agua">
  </div>

  <div class="relative z-10 w-full max-w-7xl px-6 py-12">

    <!-- Encabezado -->
    <div class="text-center mb-12">
      <h1 class="text-4xl font-bold tracking-widest text-blue-400">Panel de Control</h1>
      <img src="img/logo-blanco-mo.png" alt="Logo" class="mx-auto mt-4 w-40 sm:w-52" />
    </div>

    <!-- Grid de tarjetas -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-10">
      <?php if ($tipoUsuario != 'pagos'): ?>
      <!-- Tarjeta ejemplo: CONTRATOS -->
      <div onclick="location.href='../contratos/index.php'" class="relative group h-[220px] cursor-pointer transition-transform hover:scale-105 overflow-hidden rounded-2xl">
        
        <!-- Borde más visible -->
        <div class="absolute inset-0 p-[6px] rounded-2xl animate-border bg-[conic-gradient(at_top_left,_cyan,_blue,_purple,_cyan)] blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-0"></div>
        
        <!-- Fondo interno -->
        <div class="relative bg-[#1f1f1f] rounded-2xl w-full h-full flex flex-col justify-center items-center text-center z-10 border border-gray-700">
          
          <!-- Ícono + Título centrado (desaparece al hover) -->
          <div class="absolute inset-0 flex flex-col items-center justify-center transition-all duration-500 group-hover:opacity-0">
            <div class="text-6xl text-blue-300 mb-2"><i class="bi bi-file-earmark-medical-fill"></i></div>
            <div class="text-xl font-semibold tracking-wide text-blue-100">Contratos</div>
          </div>

          <!-- Texto hover -->
          <div class="relative opacity-0 group-hover:opacity-100 transition-opacity duration-500 mt-4 z-10">
            <div class="text-xl font-semibold tracking-wide text-blue-100 mb-2">Contratos</div>
            <div class="text-sm text-gray-400">Administra contratos, crea, edita y descarga archivos PDF para cada cliente.</div>
          </div>

        </div>
      </div>

      <!-- Copia y personaliza esta estructura para las siguientes tarjetas -->

      <!-- CORTE -->
      <div onclick="location.href='../corte/gastos/index.php'" class="relative group h-[220px] cursor-pointer transition-transform hover:scale-105 overflow-hidden rounded-2xl">
        <div class="absolute inset-0 p-[6px] rounded-2xl animate-border bg-[conic-gradient(at_top_left,_cyan,_blue,_purple,_cyan)] blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-0"></div>
        <div class="relative bg-[#1f1f1f] rounded-2xl w-full h-full flex flex-col justify-center items-center text-center z-10 border border-gray-700">
          <div class="absolute inset-0 flex flex-col items-center justify-center transition-all duration-500 group-hover:opacity-0">
            <div class="text-6xl text-blue-300 mb-2"><i class="bi bi-file-earmark-bar-graph"></i></div>
            <div class="text-xl font-semibold tracking-wide text-blue-100">Corte</div>
          </div>
          <div class="relative opacity-0 group-hover:opacity-100 transition-opacity duration-500 mt-4 z-10">
            <div class="text-xl font-semibold tracking-wide text-blue-100 mb-2">Corte</div>
            <div class="text-sm text-gray-400">Consulta ingresos, egresos y genera reportes diarios o mensuales.</div>
          </div>
        </div>
      </div>

      <!-- TICKET -->
      <div onclick="location.href='../ticket/index.php'" class="relative group h-[220px] cursor-pointer transition-transform hover:scale-105 overflow-hidden rounded-2xl">
        <div class="absolute inset-0 p-[6px] rounded-2xl animate-border bg-[conic-gradient(at_top_left,_cyan,_blue,_purple,_cyan)] blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-0"></div>
        <div class="relative bg-[#1f1f1f] rounded-2xl w-full h-full flex flex-col justify-center items-center text-center z-10 border border-gray-700">
          <div class="absolute inset-0 flex flex-col items-center justify-center transition-all duration-500 group-hover:opacity-0">
            <div class="text-6xl text-blue-300 mb-2"><i class="bi bi-receipt"></i></div>
            <div class="text-xl font-semibold tracking-wide text-blue-100">Ticket</div>
          </div>
          <div class="relative opacity-0 group-hover:opacity-100 transition-opacity duration-500 mt-4 z-10">
            <div class="text-xl font-semibold tracking-wide text-blue-100 mb-2">Ticket</div>
            <div class="text-sm text-gray-400">Genera tickets con resumen del servicio y firma digital.</div>
          </div>
        </div>
      </div>

      <!-- TAREAS -->
      <div onclick="location.href='../tareas/index.php'" class="relative group h-[220px] cursor-pointer transition-transform hover:scale-105 overflow-hidden rounded-2xl">
        <div class="absolute inset-0 p-[6px] rounded-2xl animate-border bg-[conic-gradient(at_top_left,_cyan,_blue,_purple,_cyan)] blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-0"></div>
        <div class="relative bg-[#1f1f1f] rounded-2xl w-full h-full flex flex-col justify-center items-center text-center z-10 border border-gray-700">
          <div class="absolute inset-0 flex flex-col items-center justify-center transition-all duration-500 group-hover:opacity-0">
            <div class="text-6xl text-blue-300 mb-2"><i class="bi bi-calendar-event-fill"></i></div>
            <div class="text-xl font-semibold tracking-wide text-blue-100">Tareas</div>
          </div>
          <div class="relative opacity-0 group-hover:opacity-100 transition-opacity duration-500 mt-4 z-10">
            <div class="text-xl font-semibold tracking-wide text-blue-100 mb-2">Tareas</div>
            <div class="text-sm text-gray-400">Organiza órdenes de servicio y asigna personal técnico en campo.</div>
          </div>
        </div>
      </div>
<?php endif; ?>
      <!-- PAGOS -->
      <!-- PAGOS -->
<div onclick="location.href='../pagos/index.php'" class="relative group h-[220px] cursor-pointer transition-transform hover:scale-105 overflow-hidden rounded-2xl">
  
  <!-- BADGE NOTIFICACIÓN -->
  <span id="badgeSolicitudes"
        class="hidden absolute top-3 right-3 bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full z-20 shadow-lg">
    0
  </span>

  <!-- Borde animado -->
  <div class="absolute inset-0 p-[6px] rounded-2xl animate-border bg-[conic-gradient(at_top_left,_cyan,_blue,_purple,_cyan)] blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-0"></div>

  <!-- Contenido -->
  <div class="relative bg-[#1f1f1f] rounded-2xl w-full h-full flex flex-col justify-center items-center text-center z-10 border border-gray-700">
    <div class="absolute inset-0 flex flex-col items-center justify-center transition-all duration-500 group-hover:opacity-0">
      <div class="text-6xl text-blue-300 mb-2"><i class="bi bi-cash-stack"></i></div>
      <div class="text-xl font-semibold tracking-wide text-blue-100">Pagos</div>
    </div>
    <div class="relative opacity-0 group-hover:opacity-100 transition-opacity duration-500 mt-4 z-10">
      <div class="text-xl font-semibold tracking-wide text-blue-100 mb-2">Pagos</div>
      <div class="text-sm text-gray-400">Registra pagos, descuentos y visualiza el historial del cliente.</div>
    </div>
  </div>
</div>


      <!-- SALIR -->
      <div onclick="location.href='/menu/php/destruir_sesion.php'" class="relative group h-[220px] cursor-pointer transition-transform hover:scale-105 overflow-hidden rounded-2xl">
        <div class="absolute inset-0 p-[6px] rounded-2xl animate-border bg-[conic-gradient(at_top_left,_cyan,_blue,_purple,_cyan)] blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-0"></div>
        <div class="relative bg-[#1f1f1f] rounded-2xl w-full h-full flex flex-col justify-center items-center text-center z-10 border border-gray-700">
          <div class="absolute inset-0 flex flex-col items-center justify-center transition-all duration-500 group-hover:opacity-0">
            <div class="text-6xl text-blue-300 mb-2"><i class="bi bi-box-arrow-left"></i></div>
            <div class="text-xl font-semibold tracking-wide text-blue-100">Salir</div>
          </div>
          <div class="relative opacity-0 group-hover:opacity-100 transition-opacity duration-500 mt-4 z-10">
            <div class="text-xl font-semibold tracking-wide text-blue-100 mb-2">Salir</div>
            <div class="text-sm text-gray-400">Cierra sesión y vuelve de forma segura al login.</div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <script src="js/menu.js"></script>
</body>
</html>
