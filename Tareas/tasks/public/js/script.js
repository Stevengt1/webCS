document.addEventListener("DOMContentLoaded", () => {
    const taskList = document.getElementById("task-list");
    const taskInput = document.getElementById("task-input");
    const addTaskBtn = document.getElementById("add-task");

    function validarInput() {
        if (taskInput.value.trim() === "") {
            alert("El campo de tarea no puede estar vacío.");
            return false; 
        }
        return true; 
    }
    addTaskBtn.addEventListener("click", (event) => {
        if (!validarInput()) {
            event.preventDefault(); 
        }
    });
});
