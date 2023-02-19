<?php
  session_start();
  if(isset($_SESSION['sessionUser'])){
    header("Location:./includes/userProfile.php");
  }
?>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <div class="login-page">
  <div class="form" >
    <form class="login-form" action="./includes/loginInc.php" method="POST">
      <input type="text" name = "username" placeholder="username"/>
      <input type="password" name ="password" placeholder="password"/>
      <button>login</button>
      <p class="message">Not registered? <a href="register.php">Create an account</a></p>
    </form>
  </div>
    </div>
    </body>
</html>