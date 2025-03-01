<?php
require_once("../Partials/header.php");
require_once("../classes/task.class.php");
$task_obj = new Task();
$tasks = $task_obj->get_Tasks_divided_pr();


$current_date = date("Y-m-d");

?>
<div class="container w-75">
    <div class="card mt-5">
        <div class="card-header text-center bg-info bg-gradient">
            <h1>Tasks</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Title</th>
                    <th>Priority</th>
                    <th>Due Date</th>
                    <th>Required from</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    <h3 class="text-center">Tasks divided by priority</h3>

                    <?php foreach (['high', 'med', 'low'] as $priority): ?>
                        <?php foreach ($tasks[$priority] as $task):
                            $isOverdue = (strtotime($task['date']) < strtotime($current_date));
                            $rowClass = $isOverdue ? 'table-danger' : ''; // Highlight overdue tasks
                            ?>
                            <tr class="mb-5 <?php echo $rowClass; ?>">
                                <td class="p-5"><?php echo $task['title']; ?></td>
                                <td class="p-5"><?php echo ucfirst($task['priority']); ?></td>
                                <td class="p-5">
                                    <?php echo $task['date']; ?>
                                    <?php if ($isOverdue): ?>
                                        <span class="text-danger fw-bold"> (Overdue!)</span>
                                    <?php endif; ?>
                                </td>
                                <td class="p-5"><?php echo $task['name']; ?></td>
                                <td class="p-5">
                                    <a href="edit_task.php?id=<?php echo $task['id']; ?>" class="btn bg-info bg-gradient">Edit
                                        Task</a>
                                    <a href="delete_task.php?id=<?php echo $task['id']; ?>" class="btn btn-danger">Delete
                                        Task</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <a href="add_task.php" class="btn bg-info bg-gradient">Add Task</a>
        </div>
    </div>
</div>

<?php
require_once("../Partials/footer.php");
?>