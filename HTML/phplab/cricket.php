<?php
// Store Indian Cricket players names in an array
$players = [
    "Rohit Sharma", "virat Kohli", "MS Dhoni", "Sachin Tendulkar", "Pandya",
    "Ishan kishan", "Rahul", "Ashwin", "Jadeja", "Jasprit Bumrah"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Indian Cricket Players</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>

<h2>List of Indian Cricket Players</h2>

<table>
    <tr>
        <th>Sl. No.</th>
        <th>Player Name</th>
    </tr>
    <!--for dispalying serial number and player name-->
    <?php foreach ($players as $index => $player): ?>
        <tr>
            <td><?php echo $index + 1; ?></td>
            <?php ?>
            <td><?php echo htmlspecialchars($player); ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
