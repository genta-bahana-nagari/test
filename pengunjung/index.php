<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Akses Pengunjung</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $age = $_POST['age'];
    $has_card = isset($_POST['has_card']);

    if ($age >= 17 || $has_card) {
        // HALAMAN JIKA BOLEH MASUK
        ?>
        <h2>Akses Diterima</h2>
        <p>Pengunjung <strong>boleh masuk</strong>.</p>
        <p>Umur: <?= $age ?></p>
        <p>Kartu anggota: <?= $has_card ? 'Ya' : 'Tidak' ?></p>
        <?php
    } else {
        // HALAMAN JIKA TIDAK BOLEH MASUK
        ?>
        <h2>Akses Ditolak</h2>
        <p>Pengunjung <strong>tidak boleh masuk</strong>.</p>
        <p>Umur: <?= $age ?></p>
        <p>Kartu anggota: <?= $has_card ? 'Ya' : 'Tidak' ?></p>
        <?php
    }

} else {
    // HALAMAN FORM (SEBELUM SUBMIT)
    ?>
    <h3>Cek Akses Pengunjung</h3>

    <form method="post">
        <label for="age">Umur:</label><br>
        <input type="number" name="age" id="age" min="1" required><br><br>

        <input type="checkbox" name="has_card" id="has_card">
        <label for="has_card">Punya kartu anggota</label><br><br>

        <button type="submit">Cek</button>
    </form>
    <?php
}
?>

</body>
</html>
