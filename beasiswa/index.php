<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Beasiswa</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $score = $_POST['score'];
    $earnings = $_POST['earnings'];
    $achievement = isset($_POST['achievement']);

    if (($score >= 85 && $earnings <= 3000000) || $achievement) {
        // HALAMAN JIKA LOLOS
        ?>
        <h2>Selamat!</h2>
        <p>Anda dinyatakan <strong>mendapatkan beasiswa</strong>.</p>
        <p>Nilai: <?= $score ?></p>
        <p>Penghasilan: <?= $earnings ?></p>
        <?php
    } else {
        // HALAMAN JIKA TIDAK LOLOS
        ?>
        <h2>Maaf</h2>
        <p>Anda <strong>tidak mendapatkan beasiswa</strong>.</p>
        <p>Nilai: <?= $score ?></p>
        <p>Penghasilan: <?= $earnings ?></p>
        <?php
    }

} else {
    // HALAMAN FORM (SEBELUM SUBMIT)
    ?>
    <h3>Verifikasi Penerima Beasiswa</h3>

    <form method="post">
        <label>Nilai:</label><br>
        <input type="number" name="score" required><br><br>

        <label>Penghasilan:</label><br>
        <input type="number" name="earnings" required><br><br>

        <input type="checkbox" name="achievement" id="achievement">
        <label for="achievement">Juara Lomba</label><br><br>

        <button type="submit">Cek Beasiswa</button>
    </form>
    <?php
}
?>

</body>
</html>
