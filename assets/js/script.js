var servicios= [];

function getServicios() {
    return fetch('assets/js/models/servicios.json', {
        mode: 'no-cors',
        headers: {
            'Access-Control-Allow-Origin': '*'
        }
    });
}


var carrusel = [
    {
        nombre: '1',
        link: 'assets/img/2.jpg',
        descripcion: ''
    },
    {
        nombre: '2',
        link: 'assets/img/3.jpg',
        descripcion: ''
    },
    {
        nombre: '3',
        link: 'assets/img/4.jpg',
        descripcion: ''
    },
    {
        nombre: '4',
        link: 'assets/img/12.jpg',
        descripcion: ''
    }
]

function renderCarrusel(){
    return new Promise((resolve, reject)=>{
        plantillaCarrusel = ``;
        for(var x = 0; x<carrusel.length; x++){
            console.log('carrusel.link',carrusel[x].link);
            if(x !== 0){
                plantillaCarrusel += `<img src="${carrusel[x].link}" alt="${carrusel[x].descripcion}" style="opacity: 0">`;
            }
            else{
                plantillaCarrusel += `<img src="${carrusel[x].link}" alt="${carrusel[x].descripcion}" style="opacity: 1">`;
            }
        }
        resolve(plantillaCarrusel);
    });

}

function readyCarrusel(plantilla){
    document.getElementById("carousel").innerHTML = plantilla;
    
    var images = Array.from(document.getElementById('carousel').children);
    var currentImageIndex = 0;
    var totalImages = images.length;

    function changeImage() {
        console.log('changeImage');
        images[currentImageIndex].style.opacity = '0';
        currentImageIndex++;
        if (currentImageIndex === totalImages) {
            currentImageIndex = 0;
        }
        images[currentImageIndex].style.opacity = '1';
    }
    setInterval(changeImage, 2500);
}



function renderCalendarioServicios(){
    
    return new Promise((resolve, reject)=>{
        // Obtener el elemento contenedor de la tabla
        const contenedorTabla = document.getElementById('horarios');
        // Crear la tabla
        const tabla = document.createElement('table');
        // Crear la fila de encabezado
        const encabezado = document.createElement('tr');
        // Crear la celda vacía del encabezado
        const celdaVacia = document.createElement('th');
        // Agregar la clase .celdaPrimera a la celda vacia
        celdaVacia.classList.add('celdaPrimera');
        encabezado.appendChild(celdaVacia);
        // Agregar las celdas del encabezado de columna (días de la semana)
        const diasSemana = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado'];
        diasSemana.forEach(dia => {
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
            celdaServicio.textContent = servicio.nombre;
            if(servicio.color !== ""){
                celdaServicio.style.backgroundColor = servicio.color;
            }
            fila.appendChild(celdaServicio);
            // Agregar las celdas de datos
            diasSemana.forEach((dia, columnIndex) => {
                const celdaDatos = document.createElement('td');
                if (servicio[dia] === "0") {
                    celdaDatos.textContent = 'Sin servicio';
                    celdaDatos.style.color = 'red';
                    celdaDatos.style.fontWeight = 'bold';
                } else if (servicio[dia] === "1") {
                    const rangoHoras = servicio[dia + '_rangoHoras'];
                    celdaDatos.textContent = rangoHoras;
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

// function traerServicios(){
//     getServicios()
//         .then(response => response.json())
//         .then(data => {
//             servicios = data.data;
//             return renderCarrusel();
//         })
//         .then(response => {
//             readyCarrusel(response);
//             return renderCalendarioServicios();
//         })
//         .then(response => {
//             if(response == true){
//                 console.log('Todo correcto');
//             }
//             else{
//                 console.log('Todo mal');
//             }
//         })

//         .catch(error => {
//             console.error(error);
//             // Manejar el error de forma adecuada
//         });
// }

async function traerServicios() {
    try {
      const response = await getServicios();
      const data = await response.json();
      servicios = data.data;
  
      const carruselResponse = await renderCarrusel();
      readyCarrusel(carruselResponse);
  
      const calendarioResponse = await renderCalendarioServicios();
      if (calendarioResponse === true) {
        console.log('Todo correcto');
      } else {
        console.log('Todo mal');
      }
    } catch (error) {
      console.error(error);
      // Manejar el error de forma adecuada
    }
  }

traerServicios()

loader();