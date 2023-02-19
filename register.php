<html>
    <head>
        <title>register</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <div class="form">
    <form class="register-form" action="./includes/registerInc.php" method="post">
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <input type="text" name="email" placeholder="email address"/>
      <input type="text" name="phone" placeholder="phone numbers"/>
      <input type="text" name="address" placeholder="address"/>
      <input type="text" name="gender" placeholder="gender"/>
      <button>create</button>
      <p class="message">Already registered? <a href="index.php">Sign In</a></p>
    </form>
</div>
    </body>
</html>
