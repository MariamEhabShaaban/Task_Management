<?php
require_once("../classes/task.class.php");
require_once("../Partials/header.php");
?>
<div class="container mt-5 w-50">

    <form method="post" action="">
        <input class="form-control form group" type="text" name="title" placeholder="Enter title">
        <br>
        <input class="form-control form group" type="text" name="priority" placeholder="priority">
        <br>
        <input class="form-control form group" type="text" name="name" placeholder="Required From">
        <br>
        <input class="form-control form group" type="date" name="date" >
        <br>
        <input class="form-control form group btn-secondary" type="submit" name="add-task" value="Add Task">



    </form>



</div>




<?php
require_once("../Partials/footer.php");
?>

<?php
if (isset($_POST["add-task"])) {
    $title = $_POST["title"];
    $priority = strtolower($_POST["priority"]);
    $name = $_POST["name"];
    $date = $_POST["date"];
    $task = new Task($title, $priority,$name,$date);
    $task->add_task();
    header("location:index.php");
}

?>