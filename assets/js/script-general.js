document.getElementById('linkAutovaluo').addEventListener('click', function(e) {
    e.preventDefault();

    const codigo = document.getElementById('searchInputPropietario').value.trim();

    if (codigo !== '') {
        // Redirige a viewPredios.php con el código en la URL
        window.location.href = `viewPredios.php?codigo=${encodeURIComponent(codigo)}`;
    } else {
        window.location.href = `viewPredios.php`;
    }
});

window.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('searchInputPredio');

    if (input.value.trim() !== '') {
        // Simula selección y deselección del input
        input.focus();         // Simula que el usuario hace clic
        input.blur();          // Simula que el usuario sale del input

        // Opcional: si tienes un listener como onchange o input
        // puedes forzar su ejecución manualmente así:
        const event = new Event('change', { bubbles: true });
        input.dispatchEvent(event);
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const inputAnio = document.getElementById('anio');
    if (inputAnio) {
      inputAnio.value = new Date().getFullYear();
    }
  });

