<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
   

    <form  action="/actionpage.php" method="post">
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
     <input type ="submit" value ="Submit" class="button">

    </form>
</div>
</body>
</html>