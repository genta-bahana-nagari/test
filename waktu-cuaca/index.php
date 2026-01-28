<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Aktivitas Harian</title>

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
            width: 360px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2, h3 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
            text-align: left;
        }

        select, button {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #2196F3;
            color: white;
            font-size: 15px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #1e88e5;
        }

        .result {
            font-weight: bold;
            margin-top: 10px;
        }

        .success {
            color: #2e7d32;
        }
    </style>
</head>
<body>

<div class="container">
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cuaca = $_POST['cuaca'];
    $waktu = $_POST['waktu'];
    $aktivitas = "";

    if ($cuaca === "cerah" && $waktu === "pagi") {
        $aktivitas = "Jogging di luar rumah";
    } elseif ($cuaca === "cerah" && $waktu === "siang") {
        $aktivitas = "Bersepeda";
    } elseif ($cuaca === "cerah" && $waktu === "malam") {
        $aktivitas = "Jalan santai";
    } elseif ($cuaca === "hujan" && $waktu === "pagi") {
        $aktivitas = "Membaca buku";
    } elseif ($cuaca === "hujan" && $waktu === "siang") {
        $aktivitas = "Menonton film";
    } else {
        $aktivitas = "Istirahat / tidur";
    }
    ?>
    <h2 class="success">Aktivitas Disarankan</h2>
    <p>Cuaca: <strong><?= htmlspecialchars($cuaca) ?></strong></p>
    <p>Waktu: <strong><?= htmlspecialchars($waktu) ?></strong></p>
    <p class="result"><?= htmlspecialchars($aktivitas) ?></p>

    <a href="">Cek lagi</a>
    <?php
} else {
    ?>
    <h3>Tentukan Aktivitas</h3>

    <form method="post">
        <label for="cuaca">Cuaca</label>
        <select name="cuaca" id="cuaca" required>
            <option value="">-- Pilih Cuaca --</option>
            <option value="cerah">Cerah</option>
            <option value="hujan">Hujan</option>
        </select>

        <label for="waktu">Waktu</label>
        <select name="waktu" id="waktu" required>
            <option value="">-- Pilih Waktu --</option>
            <option value="pagi">Pagi</option>
            <option value="siang">Siang</option>
            <option value="malam">Malam</option>
        </select>

        <button type="submit">Tentukan Aktivitas</button>
    </form>
    <?php
}
?>
</div>

</body>
</html>
