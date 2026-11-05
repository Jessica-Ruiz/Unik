document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('input[type="number"]').forEach(input => {
    input.addEventListener('change', () => {
      const min = Number(input.min || 1);
      const max = Number(input.max || 999);
      input.value = Math.max(min, Math.min(max, Number(input.value || min)));
    });
  });
});
