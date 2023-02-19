<?php
    require 'database.php';
    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])&& !empty($_POST['phone'])&& !empty($_POST['gender'])&& !empty($_POST['address'])){
        $hashesPass = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $sqlE = "SELECT * from users where username = '{$_POST['username']}'";
        $checkExist = mysqli_fetch_assoc(mysqli_query($conn,$sqlE));
        if($checkExist){
           header("Location:../register.php?error=existUser");
           exit();
        }
        $sql= "insert into users(username,password,email,phone,addr,gender) values('{$_POST['username']}','{$hashesPass}','{$_POST['email']}','{$_POST['phone']}','{$_POST['address']}','{$_POST['gender']}')";
        mysqli_query($conn,$sql);
        header('Location:../index.php');
        exit();
    }else{
        header("Location:../register.php?error=emptyfields&username=".$_POST['username']);
        exit();
    }
?>