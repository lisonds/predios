document.getElementById('formAgregarFila').addEventListener('submit', function(event) {
    event.preventDefault();
  
    const altitud = document.getElementById('altitud').value;
    const alta = document.getElementById('valorAlta').value;
    const media = document.getElementById('valorMedia').value;
    const baja = document.getElementById('valorBaja').value;
    const tipo = document.getElementById('tipoTierra').value;
  
    const nuevaFila = `
      <tr>
        <td>${altitud}</td>
        <td>${alta}</td>
        <td>${media}</td>
        <td>${baja}</td>
      </tr>
    `;
  
    if (tipo === 'limpio') {
      document.getElementById('tablaCultivoLimpio').insertAdjacentHTML('beforeend', nuevaFila);
    } else if (tipo === 'permanente') {
      document.getElementById('tablaCultivoPermanente').insertAdjacentHTML('beforeend', nuevaFila);
    } else if (tipo === 'pastos') {
      document.getElementById('tablaPastos').insertAdjacentHTML('beforeend', nuevaFila);
    }
  
    // Limpiar formulario y cerrar modal
    this.reset();
    const modal = bootstrap.Modal.getInstance(document.getElementById('addYearModal'));
    modal.hide();
  });