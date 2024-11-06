<?php
require 'db_con.php'; // Database connection

if (!isset($_GET['id'])) {
    echo "No branch ID specified.";
    exit;
}

$id = $_GET['id'];

// Prepare and execute the delete statement
$sql = "DELETE FROM branch WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    header("Location: index.php"); // Redirect after successful deletion
    exit;
} else {
    echo "Error: " . $stmt->errorInfo()[2];
}
?>
