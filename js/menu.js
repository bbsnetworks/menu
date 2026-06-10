document.addEventListener('DOMContentLoaded', () => {
  const badge = document.getElementById('badgeSolicitudes');

  if (!badge) return;

  fetch('php/contar_solicitudes.php')
    .then(res => res.json())
    .then(data => {
      const total = Number(data.total || 0);

      if (total > 0) {
        badge.textContent = `${total} solicitudes`;
        badge.classList.remove('hidden');
      } else {
        badge.classList.add('hidden');
      }
    })
    .catch(error => {
      console.error('Error al contar solicitudes:', error);
      badge.classList.add('hidden');
    });
});