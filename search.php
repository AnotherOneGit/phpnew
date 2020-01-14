<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="search.css">
    <link rel="shortcut icon" href="favicon.jpg" type="image/x-icon">
    <title>Search</title>
</head>
<body>
<?php
include_once "user-pass.php";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
    $stmt = $dbh->prepare("SELECT * FROM test WHERE date LIKE ?");
    if ($stmt->execute(array("%$_POST[name]%"))) {
      while ($row = $stmt->fetch()) {
          echo "<div>
        {$row['date']}
        {$row['info']} 
        {$row['number']} <br />
        </div>";
      }
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>