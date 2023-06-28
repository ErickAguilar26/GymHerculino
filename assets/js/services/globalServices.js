'use strict'

function getSedes() {
    return fetch('../assets/js/models/sedes.json', {
        mode: 'no-cors',
        headers: {
            'Access-Control-Allow-Origin': '*'
        }
    });
}

function getdepartamentos() {
    return fetch('../assets/js/models/departamentos.json', {
        mode: 'no-cors',
        headers: {
            'Access-Control-Allow-Origin': '*'
        }
    });
}

function getServicios() {
    return fetch('../assets/js/models/servicios.json', {
        mode: 'no-cors',
        headers: {
            'Access-Control-Allow-Origin': '*'
        }
    });
}