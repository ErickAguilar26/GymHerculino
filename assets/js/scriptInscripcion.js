


function renderPreciosServicios(){
    return new Promise((resolve, reject)=>{
        // Obtener el elemento contenedor de la tabla
        const contenedorTabla = document.getElementById('contenedorTabla');
        // Crear la tabla
        const tabla = document.createElement('table');
        tabla.id = 'tabla-color';
        // Crear la fila de encabezado
        const encabezado = document.createElement('tr');
        // Crear la celda vacía del encabezado
        const celdaVacia = document.createElement('th');
        // Agregar la clase .celdaPrimera a la celda vacia
        celdaVacia.textContent = 'Clases';
        celdaVacia.classList.add('filasregistro');
        encabezado.appendChild(celdaVacia);
        // Agregar las celdas del encabezado de columna (días de la semana)
        const tipoPago = ['Precio por día', 'Precio por mes'];
        tipoPago.forEach(dia => {
            const celda = document.createElement('th');
            celda.textContent = dia.charAt(0).toUpperCase() + dia.slice(1); // Convertir la primera letra en mayúscula
            encabezado.appendChild(celda);
        });
        // Agregar el encabezado a la tabla
        tabla.appendChild(encabezado);
        // Agregar las filas de la tabla con los datos de servicios
        servicios.forEach((servicio, index) => {
            const fila = document.createElement('tr');
            // Agregar la celda del criterio de fila (nombre del servicio)
            const celdaServicio = document.createElement('th');
            celdaServicio.textContent = `Clase de ` + servicio.nombre;
            if(servicio.color !== ""){
                celdaServicio.style.backgroundColor = servicio.color;
            }
            fila.appendChild(celdaServicio);
            // Agregar las celdas de datos
            tipoPago.forEach((tipo, columnIndex) => {
                const celdaDatos = document.createElement('td');
                console.log(tipo);
                if(tipo !='Precio por mes'){
                    celdaDatos.textContent = servicio.precio_dia
                }
                else{
                    celdaDatos.textContent = servicio.precio_mes
                }
                fila.appendChild(celdaDatos);
            });
            // Agregar la fila a la tabla
            tabla.appendChild(fila);
        });
        // Agregar la tabla al contenedor
        contenedorTabla.appendChild(tabla);


        resolve(true);
    });
}




async function traerServicios() {
    try {
        const response1 = await getServicios();
        const data1 = await response1.json();
        servicios = data1.data;
        console.log(servicios);

        const preciosServiciosResponse = await renderPreciosServicios();
        if (preciosServiciosResponse === true) {
            console.log('Todo correcto');
        } else {
            console.log('Todo mal');
        }
    } catch (error) {
        console.error(error);
        // Manejar el error de forma adecuada
    }
}

traerServicios();
loader1();