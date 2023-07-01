'use strict'
var servicios = [];
var sedes= [];
var departamentos = [];
var empleados = [];
var areas= [];
var cargos = [];
var especialidades = [];

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

function getEmpleados() {
    return fetch('../assets/js/models/empleados.json', {
        mode: 'no-cors',
        headers: {
            'Access-Control-Allow-Origin': '*'
        }
    });
}

function getAreas() {
    return fetch('../assets/js/models/areas.json', {
        mode: 'no-cors',
        headers: {
            'Access-Control-Allow-Origin': '*'
        }
    });
}

function getCargos() {
    return fetch('../assets/js/models/cargos.json', {
        mode: 'no-cors',
        headers: {
            'Access-Control-Allow-Origin': '*'
        }
    });
}

function getEspecialidad() {
    return fetch('../assets/js/models/especialidad.json', {
        mode: 'no-cors',
        headers: {
            'Access-Control-Allow-Origin': '*'
        }
    });
}