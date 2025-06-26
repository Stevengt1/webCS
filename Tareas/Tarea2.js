function btnCalcular() {
    /*
  Impuesto de la Renta exento hasta ¢863,000.
  De ¢863,001 a ¢1,267,000 10% de retención sobre el monto que supere los ¢863,001.
  De ¢1,267,001 a ¢2,223,000 15% de retención sobre el monto que supere los ¢1,267,001.
  De ¢2,223,001 a ¢4,445,000 20% de retención sobre el monto que supere los ¢2,223,001.
  De ¢4,445,001 en adelante 25% de retención sobre lo que supere a ¢4,445,001.
    */
    const form = document.getElementById('formularioUsuario');
    const tabla = document.getElementById('tablaUsuarios');
    let contador = tabla.rows.length + 1;

    const nombre = document.getElementById('nombre').value;
    const salariob = document.getElementById('salariob').value;

    if (!nombre || !salariob) {
        alert("Por favor, complete todos los campos obligatorios.");
        return;
    }

    let impuesto = 0;
    const salBruto = parseFloat(salariob);

    if (salBruto > 4745000) {
        impuesto += (salBruto - 4745000) * 0.25;
        impuesto += (4745000 - 2373000) * 0.20;
        impuesto += (2373000 - 1352000) * 0.15;
        impuesto += (1352000 - 922000) * 0.10;
    } else if (salBruto > 2373000) {
        impuesto += (salBruto - 2373000) * 0.20;
        impuesto += (2373000 - 1352000) * 0.15;
        impuesto += (1352000 - 922000) * 0.10;
    } else if (salBruto > 1352000) {
        impuesto += (salBruto - 1352000) * 0.15;
        impuesto += (1352000 - 922000) * 0.10;
    } else if (salBruto > 922000) {
        impuesto += (salBruto - 922000) * 0.10;
    }

    const salNeto = salBruto - impuesto;

    const nuevaFila = tabla.insertRow();
    nuevaFila.innerHTML = `
    <td>${contador++}</td>
    <td>${nombre}</td>
    <td>${salBruto}</td>
    <td>${salNeto}</td>
    `;

    form.reset();

    const modal = bootstrap.Modal.getInstance(document.getElementById('modalFormularioSalario'));
    modal.hide();
}

document.addEventListener('DOMContentLoaded', function () {
    const boton = document.getElementById("btnCambiarP");
    const parrafo = document.getElementById("txtCambiarP");

    boton.addEventListener("click", function () {
        parrafo.innerHTML = "Depende del monto pueden ser del 10, 15, 20 o 25 por ciento del salario bruto";
    });

});


const estudiantes = [
    { nombre: "Carlos", apellido: "López", nota: 85 },
    { nombre: "Ana", apellido: "Martínez", nota: 92 },
    { nombre: "Luis", apellido: "García", nota: 78 },
    { nombre: "Sofía", apellido: "Ramírez", nota: 90 },
    { nombre: "Pedro", apellido: "Torres", nota: 88 }
];

const tablaPEstudiantes = document.querySelector("#tablaEstudiantes tbody");
let sumaNotas = 0;

estudiantes.forEach(estudiante => {
    const fila = document.createElement("tr");

    const colNombre = document.createElement("td");
    colNombre.textContent = estudiante.nombre;

    const colApellido = document.createElement("td");
    colApellido.textContent = estudiante.apellido;

    const colNota = document.createElement("td");
    colNota.textContent = estudiante.nota;

    fila.appendChild(colNombre);
    fila.appendChild(colApellido);
    fila.appendChild(colNota);

    tablaPEstudiantes.appendChild(fila);

    sumaNotas += estudiante.nota;
});

const promedio = sumaNotas / estudiantes.length;
document.getElementById("promedioNotas").textContent = `Promedio de notas: ${promedio.toFixed(2)}`;