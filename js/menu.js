document.addEventListener('DOMContentLoaded', () => {
  fetch('php/contar_solicitudes.php')
    .then(res => res.json())
    .then(data => {
      if (data.total > 0) {
        const badge = document.getElementById('badgeSolicitudes');
        badge.textContent = data.total + " solicitudes";
        badge.classList.remove('hidden');
      }
    })
    .catch(error => console.error('Error al contar solicitudes:', error));
});