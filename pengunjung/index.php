<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Akses Pengunjung</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 25px 30px;
            border-radius: 8px;
            width: 350px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2, h3 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: inline-block;
            margin-bottom: 8px;
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
            background-color: #2196F3;
            border: none;
            color: white;
            font-size: 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1e88e5;
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
            color: #2196F3;
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
    $age = (int) $_POST['age'];
    $has_card = isset($_POST['has_card']);

    if ($age >= 17 || $has_card) {
        // AKSES DITERIMA
        ?>
        <h2 class="success">Akses Diterima</h2>
        <p>Pengunjung <strong>boleh masuk</strong>.</p>
        <p>Umur: <?= htmlspecialchars($age) ?></p>
        <p>Kartu anggota: <?= $has_card ? 'Ya' : 'Tidak' ?></p>
        <?php
    } else {
        // AKSES DITOLAK
        ?>
        <h2 class="error">Akses Ditolak</h2>
        <p>Pengunjung <strong>tidak boleh masuk</strong>.</p>
        <p>Umur: <?= htmlspecialchars($age) ?></p>
        <p>Kartu anggota: <?= $has_card ? 'Ya' : 'Tidak' ?></p>
        <?php
    }
    ?>
    <a href="">Cek lagi</a>
    <?php

} else {
    // FORM INPUT
    ?>
    <h3>Cek Akses Pengunjung</h3>

    <form method="post">
        <label for="age">Umur</label>
        <input type="number" name="age" id="age" min="1" required>

        <div class="checkbox">
            <input type="checkbox" name="has_card" id="has_card">
            <label for="has_card">Punya kartu anggota</label>
        </div>

        <button type="submit">Cek</button>
    </form>
    <?php
}
?>
</div>

</body>
</html>
