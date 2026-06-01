<?php
session_start();

if (isset($_POST['submit'])) {
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $connection = mysqli_connect('localhost', 'root', '', 'reg_db');

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

 
    if (empty($fname) || empty($lname) || empty($email) || empty($password)) {
        echo "<script>alert('❌ Error: All fields are required!');</script>";
        mysqli_close($connection);
        exit();
    }

  
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('❌ Error: Invalid email format!');</script>";
        mysqli_close($connection);
        exit();
    }


    $login_query = "SELECT * FROM register WHERE email = '$email'";
    $result = mysqli_query($connection, $login_query);

    if (mysqli_num_rows($result) == 0) {
       
        echo "<script>alert('❌ Error: Email not registered! Please register first.');</script>";
        
 
        $insert_login_log = "INSERT INTO login (email, password, ip_address, status) 
                            VALUES ('$email', '', '" . $_SERVER['REMOTE_ADDR'] . "', 'Failed - User not found')";
        mysqli_query($connection, $insert_login_log);
        
        mysqli_close($connection);
        exit();
    }

    $user = mysqli_fetch_assoc($result);

   
    if ($password != $user['password']) {
        echo "<script>alert('❌ Error: Incorrect password!');</script>";
        
  
        $insert_login_log = "INSERT INTO login (user_id, email, password, ip_address, status) 
                            VALUES ('" . $user['id'] . "', '$email', '', '" . $_SERVER['REMOTE_ADDR'] . "', 'Failed - Wrong password')";
        mysqli_query($connection, $insert_login_log);
        
        mysqli_close($connection);
        exit();
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['fname'] = $user['fname'];
    $_SESSION['lname'] = $user['lname'];

    
    $insert_login_log = "INSERT INTO login (user_id, email, password, ip_address, status)
                        VALUES ('" . $user['id'] . "', '$email', '$password', '" . $_SERVER['REMOTE_ADDR'] . "', 'Success')";
    $login_insert = mysqli_query($connection, $insert_login_log);

    if ($login_insert) {
        echo "<script>alert('✅ Login Successful! Welcome " . $user['fname'] . "');</script>";
        echo "<script>window.location.href='home.php';</script>";
    } else {
        echo "<script>alert('❌ Error: Login logged - " . mysqli_error($connection) . "');</script>";

        echo "<script>window.location.href='home.php';</script>";
    }

    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
   

    <form  action="login.php" method="post">
  <div class="logincontainer">   
      <h1 align="center" style="color: white;">Login</h1>   
     <label for="fname" class="tag">First Name:</label>
     <input type="text" id="fname" name="fname" class="inp"><br><br>
     <label for="lname" class="tag">Last Name:</label>
     <input type="text" id="lname" name="lname" class="inp"><br><br>
     <label for="email" class="tag">Email:</label>
     <input type ="email" id="email" name="email" class="inp"><br><br>
     <label for="password" class="tag">Password:</label>
     <input type ="password" id="password" name="password" class="inp"><br><br>
 
     <label for="submit" class="tag"></label>
     <input type="submit" name="submit" value="Submit" class="button">

    </form>
</div>
</body>
</html>