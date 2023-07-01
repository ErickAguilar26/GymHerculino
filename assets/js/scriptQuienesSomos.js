
function obtenerNombreEspecialidad(idServicio) {
    const servicio = servicios.find((servicio) => servicio.idServicio == idServicio);

    return servicio ? servicio.nombre : "";
}

function obtenerListaMiembros() {
    return new Promise((resolve, reject) => {
        // Filtrar empleados por idTipoEmpleado 3 y 4
        const empleadosFiltrados = empleados.filter(empleado => empleado.idTipoEmpleado === 3 || empleado.idTipoEmpleado === 4);

        // Realizar el join entre empleados y servicios
        const nuevoArray = empleadosFiltrados.map(empleado => {
            // Obtener el nombre del cargo mediante el join con el array de cargos
            const cargo = cargos.find(cargo => cargo.idCargo === empleado.idCargo);
            const nombreCargo = cargo ? cargo.nombre : "";

            // Filtrar las especialidades del empleado
            const especialidadesEmpleado = especialidades
                .filter(especialidad => especialidad.idEmpleado === empleado.idEmpleado)
                .map(especialidad => {
                    return obtenerNombreEspecialidad(especialidad.idServicio);
                });

            return {
                Nombre: empleado.nombres + ", " + empleado.a_paterno + " " + empleado.a_materno,
                Cargo: nombreCargo,
                Especialidad: especialidadesEmpleado.join(" - ")
            };
        });
        resolve(nuevoArray);
    });
}


function renderPreciosServicios(miembros) {
    return new Promise((resolve, reject) => {
        // Obtener el elemento contenedor de la tabla
        const contenedorTabla = document.getElementById('tablaEntrenadores');
        // Crear la tabla
        const tabla = document.createElement('table');
        //tabla.id = 'tabla-color';
        // Crear la fila de encabezado
        const encabezado = document.createElement('tr');
        // Agregar las celdas del encabezado de columna (días de la semana)
        const titulos = ['Nombre', 'Cargo', 'Especialidad'];
        titulos.forEach(titulo => {
            const celda = document.createElement('th');
            celda.textContent = titulo.charAt(0).toUpperCase() + titulo.slice(1); // Convertir la primera letra en mayúscula
            encabezado.appendChild(celda);
        });
        // Agregar el encabezado a la tabla
        tabla.appendChild(encabezado);
        // Agregar las filas de la tabla con los datos de servicios
        miembros.forEach((miembro, index) => {
            // Agregar la fila
            const fila = document.createElement('tr');
            // Agregar las celdas de datos
            titulos.forEach(tipo => {
                const celdaDatos = document.createElement('td');
                if (tipo === 'Area') {
                    celdaDatos.textContent = miembro['Especialidad'];
                } else {
                    celdaDatos.textContent = miembro[tipo];
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




async function traerEmpleados() {
    try {
        const response1 = await getEmpleados();
        const data1 = await response1.json();
        empleados = data1.data;

        const response2 = await getCargos();
        const data2 = await response2.json();
        cargos = data2.data;

        const response3 = await getEspecialidad();
        const data3 = await response3.json();
        especialidades = data3.data;

        const response4 = await getServicios();
        const data4 = await response4.json();
        servicios = data4.data;

        const miembros = await obtenerListaMiembros();
        console.log('miembros', miembros);

        const crearTabla = await renderPreciosServicios(miembros);
        console.log('crearTabla', crearTabla);

    } catch (error) {
        console.error(error);
        // Manejar el error de forma adecuada
    }
}

traerEmpleados();

loader1();