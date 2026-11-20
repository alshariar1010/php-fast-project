<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; background: #121212; color: #fff; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .form-container { background: #1e1e1e; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.5); width: 380px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-size: 14px; }
        input { width: 100%; padding: 10px; border: 1px solid #333; background: #2a2a2a; color: #fff; border-radius: 4px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #4f46e5; border: none; color: white; border-radius: 4px; font-weight: bold; cursor: pointer; }
        button:hover { background: #4338ca; }
        .error { color: #f87171; font-size: 12px; margin-top: 5px; display: block; }
        .success-msg { background: #064e3b; color: #6ee7b7; padding: 10px; border-radius: 4px; margin-bottom: 15px; font-size: 14px; border: 1px solid #059669; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Register</h2>

    <!-- সাকসেস মেসেজ থাকলে দেখাবে -->
    <?php if (isset($_SESSION['success'])): ?>
        <div class="success-msg">
            <?= $_SESSION['success']; ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <form action="register_post.php" method="POST">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter your name" value="<?= $_SESSION['old_data']['name'] ?? ''; ?>">
            <!-- নামের এরর -->
            <?php if (isset($_SESSION['errors']['name_error'])): ?>
                <span class="error"><?= $_SESSION['errors']['name_error']; ?></span>
            <?php endif; ?>
        </div>
        
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email" value="<?= $_SESSION['old_data']['email'] ?? ''; ?>">
            <!-- ইমেইলের এরর -->
            <?php if (isset($_SESSION['errors']['email_error'])): ?>
                <span class="error"><?= $_SESSION['errors']['email_error']; ?></span>
            <?php endif; ?>
        </div>
        
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password">
            <!-- পাসওয়ার্ডের এরর -->
            <?php if (isset($_SESSION['errors']['password_error'])): ?>
                <span class="error"><?= $_SESSION['errors']['password_error']; ?></span>
            <?php endif; ?>
        </div>
        
        <button type="submit" name="submit_btn">Register</button>
    </form>
</div>

<?php
// কাজ শেষ হলে সেশনের এরর ও ওল্ড ডেটা মুছে ফেলা হলো
unset($_SESSION['errors']);
unset($_SESSION['old_data']);
?>

</body>
</html>