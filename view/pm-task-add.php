<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task - TeamSync</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/pm.js" defer></script>
</head>
<body>

<?php include 'pm-navbar.php'; ?>

<div class="project-container">
    <h1>Project: <?php echo $project['name']; ?></h1>
    <h2>Add Task</h2>

    <form action="../controller/pm-task-controller.php?action=create" method="post" onsubmit="return validateAddTaskForm(event)">
        <input type="hidden" name="project_id" value="<?php echo $_GET['project_id']; ?>">

        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name">
        <p class="error-message" id="taskNameError"></p>

        <label for="task_description">Task Description:</label>
        <textarea id="task_description" name="task_description"></textarea>
        <p class="error-message" id="taskDescriptionError"></p>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date">
        <p class="error-message" id="startDateError"></p>

        <label for="deadline">Deadline:</label>
        <input type="date" id="deadline" name="deadline">
        <p class="error-message" id="deadlineError"></p>

        <label for="developer_id">Assign Developer:</label>
        <select id="developer_id" name="developer_id">
            <option value="">Select Developer</option>
            <?php foreach ($developers as $developer) { ?>
                <option value="<?php echo $developer['userid']; ?>">
                    [<?php echo $developer['userid']; ?>] <?php echo $developer['firstname'] . ' ' . $developer['lastname']; ?> - Ongoing Tasks: <?php echo $developer['task_count']; ?>
                </option>
            <?php } ?>
        </select>

        <div class="form-buttons">
            <button type="submit" class="button-primary">Add Task</button>
        </div>
    </form>
</div>

</body>
</html>
