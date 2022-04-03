<?php

//database config
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '220387');
define('DB', 'todo_list');
define('DB_TABLE', 'todos');

$connection = mysqli_connect(HOST, USER, PASS, DB);

$todo = [];
$todo_list = [];
$task = $_GET['task'] ?? '/';

if ($connection) {
    if ('/' === $task) {
        $get_todos = mysqli_query($connection, "SELECT * FROM todos");
        while ($todo = mysqli_fetch_assoc($get_todos)) {
            array_push($todo_list, $todo);
        }
    }

    if ('create' === $task) {

        if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['todo']) && !empty($_POST['todo'])) {
            $get_id = $_POST['id'];
            $get_todo = $_POST['todo'];
            mysqli_query($connection, "UPDATE todos SET name ='$get_todo' WHERE id='$get_id'");
            header('Location: /crud-app');
            return;
        }

        if (isset($_POST['todo']) && !empty($_POST['todo'])) {
            $todo = htmlspecialchars($_POST['todo']);
            mysqli_query($connection, "INSERT INTO todos (name) values ('$todo')");
            header('Location: /crud-app');
            return;
        } else {
            header('Location: /crud-app');
            return;
        }
    }

    if ('delete' === $task) {
        $get_id = $_GET['id'];
        mysqli_query($connection, "DELETE FROM todos WHERE id='$get_id'");
        header('Location: /crud-app');
        return;
    }

    if ('edit' === $task) {
        $get_id = $_GET['id'];
        $get_todo = mysqli_query($connection, "SELECT * FROM todos WHERE id='$get_id'");
        $todo = mysqli_fetch_array($get_todo);
        return;
    }
}
