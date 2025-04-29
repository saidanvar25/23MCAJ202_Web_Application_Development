<?php
$host = "localhost";
$user = "root";
$password = "Saidanvar@25";             
$dbname = "library";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
// Handle insert
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $accno = $_POST["accno"];
    $title = $_POST["title"];
    $authors = $_POST["authors"];
    $edition = $_POST["edition"];
    $publisher = $_POST["publisher"];

    $sql = "INSERT INTO books (accession_number, title, authors, edition, publisher)
            VALUES ('$accno', '$title', '$authors', '$edition', '$publisher')";

    $message = $conn->query($sql) === TRUE 
        ? "<p style='color: green;'>Book added successfully!</p>" 
        : "<p class='error'>Error: " . $conn->error . "</p>";
}

// Handle search
$searchResults = "";
if (isset($_GET["search"])) {
    $searchTitle = $_GET["search_title"];
    $sql = "SELECT * FROM books WHERE title LIKE '%$searchTitle%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $searchResults .= "<h3>Search Results:</h3>";
        $searchResults .= "<table>
            <tr>
                <th>Accession No</th>
                <th>Title</th>
                <th>Authors</th>
                <th>Edition</th>
                <th>Publisher</th>
            </tr>";
        while ($row = $result->fetch_assoc()) {
            $searchResults .= "<tr>
                <td>{$row['accession_number']}</td>
                <td>{$row['title']}</td>
                <td>{$row['authors']}</td>
                <td>{$row['edition']}</td>
                <td>{$row['publisher']}</td>
            </tr>";
        }
        $searchResults .= "</table>";
    } else {
        $searchResults .= "<p class='error'>No books found with that title.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library Book Manager</title>
    <style>
        body {
            font-family: Arial;
            background-color: #68cafb;
            text-align: center;
            padding: 20px;
        }

        form {
            background-color: #c3ebf3;
            width: 350px;
            margin: 20px auto;
            padding: 15px;
            border-radius: 10px;
        }

        input, textarea {
            width: 80%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #2ea4c9;
            color: white;
            border: none;
            margin-top: 10px;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #1b8fb1;
        }

        .error {
            color: red;
            font-size: 0.85em;
            margin-top: 5px;
        }

        table {
            margin: 20px auto;
            width: 90%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #2ea4c9;
            color: white;
        }

        h2 {
            color: #2c3e50;
        }
    </style>
</head>
<body>

    <h2>Add Book</h2>
    <?= $message ?>
    <form method="post" action="">
        <input type="number" name="accno" placeholder="Accession Number" required><br>
        <input type="text" name="title" placeholder="Title" required><br>
        <input type="text" name="authors" placeholder="Authors" required><br>
        <input type="text" name="edition" placeholder="Edition" required><br>
        <input type="text" name="publisher" placeholder="Publisher" required><br>
        <input type="submit" name="add" value="Add Book">
    </form>

    <h2>Search Book</h2>
    <form method="get" action="">
        <input type="text" name="search_title" placeholder="Enter Title to Search" required><br>
        <input type="submit" name="search" value="Search">
    </form>

    <div>
        <?= $searchResults ?>
    </div>

</body>
</html>