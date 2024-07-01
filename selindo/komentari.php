<?php
session_start();

// povezi se sa bazom
$conn = mysqli_connect('localhost', 'root', '', 'reglog');

// proveri konekciju
if (!$conn) {
    die("Neuspela konekcija: " . mysqli_connect_error());
}

// uzmi id trenutnog korisnika
$user_id = $_SESSION['id'];

$sql = "SELECT * FROM komentari WHERE autor_id = '$user_id'";
$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>ID</th><th>Ocena</th><th>Komentar</th><th>Oglas</th><th>Autor</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['ocena'] . "</td>";
    echo "<td>" . $row['komentar'] . "</td>";
    echo "<td>" . $row['oglas_id'] . "</td>";
    echo "<td>" . $row['autor_id'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$elindo</title>
    <link rel="stylesheet" href="css/komentari.css">
</head>
<header>
</header>
<body>


</body>
</html>