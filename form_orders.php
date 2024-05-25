<?php
include 'db_connect.php'; // Sertakan file koneksi ke database
?>

<form action="proses_order.php" method="POST">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required><br>

    <label for="telepon">Telepon:</label>
    <input type="text" id="telepon" name="telepon" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br>

    <label for="wilayah">Pilih Wilayah:</label>
    <select name="wilayah" class="form-select" required>
        <option value="" selected disabled>Pilih Wilayah Terdekat Pemesan</option>
        <option value="Cisauk">Cisauk</option>
        <option value="Tangerang Selatan">Tangerang Selatan</option>
        <option value="Kampus K Universitas Gunadarma">Kampus K Universitas Gunadarma</option>
    </select><br>

    <label for="alamat">Alamat Lengkap:</label>
    <input type="text" id="alamat" name="alamat" required><br>


    <label>Produk:</label><br>
    <?php
    // Ambil data produk dari database
    $sql = "SELECT id, variant, stock FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        foreach ($result as $row) {
            echo "<input type='checkbox' id='product_" . $row["id"] . "' name='product_id[" . $row["id"] . "]' value='" . $row["id"] . "' data-stock='" . $row["stock"] . "'><label for='product_" . $row["id"] . "'>" . $row["variant"] . " (Stok: " . $row["stock"] . ")</label>";
            echo "<input type='number' id='quantity_" . $row["id"] . "' name='quantity[" . $row["id"] . "]' min='1'><br>";
        }
    } else {
        echo "<p>Tidak ada produk tersedia</p>";
    }
    ?>

    <label for="mtdBayar">Metode Pembayaran:</label>
    <select id="mtdBayar" name="mtdBayar" required>
        <option value="" selected disabled>Pilih Metode Pembayaran</option>
        <option value="OVO">OVO</option>
        <option value="GOPAY">GOPAY</option>
    </select><br>

    <button type="submit">Pesan Sekarang</button>
</form>