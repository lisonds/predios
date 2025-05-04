
/*ESTE VA SER EL QUE CAPTURA FORMULARIO */
if (document.querySelector("#formPredioRuralCal")) {//AQUI se valida si existe el id formulario en html
    let frmPredio=document.querySelector("#formPredioRuralCal");//
    frmPredio.onsubmit=function(e){//ejecutar al dar btn guardar
        e.preventDefault();//evitar que se recargue cuando damos el btn guardar
        btnGuardarPredio();//lamar funcion guardar
    }

    async function btnGuardarPredio() {

        
        
        
        let stranio=document.querySelector("#anio").value;
        let strTipoTerreno=document.querySelector("#tipoTerreno").value;
        let strUsoTerreno=document.querySelector("#usoTerreno").value;
        let strTierrasAptas=document.querySelector("#tierrasAptas").value;
        let strAltitud=document.querySelector("#altitud").value;
        let strCalidad=document.querySelector("#calidad").value;
        let strHectareas=document.querySelector("#hectareas").value;
        
        let accesoSI = document.querySelector("#acceso-si");
        let accesoNO = document.querySelector("#acceso-no");

        let idpredios=id;

        let accesoSeleccionado = "";

       //extraer datos de cada input
        if (accesoSI.checked) {
            accesoSeleccionado = "SI"; // "si"
        } else if (accesoNO.checked) {
            accesoSeleccionado = "NO"; // "no"
        }

        

        /* PREPARANDO LOS DATOS PARA ENVIAR AL BASE DE DATOS**/
        /**LO PRIMERO ES VER SI ESTE ANIO YA TIENE INFORMACION SI ES QUE YA TIENE NO DEBE  GUARDAR*/
        /*****************codogo */
        /** AQUI PREPARAMOS LOS DATOS PARA MANDAR*/
        if(accesoSeleccionado!="SI"){
            //aqui se tiene que guardar solo a 2 tablas anio_registro y rural.
            if (stranio==""||strTipoTerreno==""||strUsoTerreno==""||strTierrasAptas==""
                ||strAltitud==""||strCalidad==""||strHectareas==""||accesoSeleccionado==""
            ) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Todo Los datos Son Inportantes",
                    footer: '<a href="#">Why do I have this issue?</a>'
                  });
                return;
            }
            try {
                const data = new FormData();
                data.append('anio', stranio);
                data.append('selectRural', "1");
                data.append('idPredio', idpredios);
                data.append('tipoTerreno', strTipoTerreno);
                data.append('usoTerreno', strUsoTerreno);
                data.append('tierrasAptas', strTierrasAptas);
                data.append('altitud', strAltitud);
                data.append('calidad', strCalidad);
                data.append('hectareas', strHectareas);
                data.append('acceso', "0");
                let resp=await fetch(base_url+"/controlador/RuralUrbano_control.php?datos=agregar_dataRuralSinPredio",{
                    method:'POST',//mandar post
                    mode:'cors',
                    cache:'no-cache',// para que no guarde en cache
                    body: data
                });//con este codigo se mando un POST  AL ESE URL 
                const responseText = await resp.text(); // Leer como texto primero LO QUE deberia retornar en json
                       
                // Intenta convertir el texto a JSON
                const json = JSON.parse(responseText);
                
                if(json.status){//el mensaje de error se debe mostrar en SWALLLL
                    Swal.fire({//mostrar mensaje
                        icon: "success",
                        title: json.msg,//aqui vamos mostrar mensaje
                        showConfirmButton: false,
                        timer: 1900
                      });
                      
                      
    
                }else{
                   
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: json.msg,
                        footer: '<a href="#">Why do I have this issue?</a>'
                      });
                }
                
    
    
    
            } catch (error) {
                Swal.fire({
                    icon: "error",
                    title: "Try cach...",
                    text: "Ocurrio un Error: "+error,
                    footer: '<a href="#">Why do I have this issue?</a>'
                  });
                
            }


        }else{
            //a qui tiene que guardar a las tablas anio_registro, rural, construccio, edificacion
             //aqui se tiene que guardar solo a 2 tablas anio_registro y rural.
             console.log("SE VA MANDAR RURAL CON CONSTRUCCIONY EDIFICACION");
             if (stranio==""||strTipoTerreno==""||strUsoTerreno==""||strTierrasAptas==""
                ||strAltitud==""||strCalidad==""||strHectareas==""||accesoSeleccionado==""
            ) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Todo Los datos Son Inportantes del Predio",
                    footer: '<a href="#">Why do I have this issue?</a>'
                  });
                return;
            }
            /**DATOS PARA CONSTRUCCION */
            let strClasPredio=document.querySelector("#clasPredio").value;
            let strMaterialCons=document.querySelector("#MaterialCons").value;
            let strEstConseervacion=document.querySelector("#EstConservacion").value;
            let strtipoUso=document.querySelector("#tipoUso").value;
            if (strClasPredio==""||strMaterialCons==""||strEstConseervacion==""||strtipoUso=="") {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Todo Los datos Son Inportantes del Construccion",
                    footer: '<a href="#">Why do I have this issue?</a>'
                  });
                return;
            }
        
                        
            let tableBody = document.getElementById('tablaCuerpo');

            function obtenerDatosTablaJSON() {
                let datos = [];

                let filas = tableBody.querySelectorAll('tr');

                filas.forEach((fila) => {
                    let celdas = fila.querySelectorAll('td');

                    let filaDatos = {
                        bloque: '',
                        piso: '',
                        anioConstruccion: '',
                        muro: '',
                        techo: '',
                        pisos: '',
                        puertaVentana: '',
                        revestimiento: '',
                        bano: '',
                        instalacionesElectricas: '',
                        areaConstruida: ''
                    };

                    // Mapeamos por orden de las celdas
                    filaDatos.bloque = celdas[0].querySelector('select')?.value || '';
                    filaDatos.piso = celdas[1].querySelector('select')?.value || '';
                    filaDatos.anioConstruccion = celdas[2].querySelector('select')?.value || '';
                    filaDatos.muro = celdas[3].querySelector('select')?.value || '';
                    filaDatos.techo = celdas[4].querySelector('select')?.value || '';
                    filaDatos.pisos = celdas[5].querySelector('select')?.value || '';
                    filaDatos.puertaVentana = celdas[6].querySelector('select')?.value || '';
                    filaDatos.revestimiento = celdas[7].querySelector('select')?.value || '';
                    filaDatos.bano = celdas[8].querySelector('select')?.value || '';
                    filaDatos.instalacionesElectricas = celdas[9].querySelector('select')?.value || '';
                    filaDatos.areaConstruida = celdas[10].querySelector('input')?.value || '';

                    datos.push(filaDatos);
                });

                //console.log(datos);
                return datos;
            }

            const edificaciones = obtenerDatosTablaJSON();

            // ARMAR FORM DATA
            const data = new FormData();
            data.append('anio', stranio);
            data.append('selectRural', "1");// por que es rural
            data.append('idPredio', idpredios);
            data.append('tipoTerreno', strTipoTerreno);
            data.append('usoTerreno', strUsoTerreno);
            data.append('tierrasAptas', strTierrasAptas);
            data.append('altitud', strAltitud);
            data.append('calidad', strCalidad);
            data.append('hectareas', strHectareas);
            data.append('acceso', "1");//por que existe construccion
            data.append('clasPredio', strClasPredio);
            data.append('MatConstruccion', strMaterialCons);
            data.append('EstConservacion', strEstConseervacion);
            data.append('TipoUso', strtipoUso);
            data.append('edificacion', JSON.stringify(edificaciones)); // ENVIAR COMO JSON
        
            // HACER FETCH AL BACKEND
            try {
                let resp = await fetch(base_url + "/controlador/RuralUrbano_control.php?datos=agregar_dataRuralConPredio", {
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
                });
        
                const responseText = await resp.text(); // Leer como texto primero LO QUE deberia retornar en json
                       
                // Intenta convertir el texto a JSON
                const json = JSON.parse(responseText);
                
                if(json.status){//el mensaje de error se debe mostrar en SWALLLL
                    Swal.fire({//mostrar mensaje
                        icon: "success",
                        title: json.msg,//aqui vamos mostrar mensaje
                        showConfirmButton: false,
                        timer: 1900
                      });
                      
                      
    
                }else{
                   
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: json.msg,
                        footer: '<a href="#">Why do I have this issue?</a>'
                      });
                }
                
            } catch (error) {
                console.error("Error en la solicitud:", error);
                Swal.fire({
                    icon: "error",
                    title: "Fallo en la conexión Try Cach",
                    text: "No se pudo registrar el predio."
                });
            }
        }
    }
}

