<!-- <?php
require 'db_con.php';

$sql = "DELETE FROM branch WHERE branch_id = :id";
$stmt = $pdo->prepare($sql);

$data = [
    'id' => 5
];

try{
    $stmt->execute($data);
    echo "Record deleted successfully!";
}catch(PDOException $e) {
   echo "Error: " . $e->getMessage();
}

?> -->

<?php
require 'db_con.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $branch_id = $_POST['branch_id'];

    // Prepare and execute the delete statement
    $sql = "DELETE FROM branch WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $branch_id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting branch: " . htmlspecialchars($stmt->errorInfo()[2]);
    }
}
?>
