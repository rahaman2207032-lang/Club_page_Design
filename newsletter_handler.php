<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    if (empty($email)) {
        echo json_encode(['success' => false, 'message' => '❌ Email is required!']);
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => '❌ Invalid email format!']);
        exit();
    }

    $email = mysqli_real_escape_string($connection, $email);

    $check_email = "SELECT id FROM newsletter WHERE email = '$email'";
    $result = mysqli_query($connection, $check_email);

    if (!$result) {
        echo json_encode(['success' => false, 'message' => '❌ Database error: ' . mysqli_error($connection)]);
        exit();
    }

    if (mysqli_num_rows($result) > 0) {
        echo json_encode(['success' => false, 'message' => '❌ Email already subscribed!']);
        exit();
    }

    $insert_query = "INSERT INTO newsletter (email, status) VALUES ('$email', 'active')";

    if (mysqli_query($connection, $insert_query)) {
        echo json_encode(['success' => true, 'message' => '✅ Successfully subscribed to newsletter!']);
    } else {
        echo json_encode(['success' => false, 'message' => '❌ Error: ' . mysqli_error($connection)]);
    }

    exit();
}
?>
