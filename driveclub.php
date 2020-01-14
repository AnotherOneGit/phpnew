<?php
include_once "user-pass.php";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
    $stmt = $dbh->prepare("SELECT * FROM test WHERE number = ?");
    if ($stmt->execute(array('16969'))) {
      while ($row = $stmt->fetch()) {
          echo "<div>{$row['date']}{$row['info']}{$row['number']} <br /></div>";
      }
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}