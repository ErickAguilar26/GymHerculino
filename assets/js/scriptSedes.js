async function renderizadoContenedorSedes(element, idSede) {
    removeAnimation();
    removeColor();
    renderColor(element);
    let sede = sedes.filter(sede => sede.idSede == idSede);
    var plantillaContenedorSedes = `<h2>Sede ${sede[0].descripcion}</h2>
      <img src="${sede[0].imagen}" alt="">
      <p>${sede[0].observacion}</p>
      ${sede[0].mapa}
      <label><b>Fecha de apertura:</b> ${ConvertFromDate112(sede[0].fechaApertura)}</label>`;
    document.getElementById("contenedorSedes").innerHTML = plantillaContenedorSedes;
}

function removeAnimation() {
    let tableRows = document.querySelectorAll('#sedes table tr');
    tableRows.forEach(row => {
        row.classList.remove('intermitenteColorPrrimario');
    });
}

function renderColor(element) {
    element.style.backgroundColor = 'var(--color-secondary)';
}

function removeColor() {
    let tables = document.querySelectorAll('#sedes table');
    tables.forEach(table => {
        let rows = table.querySelectorAll('tr td');
        rows.forEach(row => {
            row.style.backgroundColor = 'white';
        });

    });
}

function renderTable() {
    return new Promise((resolve, reject) => {
        var plantillaSedes = ``;
        var plantillaLocales = ``;
        for (let x = 0; x < departamentos.length; x++) {
            let sedesFiltrada = sedes.filter(sede => departamentos[x].idDepartamento == sede.idDepartamento);
            plantillaLocales = ``;
            for (let i = 0; i < sedesFiltrada.length; i++) {
                plantillaLocales += `<tr><td class="local" onClick="renderizadoContenedorSedes(this,${sedesFiltrada[i].idSede});">${sedesFiltrada[i].descripcion}</td></tr>`;
            }
            plantillaSedes += `<table>
            <tr>
                <th>${departamentos[x].descripcion}</th>
            </tr>${plantillaLocales}
            </table>`;
        }
        resolve(plantillaSedes);
    });
}

function inicializador(plantilla) {
    document.getElementById("sedes").innerHTML = plantilla;
    // Obtener todas las tablas dentro del contenedor
    const tables = document.querySelectorAll('#sedes table');
    // Obtener la primera tabla
    const firstTable = tables[0];
    // Obtener la primera fila de la primera tabla
    const firstRow = firstTable.querySelector('tr:nth-child(2)');
    firstRow.classList.add('intermitenteColorPrrimario');
}

// function traerSedes() {
//     getSedes()
//         .then(response => response.json())
//         .then(data => {
//             sedes = data.data;
//             return getdepartamentos();
//         })
//         .then(response => response.json())
//         .then(data => {
//             departamentos = data.data;
//             return renderTable();
//         })
//         .then(response => {
//             inicializador(response);
//         })
//         .catch(error => {
//             console.error(error);
//             // Manejar el error de forma adecuada
//         });
//     console.log('ejec');
// }

async function traerSedes() {
    try {
        const response1 = await getSedes();
        const data1 = await response1.json();
        sedes = data1.data;

        const response2 = await getdepartamentos();
        const data2 = await response2.json();
        departamentos = data2.data;

        const response3 = await renderTable();
        inicializador(response3);
    } catch (error) {
        console.error(error);
        // Manejar el error de forma adecuada
    }
}

traerSedes();
loader1();





// function relacionarSedesDepartamentos(){
//     return sedes.map(item => {
//         const descripcionDepartamento = departamentos.find(depto => depto.idDepartamento === item.idDepartamento)?.descripcion;
//         return {
//           ...item,
//           descripcionDepartamento,
//         };
//     });
// }
//var sedesFinal = relacionarSedesDepartamentos();