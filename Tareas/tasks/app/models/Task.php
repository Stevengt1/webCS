<?php
require_once '../../config/database.php';

class Task
{
    public static function getAll(): array
    {
        global $conn;

        try {
            $sql = "SELECT * FROM tasks";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        } catch (mysqli_sql_exception $e) {
            return ["error" => "Error al obtener usuarios: " . $e->getMessage()];
        }
    }


    public static function add($title)
    {
        global $conn;

        $sql = "INSERT INTO tasks (title) VALUES ('$title')";

        if ($conn->query($sql) === TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function delete($id)
    {
        global $conn;

        $sql = "DELETE FROM tasks WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function completed($id)
    {
        global $conn;

        $sql = "UPDATE tasks SET completed = 1 WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            return 1;
        } else {
            return 0;
        }
    }
}
