<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilot Application System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Pilot Application System</h1>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="message">    
            <?php echo $_SESSION['message']; ?>
        </div>
    <?php } unset($_SESSION['message']); ?>

    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="GET">
            <input type="text" name="searchInput" placeholder="Search here">
            <input type="submit" name="searchBtn">
        </form>

        <p><a href="index.php">Clear Search Query</a></p>
        <p><a href="insert.php">Insert New Pilot</a></p>

        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Years of Experience</th>
                <th>License Type</th>
                <th>Favorite Airplane</th>
                <th>Nationality</th>
                <th>Age</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Certifications</th>
                <th>Date Added</th>
                <th>Action</th>
            </tr>

            <?php 
            if (isset($_GET['searchBtn'])) { 
                $searchForPilot = searchForPilot($pdo, $_GET['searchInput']);
                foreach ($searchForPilot as $row) { ?>
                    <tr>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['years_of_experience']; ?></td>
                        <td><?php echo $row['license_type']; ?></td>
                        <td><?php echo $row['favorite_airplane']; ?></td>
                        <td><?php echo $row['nationality']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['contact_number']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['certifications']; ?></td>
                        <td><?php echo $row['date_added']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
            <?php } 
            } else { 
                $getAllPilots = $pdo->query("SELECT * FROM pilot_applicants ORDER BY first_name ASC")->fetchAll();
                foreach ($getAllPilots as $row) { ?>
                    <tr>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['years_of_experience']; ?></td>
                        <td><?php echo $row['license_type']; ?></td>
                        <td><?php echo $row['favorite_airplane']; ?></td>
                        <td><?php echo $row['nationality']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['contact_number']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['certifications']; ?></td>
                        <td><?php echo $row['date_added']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
            <?php } 
            } ?>
            
        </table>
    </div>
</body>
</html>