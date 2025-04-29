<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        table {
            width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color:rgb(75, 170, 78);
            color: white;
        }       

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
<?php
$servername = "localhost";  
$username = "root";         
$password = "Saidanvar@25";             
$dbname = "testdbphp";     
//connecting to database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//taking data from table
$sql = "SELECT id, name, email FROM students";
$result = $conn->query($sql);

//checking there is any rows in result
if ($result->num_rows > 0) {

    echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse;'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
//adding datas in table
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>