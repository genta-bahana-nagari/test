<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Beasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f6fb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 25px 30px;
            border-radius: 8px;
            width: 380px;
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

        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .checkbox {
            text-align: left;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #673ab7;
            border: none;
            color: white;
            font-size: 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #5e35b1;
        }

        .success {
            color: #2e7d32;
            font-weight: bold;
        }

        .error {
            color: #c62828;
            font-weight: bold;
        }

        p {
            font-size: 14px;
            color: #555;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #673ab7;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $score = (int) $_POST['score'];
    $earnings = (int) $_POST['earnings'];
    $achievement = isset($_POST['achievement']);

    if (($score >= 85 && $earnings <= 3000000) || $achievement) {
        // LOLOS BEASISWA
        ?>
        <h2 class="success">Selamat!</h2>
        <p>Anda dinyatakan <strong>mendapatkan beasiswa</strong>.</p>
        <p>Nilai: <?= htmlspecialchars($score) ?></p>
        <p>Penghasilan: Rp <?= number_format($earnings, 0, ',', '.') ?></p>
        <?php
    } else {
        // TIDAK LOLOS
        ?>
        <h2 class="error">Maaf</h2>
        <p>Anda <strong>tidak mendapatkan beasiswa</strong>.</p>
        <p>Nilai: <?= htmlspecialchars($score) ?></p>
        <p>Penghasilan: Rp <?= number_format($earnings, 0, ',', '.') ?></p>
        <?php
    }
    ?>
    <a href="">Cek lagi</a>
    <?php

} else {
    // FORM INPUT
    ?>
    <h3>Verifikasi Penerima Beasiswa</h3>

    <form method="post">
        <label>Nilai</label>
        <input type="number" name="score" min="0" max="100" required>

        <label>Penghasilan (Rp)</label>
        <input type="number" name="earnings" required>

        <div class="checkbox">
            <input type="checkbox" name="achievement" id="achievement">
            <label for="achievement">Juara Lomba</label>
        </div>

        <button type="submit">Cek Beasiswa</button>
    </form>
    <?php
}
?>
</div>

</body>
</html>
