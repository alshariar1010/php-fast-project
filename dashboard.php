
<?php
session_start();
require 'session_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0b1120;
            color: #e2e8f0;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #111827;
            border-right: 1px solid #1e293b;
            padding: 28px 18px;
        }

        .logo {
            font-size: 23px;
            font-weight: 800;
            color: #10b981;
            padding: 0 12px;
            margin-bottom: 45px;
        }

        .logo span {
            color: white;
        }

        .menu-title {
            font-size: 11px;
            color: #64748b;
            font-weight: 700;
            padding: 0 12px;
            margin-bottom: 15px;
            letter-spacing: 1.5px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            margin-bottom: 7px;
            color: #94a3b8;
            border-radius: 9px;
            font-size: 14px;
            transition: .3s;
        }

        .menu a:hover,
        .menu a.active {
            background: #064e3b;
            color: #34d399;
        }

        .menu a i {
            width: 18px;
            text-align: center;
        }

        .bottom-menu {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
        }

        .logout {
            color: #f87171 !important;
            background: #7f1d1d20;
        }

        .main {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .topbar h2 {
            font-size: 23px;
            font-weight: 700;
        }

        .topbar p {
            font-size: 13px;
            color: #64748b;
            margin-top: 7px;
        }

        .admin {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #064e3b;
            color: #34d399;
            display: grid;
            place-items: center;
            font-size: 18px;
        }

        .admin-info strong {
            font-size: 13px;
        }

        .admin-info small {
            display: block;
            color: #64748b;
            margin-top: 4px;
        }

        .welcome {
            background: linear-gradient(120deg, #064e3b, #0f766e);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 28px;
        }

        .welcome h1 {
            font-size: 25px;
            margin-bottom: 10px;
        }

        .welcome p {
            color: #ccfbf1;
            font-size: 14px;
        }

        .section-title {
            font-size: 17px;
            margin-bottom: 18px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .card {
            background: #111827;
            border: 1px solid #1e293b;
            border-radius: 14px;
            padding: 22px;
        }

        .card-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            background: #064e3b;
            color: #34d399;
            margin-bottom: 20px;
        }

        .card p {
            color: #94a3b8;
            font-size: 13px;
        }

        .card h2 {
            font-size: 25px;
            margin-top: 9px;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .action {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #111827;
            border: 1px solid #1e293b;
            padding: 20px;
            border-radius: 13px;
            transition: .3s;
        }

        .action:hover {
            border-color: #10b981;
            transform: translateY(-3px);
        }

        .action i {
            font-size: 20px;
            color: #34d399;
        }

        .action strong {
            font-size: 14px;
        }

        .action small {
            display: block;
            color: #64748b;
            margin-top: 5px;
        }

        .footer {
            margin-top: 45px;
            text-align: center;
            font-size: 12px;
            color: #475569;
        }

        @media(max-width: 1000px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width: 650px) {
            .sidebar {
                width: 68px;
                padding: 20px 9px;
            }

            .logo {
                font-size: 17px;
                padding: 0;
                text-align: center;
            }

            .logo span,
            .menu-title,
            .menu a span {
                display: none;
            }

            .menu a {
                justify-content: center;
                padding: 14px 5px;
            }

            .bottom-menu {
                left: 9px;
                right: 9px;
            }

            .main {
                margin-left: 68px;
                padding: 18px 12px;
            }

            .stats {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .card {
                padding: 15px;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }

            .welcome {
                padding: 22px;
            }

            .welcome h1 {
                font-size: 20px;
            }

            .admin-info {
                display: none;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="logo">
            <i class="fa-solid fa-cube"></i> <span>shariar</span>
        </div>

        <div class="menu-title">MAIN MENU</div>

        <nav class="menu">
            <a href="dashboard.php" class="active">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>

            <a href="users.php">
                <i class="fa-solid fa-users"></i>
                <span>Users</span>
            </a>

            <a href="add-user.php">
                <i class="fa-solid fa-user-plus"></i>
                <span>Add User</span>
            </a>

            <a href="settings.php">
                <i class="fa-solid fa-gear"></i>
                <span>Settings</span>
            </a>

            <a href="profile.php">
                <i class="fa-solid fa-user"></i>
                <span>Profile</span>
            </a>
        </nav>

        <div class="bottom-menu menu">
            <a href="logout.php" class="logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        </div>

    </aside>


    <main class="main">

        <header class="topbar">
            <div>
                <h2>Dashboard</h2>
                <p>Welcome back! Here's what's happening.</p>
            </div>

            <div class="admin">
                <div class="avatar">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
                <div class="admin-info">
                    <strong>Administrator</strong>
                    <small>Super Admin</small>
                </div>
            </div>
        </header>


        <section class="welcome">
            <h1>Welcome to Dashboard 👋</h1>
            <p>Manage your website, users and settings from one place.</p>
        </section>


        <h3 class="section-title">Overview</h3>

        <section class="stats">

            <div class="card">
                <div class="card-icon">
                    <i class="fa-solid fa-users"></i>
                </div>
                <p>Total Users</p>
                <h2>--</h2>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fa-solid fa-user-check"></i>
                </div>
                <p>Active Users</p>
                <h2>--</h2>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <p>New Users</p>
                <h2>--</h2>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <p>System Status</p>
                <h2 style="color:#34d399;font-size:19px;">
                    Online
                </h2>
            </div>

        </section>


        <h3 class="section-title">Quick Actions</h3>

        <section class="quick-actions">

            <a href="users.php" class="action">
                <i class="fa-solid fa-users"></i>
                <div>
                    <strong>Manage Users</strong>
                    <small>View and manage all users</small>
                </div>
            </a>

            <a href="add-user.php" class="action">
                <i class="fa-solid fa-user-plus"></i>
                <div>
                    <strong>Add New User</strong>
                    <small>Create a new account</small>
                </div>
            </a>

            <a href="settings.php" class="action">
                <i class="fa-solid fa-gear"></i>
                <div>
                    <strong>Settings</strong>
                    <small>Manage system settings</small>
                </div>
            </a>

        </section>


        <div class="footer">
            © 2026 AdminPro. All rights reserved.
        </div>

    </main>

</body>
</html>
