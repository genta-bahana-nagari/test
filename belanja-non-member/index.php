<?php
$diskon = null;
$bonus = null;
$totalBayar = null;
$total = null;

if (isset($_POST['hitung'])) {
    $total = $_POST['total'];

    if ($total >= 500000) {
        $diskon = 10;
        $bonus = "Voucher 20.000";
    } else {
        if ($total >= 300000) {
            $diskon = 5;
            $bonus = "Voucher 20.000";
        } else {
            $diskon = 0;
            $bonus = "Tidak ada";
        }
    }

    $potongan   = $total * $diskon / 100;
    $totalBayar = $total - $potongan;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Non Member</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
        }
        .box {
            width: 420px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
        }
        input, button {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
        }
        .hasil {
            margin-top: 15px;
            background: #f0ffe6;
            padding: 12px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class="box">

<?php if (!isset($_POST['hitung'])) { ?>

    <h3>Pelanggan Non-Member</h3>
    <form method="post">
        <label>Total Belanja</label>
        <input type="number" name="total" required>
        <button type="submit" name="hitung">Hitung</button>
    </form>

<?php } else { ?>

    <h3>Hasil Perhitungan</h3>
    <div class="hasil">
        <p>Total Belanja : Rp <?= number_format($total,0,',','.') ?></p>
        <p>Diskon        : <?= $diskon ?>%</p>
        <p>Total Bayar   : Rp <?= number_format($totalBayar,0,',','.') ?></p>
        <p>Bonus         : <?= $bonus ?></p>
    </div>

    <form method="post">
        <button type="submit">Hitung Ulang</button>
    </form>

<?php } ?>

</div>

</body>
</html>
