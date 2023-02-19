<?php
   session_start();
   if(isset($_SESSION)){
      header("Location:../index.php");
   }
   require 'database.php';
   if(!empty($_POST['username']) && !empty($_POST['password'])){
      
      $sql = "SELECT * FROM users WHERE username = '{$_POST['username']}'";
      $result = mysqli_query($conn,$sql);
      if($row = mysqli_fetch_assoc($result)){
         $passCheck = password_verify($_POST['password'],$row['password']);
         if($passCheck == FALSE){
            header("Location:../index.php?error=wrongpass");
            exit();
         }elseif($passCheck == TRUE){
            $_SESSION['sessionId'] = $row['id'];
            $_SESSION['sessionUser'] = $row['username'];
            header("Location:userProfile.php?username={$_POST['username']}");
            exit();
         }
      }else{
         header("Location:../index.php?error=nouser");
         exit();
      } 
   }
?>