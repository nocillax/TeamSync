<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PM Dashboard - TeamSync</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="../js/pm.js" defer></script>
</head>

<body>

<?php include 'pm-navbar.php'; ?>

    <!-- Main Container -->
    <div class="container">

        <h2>Projects Overview</h2>

        <!-- Search Section -->
        <div class="search-container">
            <input type="hidden" id="userid" value="<?php echo $_SESSION['userid']; ?>">
            <input type="text" id="searchQuery" placeholder="Search...">
            <select id="searchFilter">
                <option value="all">All</option>
                <option value="projects">Projects</option>
                <option value="tasks">Tasks</option>
            </select>
        </div>
        <div id="searchResults"></div>

        <!-- Ongoing Projects -->
        <div class="project-section ongoing-projects-section">
            <h2>Ongoing Projects</h2>
            <div class="project-grid">
                <?php foreach ($ongoingProjects as $project) { ?>
                    <a href="../controller/pm-project-controller.php?action=view&project_id=<?php echo $project['project_id']; ?>" class="project-card-link">
                        <div class="project-card ongoing-projects">
                            <h3><?php echo $project['name']; ?></h3>
                            <p>Progress: <?php echo $project['progress']; ?>%</p>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>

        <!-- Handed Over Projects -->
        <div class="project-section handed-over-projects-section">
            <h2>Handed Over Projects</h2>
            <div class="project-grid">
                <?php foreach ($handedoverProjects as $project) { ?>
                    <a href="../controller/pm-project-controller.php?action=view&project_id=<?php echo $project['project_id']; ?>" class="project-card-link">
                        <div class="project-card handed-over-projects">
                            <h3><?php echo $project['name']; ?></h3>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
        <!-- Pending Project Approvals -->
        <div class="project-section pending-project-approvals-section">
            <h2>Pending Project Approvals</h2>
            <div class="project-grid">
                <?php foreach ($pendingProposals as $project) { ?>
                    <a href="../controller/pm-project-controller.php?action=view_proposal&project_id=<?php echo $project['project_id']; ?>" class="project-card-link">
                        <div class="project-card pending-project-approvals">
                            <h3><?php echo $project['name']; ?></h3>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>

        <!-- Pending Task Approvals -->
        <div class="project-section pending-task-approvals-section">
            <h2>Pending Task Approvals</h2>
            <?php
            $projectTasks = [];
            foreach ($pendingTaskApprovals as $task) {
                $projectTasks[$task['project_id']][] = $task;
            }

            foreach ($ongoingProjects as $project) {
                if (isset($projectTasks[$project['project_id']])) {
                    echo "<h3>{$project['name']}</h3>";
                    echo "<div class='project-grid'>";
                    foreach ($projectTasks[$project['project_id']] as $task) {
                        echo "<a href='../controller/pm-task-controller.php?action=view&task_id={$task['task_id']}' class='project-card-link'>";
                        echo "<div class='project-card pending-task-approvals'>";
                        echo "<h3>{$task['name']}</h3>";
                        echo "</div>";
                        echo "</a>";
                    }
                    echo "</div>";
                }
            }
            ?>
        </div>

    </div>

</body>

</html>