<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrive na MAlupet</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #007bff;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 10px;
            text-align: left;
            background-color: #f8f9fa;
        }
        tr:nth-child(even) {
            background-color: #e9ecef;
        }
        tr:hover {
            background-color: #d1e7fd;
        }
        .table-container {
            margin: 30px auto;
            max-width: 900px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>BRANCH NAME</th>
                <th>LOCATION</th>
                <th>ZIP CODE</th>
            </tr>
        </thead>
    <?php
        require 'db_con.php';

        $sql = "SELECT * FROM branch";
        $stmt = $pdo->query($sql);

    ?>
    <tbody>
        <?php foreach($stmt as $data):?>
            <tr>
                <td><?=$data['branch_name']?></td>
                <td><?=$data['location']?></td>
                <td><?=$data['zipcode']?></td>
            </tr>
            <?php endforeach;?>
    </tbody>

    </table>
</body>
</html>









<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branch Information</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
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
    </style>
</head>
<body>

    <table>
        <tr>
            <th>Branch Name</th>
            <th>Location</th>
            <th>Zip Code</th>
        </tr>

        <?php 
        require 'db_con.php';

        $sql = "SELECT * FROM branch";
        $stmt = $pdo->query($sql);

        foreach($stmt as $data) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($data['branch_name']) . '</td>';
            echo '<td>' . htmlspecialchars($data['location']) . '</td>';
            echo '<td>' . htmlspecialchars($data['zipcode']) . '</td>';
            echo '</tr>';
        }
        ?>

    </table>

</body>
</html> -->
