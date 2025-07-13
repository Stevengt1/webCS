<div class="input-group mb-3">
    <form id="task-form" action="app/controllers/TaskController.php" method="POST">
        <input type="text" id="task-input" name="task" class="form-control" placeholder="Nueva tarea">
        <input type="hidden" name="action" value="add">
        <button class="btn btn-primary" id="add-task" type="submit">Agregar</button>
    </form>
</div>

<ul class="list-group" id="task-list"></ul>