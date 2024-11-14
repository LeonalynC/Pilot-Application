<?php  
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertPilotBtn'])) {
    $result = insertNewPilot($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['years_of_experience'], $_POST['license_type'], $_POST['favorite_airplane'], $_POST['nationality'], $_POST['age'], $_POST['contact_number'], $_POST['email'], $_POST['certifications']);
    handleResult($result, '../index.php');
}

if (isset($_POST['editPilotBtn'])) {
    $result = editPilot($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['years_of_experience'], $_POST['license_type'], $_POST['favorite_airplane'], $_POST['nationality'], $_POST['age'], $_POST['contact_number'], $_POST['email'], $_POST['certifications'], $_GET['id']);
    handleResult($result, '../index.php');
}

if (isset($_POST['deletePilotBtn'])) {
    $result = deletePilot($pdo, $_GET['id']);
    handleResult($result, '../index.php');
}

function handleResult($result, $redirectURL) {
    $_SESSION['message'] = $result['message'];
    $_SESSION['status'] = $result['statusCode'];
    header("Location: $redirectURL");
}
?>