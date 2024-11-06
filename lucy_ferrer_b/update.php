<?php 
require 'db_con.php';

$sql = "UPDATE branch SET branch_name = :branch WHERE branch_id = :branch_id";
$stmt = $pdo->prepare($sql);

$data = [
    'branch' => 'newCalapann',
    'branch_id' => 5
];

try{
    $stmt->execute($data);
    echo "Record updated successfully!";
}catch(PDOException $e) {
   echo "Error: " . $e->getMessage();
}

?>