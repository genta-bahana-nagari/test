<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sederhana</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 25px 30px;
            border-radius: 8px;
            width: 320px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2, h3 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #4CAF50;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            color: #555;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "admin" && $password === "12345") {
        ?>
        <h2>Login Berhasil</h2>
        <p>Selamat datang, <strong><?= htmlspecialchars($username) ?></strong>.</p>
        <?php
    } else {
        ?>
        <h2>Login Gagal</h2>
        <p>Username atau password salah.</p>
        <a href="">Coba login lagi</a>
        <?php
    }

} else {
    ?>
    <h3>Login</h3>

    <form method="post">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
    <?php
}
?>
</div>

</body>
</html>
