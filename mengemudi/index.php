<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cek Izin Mengemudi</title>

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

    $umur = (int) $_POST['umur'];
    $punya_sim = isset($_POST['sim']);
    $bisa_mengemudi = true; 

    
    if ($umur < 17) {
        ?>
        <h2 class="error">Tidak Boleh Mengemudi</h2>
        <p>Alasan: Umur kurang dari 17 tahun</p>
        <?php
        $bisa_mengemudi = false;
    }

    
    if ($bisa_mengemudi && !$punya_sim) {
        ?>
        <h2 class="error">Tidak Boleh Mengemudi</h2>
        <p>Alasan: Tidak memiliki SIM</p>
        <?php
        $bisa_mengemudi = false;
    }

    
    if ($bisa_mengemudi) {
        ?>
        <h2 class="success">Boleh Mengemudi</h2>
        <p>Anda <strong>diizinkan mengemudi</strong>.</p>
        <p>Umur: <?= htmlspecialchars($umur) ?> tahun</p>
        <p>Punya SIM: Ya</p>
        <?php
    }
    ?>
    <a href="">Cek lagi</a>
<?php
}
?>

<h3>Cek Izin Mengemudi</h3>

<form method="post">
    <label for="umur">Umur</label>
    <input type="number" name="umur" id="umur" min="1" required>

    <div class="checkbox">
        <input type="checkbox" name="sim" id="sim">
        <label for="sim">Punya SIM</label>
    </div>

    <button type="submit">Cek</button>
</form>

</div>

</body>
</html>
