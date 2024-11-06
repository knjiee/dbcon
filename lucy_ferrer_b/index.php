<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            background-color: #ecf7fc;
        }
        th {
            background-color: #87CEEB;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Branch Information</h2>

<h2>Branch Information</h2>
<table>
    <tr>
        <th>Branch Name</th>
        <th>Location</th>
        <th>Zip Code</th>
        <th>Actions</th> <!-- New column for actions -->
    </tr>

    <?php 
    
    $sql = "SELECT * FROM branch";
    $stmt = $pdo->query($sql);

    foreach($stmt as $data) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($data['branch_name']) . '</td>';
        echo '<td>' . htmlspecialchars($data['location']) . '</td>';
        echo '<td>' . htmlspecialchars($data['zipcode']) . '</td>';
        echo '<td>'; // Start actions column
        echo '<a href="edit.php?id=' . $data['id'] . '">Edit</a> | '; // Edit link
        echo '<a href="delete.php?id=' . $data['id'] . '" onclick="return confirm(\'Are you sure you want to delete this branch?\');">Delete</a>'; // Delete link
        echo '</td>'; // End actions column
        echo '</tr>';
    }
    ?>
</table>


<a href="add.php">Add New Branch</a>

</body>
</html>
