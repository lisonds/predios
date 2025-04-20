/*Para activar el btn y seleccionar los modal que se va abrir en RUral Urbano */
document.addEventListener("DOMContentLoaded", function () {
    const btnIngresar = document.getElementById("btnIngresar");
    const ruralRadio = document.getElementById("rural");
    const urbanoRadio = document.getElementById("urbano");
    const offRadio = document.getElementById("no-seleccionado");

    const modalRural = new bootstrap.Modal(document.getElementById('modalRural'));
    const modalUrbano = new bootstrap.Modal(document.getElementById('modalUrbano'));

    function updateButton() {
      if (ruralRadio.checked) {
        btnIngresar.disabled = false;
        btnIngresar.onclick = () => modalRural.show();
      } else if (urbanoRadio.checked) {
        btnIngresar.disabled = false;
        btnIngresar.onclick = () => modalUrbano.show();
      } else {
        btnIngresar.disabled = true;
        btnIngresar.onclick = null;
      }
    }

    ruralRadio.addEventListener("change", updateButton);
    urbanoRadio.addEventListener("change", updateButton);
    offRadio.addEventListener("change", updateButton);

    updateButton();
  });

  document.addEventListener("DOMContentLoaded", function() {
    const anioInput = document.getElementById("anio");
    const currentYear = new Date().getFullYear();
    anioInput.value = currentYear;
  });

  function mostrarConstruccion(mostrar) {
    const collapse = document.getElementById('contenidoConstruccion');
    const bsCollapse = new bootstrap.Collapse(collapse, {
      toggle: false
    });

    if (mostrar) {
      bsCollapse.show();
    } else {
      bsCollapse.hide();
    }
  }


  /**PARA AGREGAR FILA A LA TABLA */
  document.getElementById("agregarFila").addEventListener("click", function(event) {
    // Detener la propagación del evento para que no se active otras funciones
    event.preventDefault();

    const tableBody = document.getElementById("tablaCuerpo");

    // Crear una nueva fila con los campos
    const newRow = document.createElement("tr");

    newRow.innerHTML = `
        <td>
            <select class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </td>
        <td>
            <select class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </td>
        <td>
            <select class="form-control" name="anio">
                <option value="2025" selected>2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
                <option value="1999">1999</option>
                <option value="1998">1998</option>
                <option value="1997">1997</option>
                <option value="1996">1996</option>
                <option value="1995">1995</option>
                <option value="1994">1994</option>
                <option value="1993">1993</option>
                <option value="1992">1992</option>
                <option value="1991">1991</option>
                <option value="1990">1990</option>
            </select>
        </td>
        <td>
            <select class="form-control">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
            </select>
        </td>
        <td>
            <select class="form-control">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
            </select>
        </td>
        <td>
            <select class="form-control">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
            </select>
        </td>
        <td>
            <select class="form-control">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
            </select>
        </td>
        <td>
            <select class="form-control">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
            </select>
        </td>
        <td>
            <select class="form-control">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
            </select>
        </td>
        <td>
            <select class="form-control">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
                <option value="H">H</option>
                <option value="I">I</option>
            </select>
        </td>
        <td>
            <input type="number" class="form-control" placeholder="Área en m²" />
        </td>
    `;

    // Agregar la fila al cuerpo de la tabla
    tableBody.appendChild(newRow);
});

/*Quitar el ultima Fila de la tabla al hacer click*/
document.getElementById("quitarFila").addEventListener("click", function () {
    const tableBody = document.getElementById("tablaCuerpo");
    if (tableBody.rows.length > 0) {
      tableBody.deleteRow(tableBody.rows.length - 1);
    }
  });