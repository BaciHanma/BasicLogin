<?php
    require "database.php";

    $username = $_GET['q'];
    echo $username;
    $sql = "INSERT INTO users(username,email) values('ngphbac103','phuongbac@gmail.com'); ";
    $result = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_assoc($result);
    // var_dump($row);
?>