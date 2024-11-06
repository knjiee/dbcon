<?php
require 'db_con.php'; // Database connection

// Check if id is set
if (!isset($_GET['id'])) {
    echo "No branch ID specified.";
    exit;
}

// Fetch the current branch data
$id = $_GET['id'];
$sql = "SELECT * FROM branch WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$branch = $stmt->fetch();

if (!$branch) {
    echo "Branch not found.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $branch_name = $_POST['branch_name'];
    $location = $_POST['location'];
    $zipcode = $_POST['zipcode'];

    $sql = "UPDATE branch SET branch_name = :branch_name, location = :location, zipcode = :zipcode WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':branch_name', $branch_name);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':zipcode', $zipcode);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header("Location: index.php"); // Redirect after successful update
        exit;
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Branch</title>
</head>
<body>
<h2>Edit Branch</h2>
<form action="edit.php?id=<?php echo $id; ?>" method="POST">
    <label for="branch_name">Branch Name:</label><br>
    <input type="text" id="branch_name" name="branch_name" value="<?php echo htmlspecialchars($branch['branch_name']); ?>" required><br>
    
    <label for="location">Location:</label><br>
    <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($branch['location']); ?>" required><br>
    
    <label for="zipcode">Zip Code:</label><br>
    <input type="text" id="zipcode" name="zipcode" value="<?php echo htmlspecialchars($branch['zipcode']); ?>" required><br>
    
    <input type="submit" value="Update">
</form>
</body>
</html>
