document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("#formularioUsuario");
    const resultado = document.querySelector("#tablaUsuariosCarro");
    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const nombre = document.getElementById("nomCliente").value;
        const placa = document.getElementById("numPlacaCarro").value;
        const fechaIngreso = document.getElementById("fechaIngresoCarro").value;
        const tipoServicio = document.getElementById("tipoServicio").value;

        const nuevaFila = document.createElement("tr");
        nuevaFila.innerHTML = `
            <td>${nombre}</td>
            <td>${placa}</td>
            <td>${fechaIngreso}</td>
            <td>${tipoServicio}</td>
        `;
        resultado.appendChild(nuevaFila);
        form.reset();
    });
});
