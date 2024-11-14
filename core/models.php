<?php  
require_once 'dbConfig.php';

function insertNewPilot($pdo, $first_name, $last_name, $years_of_experience, $license_type, $favorite_airplane, $nationality, $age, $contact_number, $email, $certifications) {
    $sql = "INSERT INTO pilot_applicants (first_name, last_name, years_of_experience, license_type, favorite_airplane, nationality, age, contact_number, email, certifications) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $years_of_experience, $license_type, $favorite_airplane, $nationality, $age, $contact_number, $email, $certifications]);

    return $executeQuery ? ['message' => 'Pilot added successfully', 'statusCode' => 200] : ['message' => 'Failed to add pilot', 'statusCode' => 400];
}

function editPilot($pdo, $first_name, $last_name, $years_of_experience, $license_type, $favorite_airplane, $nationality, $age, $contact_number, $email, $certifications, $id) {
    $sql = "UPDATE pilot_applicants SET first_name = ?, last_name = ?, years_of_experience = ?, license_type = ?, favorite_airplane = ?, nationality = ?, age = ?, contact_number = ?, email = ?, certifications = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $years_of_experience, $license_type, $favorite_airplane, $nationality, $age, $contact_number, $email, $certifications, $id]);

    return $executeQuery ? ['message' => 'Pilot updated successfully', 'statusCode' => 200] : ['message' => 'Failed to update pilot', 'statusCode' => 400];
}

function deletePilot($pdo, $id) {
    $sql = "DELETE FROM pilot_applicants WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$id]);

    return $executeQuery ? ['message' => 'Pilot deleted successfully', 'statusCode' => 200] : ['message' => 'Failed to delete pilot', 'statusCode' => 400];
}

function getUserByID($pdo, $id) {
    $sql = "SELECT * FROM pilot_applicants WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function searchForPilot($pdo, $searchQuery) {
    $sql = "SELECT * FROM pilot_applicants WHERE CONCAT(first_name, last_name, years_of_experience, license_type, favorite_airplane, nationality, age, contact_number, email, certifications) LIKE ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%" . $searchQuery . "%"]);
    return $stmt->fetchAll();
}
?>
