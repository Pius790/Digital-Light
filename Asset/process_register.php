<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email     = mysqli_real_escape_string($conn, $_POST['email']);
    $phone     = mysqli_real_escape_string($conn, $_POST['phone']);
    $course    = mysqli_real_escape_string($conn, $_POST['course']);
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM members WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "Email already registered.";
    } else {
        $sql = "INSERT INTO members (full_name, email, phone, course, password) 
                VALUES ('$full_name', '$email', '$phone', '$course', '$password')";

        if (mysqli_query($conn, $sql)) {
            header("Location: success.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    echo "Invalid Request";
}
?>
