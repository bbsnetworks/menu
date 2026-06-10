<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login/index.php");
    exit();
}

$tipoUsuario = $_SESSION['tipo'];

// ===============================
// CONFIG ADEUDOS
// ===============================
$ADEUDOS_LAN    = "http://192.168.99.253:5173/";
$ADEUDOS_TUNNEL = "http://b88e0bd2df17.sn.mynetname.net:5173/";
$LAN_HOST = "192.168.99.253";
$LAN_PORT = 5173;

function hostAlive($host, $port, $timeout = 0.35) {
    $errno = 0;
    $errstr = "";
    $fp = @fsockopen($host, $port, $errno, $errstr, $timeout);

    if ($fp) {
        fclose($fp);
        return true;
    }

    return false;
}

$ADEUDOS_URL = hostAlive($LAN_HOST, $LAN_PORT) ? $ADEUDOS_LAN : $ADEUDOS_TUNNEL;
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Menú BBS Networks</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <style>
   * {
  font-family: 'Inter', sans-serif;
}

body {
  background:
    radial-gradient(circle at top left, rgba(54, 216, 239, 0.18), transparent 32%),
    radial-gradient(circle at bottom right, rgba(99, 102, 241, 0.16), transparent 34%),
    linear-gradient(135deg, #020617 0%, #061826 45%, #060915 100%);
}

.menu-card {
  position: relative;
  min-height: 220px;
  padding: 28px;
  border-radius: 28px;
  overflow: hidden;

  display: flex;
  flex-direction: column;
  justify-content: space-between;
  gap: 24px;

  background:
    linear-gradient(145deg, rgba(15, 23, 42, 0.88), rgba(17, 48, 67, 0.65));

  border: 1px solid rgba(125, 211, 252, 0.24);

  box-shadow:
    inset 0 1px 0 rgba(255,255,255,0.05),
    0 18px 45px rgba(0,0,0,0.28);

  transition:
    transform .25s ease,
    border-color .25s ease,
    box-shadow .25s ease,
    background .25s ease;
}

.menu-card::before {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: 28px;
  background:
    radial-gradient(circle at top right, rgba(103, 232, 249, 0.18), transparent 35%),
    radial-gradient(circle at bottom left, rgba(110, 231, 183, 0.12), transparent 38%);
  opacity: 0;
  transition: opacity .25s ease;
  pointer-events: none;
}

.menu-card::after {
  content: "";
  position: absolute;
  inset: 0;
  border-radius: 28px;
  padding: 1px;
  background: linear-gradient(
    135deg,
    rgba(103, 232, 249, 0.9),
    rgba(110, 231, 183, 0.65),
    rgba(99, 102, 241, 0.55)
  );

  -webkit-mask:
    linear-gradient(#fff 0 0) content-box,
    linear-gradient(#fff 0 0);

  -webkit-mask-composite: xor;
  mask-composite: exclude;

  opacity: 0;
  transition: opacity .25s ease;
  pointer-events: none;
}

.menu-card:hover {
  transform: translateY(-6px);
  border-color: rgba(103, 232, 249, 0.55);
  background:
    linear-gradient(145deg, rgba(15, 23, 42, 0.98), rgba(18, 70, 85, 0.72));

  box-shadow:
    0 24px 60px rgba(0, 0, 0, 0.42),
    0 0 34px rgba(34, 211, 238, 0.14);
}

.menu-card:hover::before,
.menu-card:hover::after {
  opacity: 1;
}

.card-icon {
  width: 64px;
  height: 64px;
  border-radius: 22px;

  display: flex;
  align-items: center;
  justify-content: center;

  background: linear-gradient(135deg, rgba(34, 211, 238, 0.18), rgba(110, 231, 183, 0.12));
  border: 1px solid rgba(103, 232, 249, 0.4);

  box-shadow:
    0 0 24px rgba(34, 211, 238, 0.12),
    inset 0 1px 0 rgba(255,255,255,0.08);
}

.card-icon i {
  font-size: 30px;
  color: #67e8f9;
}

.menu-card h3 {
  position: relative;
  z-index: 2;

  font-size: 22px;
  line-height: 1.2;
  font-weight: 900;
  color: #ffffff;
}

.menu-card p {
  position: relative;
  z-index: 2;

  margin-top: 12px;
  color: #94a3b8;
  font-size: 14px;
  line-height: 1.65;
}

/* TABLET */
@media (max-width: 1024px) {
  .menu-card {
    min-height: 205px;
    padding: 24px;
  }
}

/* TELÉFONO */
@media (max-width: 640px) {
  body {
    background:
      radial-gradient(circle at top, rgba(54, 216, 239, 0.18), transparent 34%),
      linear-gradient(180deg, #020617 0%, #061826 55%, #050816 100%);
  }

  .menu-card {
    min-height: 170px;
    padding: 22px;
    border-radius: 24px;
  }

  .card-icon {
    width: 56px;
    height: 56px;
    border-radius: 19px;
  }

  .card-icon i {
    font-size: 26px;
  }

  .menu-card h3 {
    font-size: 20px;
  }

  .menu-card p {
    font-size: 13px;
  }
}
  </style>
</head>

<body class="min-h-screen text-white">

  <main class="min-h-screen px-4 py-8 sm:px-6 lg:px-10 flex items-center justify-center">

    <section class="w-full max-w-7xl">

      <!-- ENCABEZADO -->
      <header class="mb-5 sm:mb-6">
  <div class="rounded-[26px] border border-cyan-200/25 bg-slate-950/45 backdrop-blur-xl px-4 py-4 sm:px-6 sm:py-5 shadow-[0_10px_30px_rgba(0,0,0,.28)]">
    
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
      
      <!-- LADO IZQUIERDO -->
      <div class="flex items-center gap-4 min-w-0">
        <div class="w-16 h-16 sm:w-18 sm:h-18 rounded-2xl border border-cyan-300/45 bg-cyan-300/5 flex items-center justify-center shrink-0 shadow-lg shadow-cyan-500/10">
          <img src="img/logo-blanco-mo.png" alt="BBS Networks" class="w-10 sm:w-12">
        </div>

        <div class="min-w-0">
          <p class="text-cyan-300 text-[11px] sm:text-xs font-black tracking-[0.35em] uppercase">
            Bienvenido
          </p>

          <h1 class="mt-1 text-2xl sm:text-3xl lg:text-4xl font-black leading-none text-white">
            Menu BBS
            <span class="text-cyan-300 drop-shadow-[0_0_14px_rgba(103,232,249,.35)]">
              Networks
            </span>
          </h1>

          <p class="mt-2 text-slate-400 text-sm sm:text-[15px] leading-6">
            Selecciona el módulo al que deseas ingresar.
          </p>
        </div>
      </div>

      <!-- LADO DERECHO -->
      <div class="flex items-center justify-start sm:justify-end">
        <div class="inline-flex items-center gap-3 rounded-2xl border border-cyan-200/15 bg-white/5 px-4 py-3">
          <span class="w-2.5 h-2.5 rounded-full bg-emerald-300 shadow-[0_0_14px_rgba(110,231,183,.85)]"></span>
          <div>
            <p class="text-[11px] text-slate-500 leading-none">Usuario activo</p>
            <p class="text-sm font-bold text-cyan-200 leading-none mt-1">
              <?= htmlspecialchars($_SESSION['username']) ?>
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</header>

      <!-- CONTENEDOR DE CARDS -->
      <section class="rounded-[32px] border border-cyan-200/30 bg-slate-950/50 backdrop-blur-xl p-4 sm:p-6 lg:p-8 shadow-[0_24px_80px_rgba(0,0,0,.45)]">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-5">

          <?php if ($tipoUsuario != 'pagos'): ?>

            <!-- CONTRATOS -->
            <a href="../contratos/index.php" class="menu-card">
              <div class="card-icon">
                <i class="bi bi-file-earmark-medical-fill"></i>
              </div>

              <div>
                <h3>Contratos</h3>
                <p>Administra contratos, crea, edita y descarga archivos PDF.</p>
              </div>
            </a>

            <!-- CONTRATOS FIBRA -->
            <a href="../fibra/fibra/index.php" class="menu-card">
              <div class="card-icon">
                <i class="bi bi-router-fill"></i>
              </div>

              <div>
                <h3>Contratos Fibra</h3>
                <p>Gestiona contratos nuevos de fibra óptica.</p>
              </div>
            </a>

            <!-- CORTE -->
            <a href="../corte/gastos/index.php" class="menu-card">
              <div class="card-icon">
                <i class="bi bi-bar-chart-line-fill"></i>
              </div>

              <div>
                <h3>Corte</h3>
                <p>Consulta ingresos, gastos y reportes generales.</p>
              </div>
            </a>

            <!-- TICKET -->
            <a href="../ticket/index.php" class="menu-card">
              <div class="card-icon">
                <i class="bi bi-receipt-cutoff"></i>
              </div>

              <div>
                <h3>Ticket</h3>
                <p>Genera tickets y comprobantes del servicio.</p>
              </div>
            </a>

            <!-- TAREAS -->
            <a href="../tareas/index.php" class="menu-card">
              <div class="card-icon">
                <i class="bi bi-calendar-check-fill"></i>
              </div>

              <div>
                <h3>Tareas</h3>
                <p>Organiza órdenes de servicio y actividades técnicas.</p>
              </div>
            </a>

            <!-- ADEUDOS -->
            <a href="<?= $ADEUDOS_URL ?>" class="menu-card">
              <div class="card-icon">
                <i class="bi bi-exclamation-octagon-fill"></i>
              </div>

              <div>
                <h3>Adeudos</h3>
                <p>Consulta clientes con pagos pendientes.</p>
              </div>
            </a>

            <!-- AVISOS -->
            <a href="../envios/index.php" class="menu-card">
              <div class="card-icon">
                <i class="bi bi-megaphone-fill"></i>
              </div>

              <div>
                <h3>Avisos</h3>
                <p>Publica y consulta avisos internos del sistema.</p>
              </div>
            </a>

            <!-- PUNTO DE VENTA -->
            <a href="../smartgate-pv2/index.php" class="menu-card">
              <div class="card-icon">
                <i class="bi bi-cart-check-fill"></i>
              </div>

              <div>
                <h3>Punto de venta</h3>
                <p>Registra ventas y controla productos del inventario.</p>
              </div>
            </a>

          <?php endif; ?>

          <!-- PAGOS -->
          <a href="../pagos/index.php" class="menu-card relative">

            <span id="badgeSolicitudes"
                  class="hidden absolute top-4 right-4 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full z-20 shadow-lg shadow-red-500/25">
              0
            </span>

            <div class="card-icon">
              <i class="bi bi-cash-stack"></i>
            </div>

            <div>
              <h3>Pagos</h3>
              <p>Registra pagos, descuentos y consulta historial.</p>
            </div>
          </a>

          <!-- SALIR -->
          <a href="/menu/php/destruir_sesion.php" class="menu-card">
            <div class="card-icon">
              <i class="bi bi-box-arrow-left"></i>
            </div>

            <div>
              <h3>Salir</h3>
              <p>Cierra sesión y vuelve al acceso principal.</p>
            </div>
          </a>

        </div>

      </section>

      <footer class="mt-7 text-center text-xs text-slate-500">
        © 2026 BBS Networks · Sistema privado
      </footer>

    </section>

  </main>

  <script src="js/menu.js"></script>
</body>
</html>