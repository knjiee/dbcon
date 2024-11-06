<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Branch</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #87CEEB;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .success-message {
            color: #87CEEB;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .error-message {
            color: red;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h2>Add New Branch</h2>

<?php
require 'db_con.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the form
    $branch_name = $_POST['branch_name'];
    $location = $_POST['location'];
    $zipcode = $_POST['zipcode'];

    // Prepare an SQL statement
    $sql = "INSERT INTO branch (branch_name, location, zipcode) VALUES (:branch_name, :location, :zipcode)";
    $stmt = $pdo->prepare($sql);

    // Bind parameters and execute the statement
    $stmt->bindParam(':branch_name', $branch_name);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':zipcode', $zipcode);

    if ($stmt->execute()) {
        echo '<div class="success-message">New branch added successfully!</div>';
    } else {
        echo '<div class="error-message">Error: ' . htmlspecialchars($stmt->errorInfo()[2]) . '</div>';
    }
}
?>

<form action="add.php" method="POST">
    <label for="branch_name">Branch Name:</label><br>
    <input type="text" id="branch_name" name="branch_name" required><br>
    
    <label for="location">Location:</label><br>
    <input type="text" id="location" name="location" required><br>
    
    <label for="zipcode">Zip Code:</label><br>
    <input type="text" id="zipcode" name="zipcode" required><br>
    
    <input type="submit" value="Submit">
</form>

<a href="index.php">Back to Branch List</a>

</body>
</html>
