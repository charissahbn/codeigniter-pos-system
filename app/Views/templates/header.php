<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title) ?> | Simple POS</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            color: #222;
        }

        nav {
            background-color: #1f2937;
            padding: 16px 30px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
        }

        nav a:hover {
            color: #60a5fa;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #1f2937;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f3f4f6;
        }
    </style>
</head>

<body>

<nav>
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/customers">Customer Accounts</a>
    <a href="/users">User Accounts</a>

    <?php if (session()->get('isLoggedIn')): ?>
        <span style="color: white; margin-right: 15px;">
            Logged in as <?= esc(session()->get('username')) ?>
        </span>

        <form
            action="<?= site_url('logout') ?>"
            method="post"
            style="display: inline;"
        >
            <?= csrf_field() ?>
            <button type="submit">Logout</button>
        </form>
    <?php else: ?>
        <a href="<?= site_url('login') ?>">Login</a>
    <?php endif; ?>
</nav>

<main class="container">