<?php
require_once '../models/Task.php';

try {

    if (!empty($_POST)) {
        $action = $_POST['action'] ?? '';

        if ($action === 'add' && $_POST['task'] != "") {
            if(Task::add($_POST['task'])){
                echo "Se agrego corrrectamente!";
            }
        } elseif ($action === 'delete' && !empty($_POST['id'])) {
            if(Task::delete($_POST['id'])){
                echo "Se borro corrrectamente!";
            }
        } elseif ($action === 'completed' && !empty($_POST['id'])) {
            if(Task::completed($_POST['id'])){
                echo "Se actualizo corrrectamente!";
            }
        } else {
            throw new Exception("Acción no válida o parámetros incorrectos.");
        }
    } else {
        print_r(Task::getAll());
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
