<?php
$host = "localhost";
$user = "root";
$password = "Saidanvar@25"; // change if you have a password
$dbname = "library";

// Connect to database
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle book insert
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {
    $accno = $_POST["accno"];
    $title = $_POST["title"];
    $authors = $_POST["authors"];
    $edition = $_POST["edition"];
    $publisher = $_POST["publisher"];

    $sql = "INSERT INTO books (accession_number, title, authors, edition, publisher)
            VALUES ('$accno', '$title', '$authors', '$edition', '$publisher')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>Book added successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
    }
}

// Handle search
$searchResults = "";
if (isset($_GET["search"])) {
    $searchTitle = $_GET["search_title"];
    $sql = "SELECT * FROM books WHERE title LIKE '%$searchTitle%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $searchResults .= "<h3>Search Results:</h3>";
        $searchResults .= "<table border='1' cellpadding='8'>
            <tr>
                <th>Accession Number</th>
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
        $searchResults .= "<p>No books found with that title.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Library - Book Entry and Search</title>
</head>
<body>
    <h2>Add Book Information</h2>
    <form method="post" action="">
        <label>Accession Number:</label>
        <input type="number" name="accno" required><br><br>

        <label>Title:</label>
        <input type="text" name="title" required><br><br>

        <label>Authors:</label>
        <input type="text" name="authors" required><br><br>

        <label>Edition:</label>
        <input type="text" name="edition" required><br><br>

        <label>Publisher:</label>
        <input type="text" name="publisher" required><br><br>

        <input type="submit" name="add" value="Add Book">
    </form>

    <hr>

    <h2>Search Book by Title</h2>
    <form method="get" action="">
        <label>Enter Title:</label>
        <input type="text" name="search_title" required>
        <input type="submit" name="search" value="Search">
    </form>

    <div>
        <?= $searchResults ?>
    </div>
</body>
</html>