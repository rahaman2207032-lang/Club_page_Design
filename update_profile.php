<?php
session_start();
include 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if (empty($fname) || empty($lname) || empty($email) || empty($mobile)) {
        $error = "❌ Error: All fields are required!";

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "❌ Error: Invalid email format!";

    } else if (strlen($mobile) < 10 || strlen($mobile) > 15 || !ctype_digit($mobile)) {
        $error = "❌ Error: Mobile must be 10-15 digits!";
        
    } else {
        $check_email = "SELECT id FROM register WHERE email = '$email' AND id != '$user_id'";
        $result = mysqli_query($connection, $check_email);

        if (mysqli_num_rows($result) > 0) {
            $error = "❌ Error: Email already exists!";
        } else {
            if (!empty($password)) {
                if (strlen($password) < 8) {
                    $error = "❌ Error: Password must be at least 8 characters!";
                } else if ($password !== $password_confirm) {
                    $error = "❌ Error: Passwords do not match!";
                } else {
                    $update_query = "UPDATE register SET fname = '$fname', lname = '$lname', email = '$email', mobile = '$mobile', password = '$password' WHERE id = '$user_id'";
                    if (mysqli_query($connection, $update_query)) {
                        $_SESSION['fname'] = $fname;
                        $_SESSION['lname'] = $lname;
                        $_SESSION['email'] = $email;
                        $message = "✅ Profile updated successfully!";
                    } else {
                        $error = "❌ Error: " . mysqli_error($connection);
                    }
                }
            } else {
                $update_query = "UPDATE register SET fname = '$fname', lname = '$lname', email = '$email', mobile = '$mobile' WHERE id = '$user_id'";
                if (mysqli_query($connection, $update_query)) {
                    $_SESSION['fname'] = $fname;
                    $_SESSION['lname'] = $lname;
                    $_SESSION['email'] = $email;
                    $message = "✅ Profile updated successfully!";
                } else {
                    $error = "❌ Error: " . mysqli_error($connection);
                }
            }
        }
    }
}

$user_query = "SELECT * FROM register WHERE id = '$user_id'";
$result = mysqli_query($connection, $user_query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">
    <style>
        .success-message {
            background-color: rgba(76, 175, 80, 0.2);
            color: #4CAF50;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #4CAF50;
            text-align: center;
        }
        .error-message {
            background-color: rgba(244, 67, 54, 0.2);
            color: #F44336;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #F44336;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            color: #1496a0;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="update_profile.php" method="post">
        <div class="logincontainer">
            <h1 align="center" style="color: white;">Update Profile</h1>

            <?php if ($message): ?>
                <div class="success-message"><?php echo $message; ?></div>
                <script>
                    setTimeout(function() {
                        window.location.href = 'home.php';
                    }, 2000);
                </script>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>

            <div class="form-group">
                <label for="fname" class="tag">First Name:</label>
                <input type="text" id="fname" name="fname" class="inp" value="<?php echo htmlspecialchars($user['fname']); ?>" required><br><br>
            </div>

            <div class="form-group">
                <label for="lname" class="tag">Last Name:</label>
                <input type="text" id="lname" name="lname" class="inp" value="<?php echo htmlspecialchars($user['lname']); ?>" required><br><br>
            </div>

            <div class="form-group">
                <label for="email" class="tag">Email:</label>
                <input type="email" id="email" name="email" class="inp" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>
            </div>

            <div class="form-group">
                <label for="mobile" class="tag">Mobile:</label>
                <input type="text" id="mobile" name="mobile" class="inp" value="<?php echo htmlspecialchars($user['mobile']); ?>" placeholder="10-15 digits" required><br><br>
            </div>

            <div class="form-group">
                <label for="password" class="tag">New Password (leave blank to keep current):</label>
                <input type="password" id="password" name="password" class="inp" placeholder="Optional"><br><br>
            </div>

            <div class="form-group">
                <label for="password_confirm" class="tag">Confirm Password:</label>
                <input type="password" id="password_confirm" name="password_confirm" class="inp" placeholder="Optional"><br><br>
            </div>

            <label for="submit" class="tag"></label>
            <input type="submit" name="submit" value="Update Profile" class="button"><br><br>

            <div class="back-link">
                <a href="home.php">← Back to Home</a>
            </div>
        </div>
    </form>
</body>
</html>
