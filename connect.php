<?php
include_once "user-pass.php";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
    foreach($dbh->query('SELECT * from test') as $row) {
        echo "<div class='row'>
         <hr>
        <div class='col s3 teal accent-3'>{$row['user']}</div>
        <div class='col s3 teal'>{$row['password']} </div>
        <div class='col s3 teal lighten-2'>{$row['number']}</div>
        <div class='col s3 teal lighten-2'>{$row['number']}</div>
         <hr>
        </div>";
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}