<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Proposal - TeamSync</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>

<?php include 'pm-navbar.php'; ?>

<div class="project-container">
    <h1><?php echo $project['name']; ?></h1>
    <div class="project-details">
        <p><strong>Client Name:</strong> <?php echo $clientName; ?></p>
        <p><strong>Description:</strong> <?php echo $project['description']; ?></p>
        <p><strong>Deadline:</strong> <?php echo $project['deadline']; ?></p>
    </div>

    <form action="../controller/pm-project-controller.php?action=approve_reject_proposal" method="post">
    <input type="hidden" name="project_id" value="<?php echo $project['project_id']; ?>">
    <div class="form-buttons">
        <button type="submit" name="action" value="approve" class="button-primary">Approve</button>
        <button type="submit" name="action" value="reject" class="button-danger" onclick="return confirm('Are you sure you want to reject this proposal?')">Reject</button>
    </div>
</form>

</div>

</body>
</html>