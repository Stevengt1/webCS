function mostrarAlerta() {
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Something went wrong!",
        footer: '<a href="https://www.w3schools.com/js/default.asp">Why do I have this issue?</a>'
    });
};

/* Notas:
    1. document.addEventListener: Le dice al navegador que escuche eventos.
    2. DOMContentLoaded: Es el evento que se dispara cuando DOM (Estructura HTML) ha sido completamente cargado.
    3. function: Es la funcion que se ejecuta cuando el evento DOMContentLoaded ocurre.
*/

// Lectura de una tabla HTML y mostrar sus datos en la consola
document.addEventListener("DOMContentLoaded", function () {
    const tabla = document.getElementById("tablaDatos");
    const filas = Array.from(tabla.getElementsByTagName("tr"));

    filas.forEach((fila, index) => {
        const celdas = Array.from(fila.getElementsByTagName("td"));
        let filaTexto = "";

        celdas.forEach(celda => {
            filaTexto += celda.textContent + " | ";
        });

        if (filaTexto) {
            console.log("Fila " + index + ": " + filaTexto);
        }

    });
});

// Escritura de datos de un array en una tabla HTML
document.addEventListener("DOMContentLoaded", function () {
    const datos = [
        { "Nombre": "Ana", "Edad": 25, "Ciudad": "Madrid" },
        { "Nombre": "Luis", "Edad": 30, "Ciudad": "Barcelona" },
        { "Nombre": "María", "Edad": 22, "Ciudad": "Valencia" }
    ];

/*
    Diferencias entre querySelector y getElementById:
        const tabla = document.querySelector("#tablaEstudiantes");
        const tabla = document.getElementById("tablaEstudiantes");
    querySelector permite seleccionar elementos usando selectores CSS, mientras que getElementById solo selecciona por ID.
*/
    const tabla = document.querySelector("#tablaEstudiantes");

    datos.forEach((dato, index) => {
        const nuevaFila = tabla.insertRow();
        nuevaFila.innerHTML = `
            <td>${index + 1}</td>
            <td>${dato.Nombre}</td>
            <td>${dato.Edad}</td>
            <td>${dato.Ciudad}</td>
        `;
    });
});


/*
    Tabla 1
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
    Tabla 2
        datos.forEach((dato, index) => {
        const nuevaFila = tabla.insertRow();
        nuevaFila.innerHTML = `
            <td>${index + 1}</td>
            <td>${dato.Nombre}</td>
            <td>${dato.Edad}</td>
            <td>${dato.Ciudad}</td>
        `;
    });
    
    innerHTML es rápido y útil para generar contenido rápido cuando los datos son seguros (por ejemplo, de una fuente confiable).
    createElement + appendChild es más seguro, limpio y preferido cuando trabajas con datos dinámicos o cuando necesitas manipular o agregar eventos a celdas específicas.
*/