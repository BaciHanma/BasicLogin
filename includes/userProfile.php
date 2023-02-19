<?php
    require 'database.php';
    session_start();
    echo "<h1>Hello {$_SESSION['sessionUser']}</h1>";

    $sql = "SELECT * from users where username = '{$_SESSION['sessionUser']}'";
    $result = mysqli_query($conn,$sql);
    if(isset($_POST['update'])){
        if(!empty($_POST['username']) || !empty('email') || !empty('phone') || !empty('address') || !empty('gender')){
            $sqlQuery = "UPDATE users SET username='{$_POST['username']}',email='{$_POST['email']}',phone='{$_POST['phone']}',addr='{$_POST['address']}',gender='{$_POST['username']}' where username='{$_SESSION['sessionUser']}'";
            $_SESSION['sessionUser'] = $_POST['username'];
            mysqli_query($conn,$sqlQuery);
            header("Location:userProfile.php");
            exit();
        }else{
            header("Location:userProfile.php?error=fullFillErr");
            exit();
        }
    }
    if(isset($_POST['delete'])){
        $sqlD = "DELETE FROM users WHERE username = '{$_POST['username']}'";
        mysqli_query($conn,$sqlD);
        header("Location:logOut.php");
        exit();
    }

?>
<html>
    <head>
    </head>
    <body>
        <form action="userProfile.php" method="POST">
        <table>
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Gender</td>
            </tr>
            <?php
                if(isset($result) && $row = mysqli_fetch_assoc($result)){
            ?>
                <td><input type="text" name= "id" placeholder="id" value="<?php echo $row['id'] ?>"></td>
                <td><input type="text" name= "username" placeholder="username" value="<?php echo $row['username'] ?>"></td>
                <td><input type="text" name= "email" placeholder="email" value="<?php echo $row['email'] ?>"></td> 
                <td><input type="text" name= "phone" placeholder="phone" value="<?php echo $row['phone'] ?>"></td>
                <td><input type="text" name= "address" placeholder="address" value="<?php echo $row['addr'] ?>"></td>
                <td><input type="text" name= "gender" placeholder="gender" value="<?php echo $row['gender'] ?>"></td>
                <td><button type="submit" name="update">Update</button></td>
                <td><button type="submit" name="delete">Delete</button></td> 
            </tr>
            <?php
                }
            ?>
        </table>
        </form>
        <a href="logOut.php">Logout</a>
        <a href="changePassword.php">change password</a>
    </body>
</html>

