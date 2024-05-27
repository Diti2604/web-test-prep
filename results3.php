<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<h1><strong>Book-O-Rama Search Results</strong></h1>
<?php

$searchtype = $_POST['searchtype'];
$searchterm = trim($_POST['searchterm']);

if (!$searchterm || !$searchtype) {
    echo 'Empty input field. Please try again';
    exit;
}
switch ($searchtype) {
    case 'Title':
    case 'Author':
    case 'ISBN':
        break;
    default:
        echo '<p>NOt a valid search type. Please go back and try again</p>';
        exit;
}

$db = new mysqli('localhost', 'bookorama', 'bookorama123', 'books');
if (mysqli_connect_errno()) {
    echo 'Error: Couldn\'t connect with the database.';
    exit;
};

$query = "SELECT Author, Title, ISBN, Price FROM Books WHERE $searchtype = ?";

$stmt = $db->prepare($query);
$stmt->bind_param('s', $searchterm);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($title, $isbn, $price, $author);
echo 'Number of books found: ' . $stmt->num_rows() . '</br>';
echo '</br>';
while ($stmt->fetch()) {
    echo ' Title: ' . $title . '</br>';
    echo ' Author: ' . $author . '</br>';
    echo ' ISBN: ' . $isbn . '</br>';
    echo ' Price: ' . $price . '</br>';
}

$stmt->free_result();
$stmt->close();


?>

<body>