<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sederhana</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "admin" && $password === "12345") {
        // HALAMAN JIKA LOGIN BERHASIL
        ?>
        <h2>Login Berhasil</h2>
        <p>Selamat datang, <strong><?= $username ?></strong>.</p>
        <?php
    } else {
        // HALAMAN JIKA LOGIN GAGAL
        ?>
        <h2>Login Gagal</h2>
        <p>Username atau password salah.</p>
        <a href="">Coba login lagi</a>
        <?php
    }

} else {
    // HALAMAN FORM (SEBELUM SUBMIT)
    ?>
    <h3>Login</h3>

    <form method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
    <?php
}
?>

</body>
</html>
