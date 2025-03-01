<?php
require_once("../classes/task.class.php");

require_once("../Partials/header.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $task_obj = new TasK();
    $task = $task_obj->get_task($id);
}

?>
<div class="container mt-5 w-50">

    <form method="post" action="">
        <input class="form-control form group" type="text" name="title" placeholder="Enter title"
            value="<?php echo $task['title'] ?>">
        <br>
        <input class="form-control form group" type="text" name="priority" placeholder="priority"
            value="<?php echo $task['priority'] ?>">
            <br>
        <input class="form-control form group" type="date" name="date" placeholder="Due date"
            value="<?php echo $task['date'] ?>">
        <br>
        
        <input class="form-control form group" type="text" name="name" placeholder="Required from"
            value="<?php echo $task['name'] ?>">
            <br>
        <input class="form-control form group btn-secondary" type="submit" name="edit-task" value="Edit Task">
        <input type="hidden" name="id" value="<?php echo $id ?>">
    </form>



</div>




<?php
require_once("../Partials/footer.php");
?>

<?php
if (isset($_POST["edit-task"])) {
    $id = $_POST["id"];
    $edit_task['title'] = $_POST["title"];
    $edit_task['priority'] = strtolower($_POST["priority"]);
    $edit_task['date']= $_POST['date'];
    $edit_task['name']= $_POST['name'];
    $task = new Task();
    $task->Edit_Task($id, $edit_task);
    header("location:index.php");
}

?>