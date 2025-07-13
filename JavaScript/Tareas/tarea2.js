document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener("submit", function(event) {
        const campos = this.querySelectorAll("input");
        let formularioValido = true;

        campos.forEach(function(campo) {
          if (campo.value.trim() === "") {
            formularioValido = false;
          }
        });

        if (!formularioValido) {
          alert("Hay un campo vacío, por favor, rellena todos los campos antes de seguir");
          event.preventDefault();
        }
  });
});