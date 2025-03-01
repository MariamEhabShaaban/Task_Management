<?php
require_once("../classes/task.class.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $task = new Task();
    $task->delete_task($id);
    header("location:index.php");
}

?>