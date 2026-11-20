<?php
session_start();
require 'db.php';

if (isset($_POST['submit_btn'])) {
    
    $name     = trim($_POST['name']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $after_hash = password_hash($password, PASSWORD_DEFAULT);

    $errors = [];

    // ১. নাম চেক
    if (empty($name)) {
        $errors['name_error'] = "Name field is required!";
    }

    // ২. ইমেইল চেক
    if (empty($email)) {
        $errors['email_error'] = "Email field is required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email_error'] = "Invalid email format!";
    }

    // ৩. পাসওয়ার্ড চেক
    if (empty($password)) {
        $errors['password_error'] = "Password field is required!";
    } elseif (strlen($password) < 6) {
        $errors['password_error'] = "Password must be at least 6 characters long!";
    }

    // ৪. কোনো এরর না থাকলে ডেটাবেজে ইনসার্ট হবে
    if (empty($errors)) {
        $insert = "INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$after_hash')";
        mysqli_query($db_connect, $insert);

        // সাকসেস মেসেজ সেশনে রেখে ফর্মে রিডাইরেক্ট (রিফ্রেশ সমস্যা সমাধান)
        $_SESSION['success'] = "Registration Successful! 🎉";
        header('location: register.php');
        exit();
        
    } else {
        // এরর থাকলে এররগুলো এবং পুরনো ইনপুটগুলো সেশনে রেখে ফর্মে ফেরত পাঠানো
        $_SESSION['errors'] = $errors;
        $_SESSION['old_data'] = [
            'name' => $name,
            'email' => $email
        ];
        
        header('location: register.php');
        exit();
    }

} else {
    // সরাসরি কেউ ফাইলে ঢুকলে ফর্মে পাঠিয়ে দেবো
    header('location: register.php');
    exit();
}
?>