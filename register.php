<?php
if (isset($_POST['submit'])) {
   
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $education = $_POST['education'];
    $mobile = $_POST['Mobile'];
    $dob = $_POST['dob'];
    $image = $_POST['image']; 

   
    $connection = mysqli_connect('localhost', 'root', '', 'reg_db');

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    
 
    if (empty($fname) || empty($lname) || empty($email) || empty($password) || 
        empty($gender) || empty($education) || empty($mobile) || empty($dob)) {
        echo "<script>alert('❌ Error: All fields are required!');</script>";
        mysqli_close($connection);
        exit();
    }

   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('❌ Error: Invalid email format!');</script>";
        mysqli_close($connection);
        exit();
    }

  
    $check_email = "SELECT * FROM register WHERE email = '$email'";
    $result = mysqli_query($connection, $check_email);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('❌ Error: Email already exists! Please use a different email.');</script>";
        mysqli_close($connection);
        exit();
    }


    if (strlen($password) < 8) {
        echo "<script>alert('❌ Error: Password must be at least 8 characters long!');</script>";
        mysqli_close($connection);
        exit();
    }

    if (!preg_match('/[A-Z]/', $password)) {
        echo "<script>alert('❌ Error: Password must contain at least 1 uppercase letter!');</script>";
        mysqli_close($connection);
        exit();
    }

    if (!preg_match('/[0-9]/', $password)) {
        echo "<script>alert('❌ Error: Password must contain at least 1 number!');</script>";
        mysqli_close($connection);
        exit();
    }

   
    if (!preg_match('/^[0-9]{10,15}$/', $mobile)) {
        echo "<script>alert('❌ Error: Mobile number must be 10-15 digits!');</script>";
        mysqli_close($connection);
        exit();
    }

  
    $stored_password = $password;


    $insert_query = "INSERT INTO register (fname, lname, email, password, gender, education, mobile, dob, image) 
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($connection, $insert_query);
    mysqli_stmt_bind_param($stmt, "sssssssss", $fname, $lname, $email, $stored_password, $gender, $education, $mobile, $dob, $image);

    $insert = mysqli_stmt_execute($stmt);

    if ($insert) {
        echo "<script>alert(' Registration Successful! Your account has been created.');</script>";
        echo "<script>window.location.href='login.php';</script>";
    } else {
        echo "<script>alert(' Error: Registration failed - " . mysqli_error($connection) . "');</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
   <video autoplay muted loop playsinline id="bg-video">
        <source src="video/video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <form  action="register.php" method="post">
  <div class="logincontainer">   
      <h1 align="center" style="color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Register</h1>   
     <label for="fname" class="tag">First Name:</label>
     <input type="text" id="fname" name="fname" class="inp"><br><br>
     <label for="lname" class="tag">Last Name:</label>
     <input type="text" id="lname" name="lname" class="inp"><br><br>
     <label for="email" class="tag">Email:</label>
     <input type ="email" id="email" name="email" class="inp"><br><br>
     <label for="password" class="tag">Password:</label>
     <input type ="password" id="password" name="password" class="inp"><br><br>
     <label for="gender" class="tag">Gender:</label>    
     <input type="radio" id="male" name="gender" value="male">
        <label for="male" class="tag">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female" class="tag">Female</label> <br><br>
    <label for="education" class="tag">Qualification:</label>
    <select name="education" id="education">
        <option value="beg">Beginner</option>
        <option value="inter">Intermediate</option>
        <option value="exp">Expert</option>
    </select>
        <br><br>
    <label for="Mobile" class="tag">Mobile:</label>
     <input type ="text" id="Mobile" name="Mobile" class="inp"><br><br>
        <label for="dob" class="tag">Date of Birth:</label>
        <input type="date" id="dob" name="dob" class="inp"><br><br>
        <label for="image" class="tag">Upload your image:</label>
        <input type="file" id="image" name="image"><br><br>
        <br>
     <label for="submit" class="tag"></label>
     <input type ="submit" value="Submit" name="submit" class="button">

    </form>
</div>
</body>
</html>