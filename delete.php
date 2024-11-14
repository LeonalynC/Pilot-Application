<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<?php $getUserByID = getUserByID($pdo, $_GET['id']); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Pilot</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Are you sure you want to delete this pilot?</h1>
    <div class="container" style="border-style: solid; border-color: red; background-color: #ffcbd1;">
        <h2>First Name: <?php echo $getUserByID['first_name']; ?></h2>
        <h2>Last Name: <?php echo $getUserByID['last_name']; ?></h2>
        <h2>Email: <?php echo $getUserByID['email']; ?></h2>
        <!-- Add more fields as necessary -->
        <div class="deleteBtn" style="text-align: center;">
            <form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <input type="submit" name="deletePilotBtn" value="Delete" style="background-color: #f69697; border-style: solid;">
            </form>
        </div>
    </div>
</body>
</html>