<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<h1>Book-O-Rama Book Entry Results</h1>
    <?php
 if(!isset($_POST['ISBN']) || !isset($_POST['Author']) || !isset($_POST['Title']) || !isset($_POST['Price'])){
   echo 'Not all fields are complete. Please try again';
   exit;
 }
 $isbn = $_POST['ISBN'];
 $author = $_POST['Author'];
 $title = $_POST['Title'];
 $price = $_POST['Price'];
 $price = doubleval($price);
 
 $db = new mysqli('localhost', 'bookorama', 'bookorama123', 'books');

 if(mysqli_connect_errno()){
    echo 'Error: Couldn\'t connect with the database';
    exit;
 }

 $query = "INSERT INTO books VALUES (?,?,?,?)";
 $stmt = $db -> prepare($query);
 $stmt -> bind_param('sssd', $isbn, $author, $title, $price);
 $stmt->execute();
 if($stmt->affected_rows > 0){
    echo 'Book aded successfully';
 }else{
    echo 'Error adding book. please try again';
 }
 $db -> close();
    
    ?>
</body>

</html>