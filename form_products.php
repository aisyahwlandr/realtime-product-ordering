<?php
include 'db_connect.php'; ?>

<form action="proses_tambah_produk.php" method="POST">
        <label for="variant">Variant:</label>
        <input type="text" id="variant" name="variant" required><br>

        <label for="photo1">Foto 1:</label>
        <input type="text" id="photo1" name="photo1" required><br>

        <label for="photo2">Foto 2:</label>
        <input type="text" id="photo2" name="photo2" required><br>

        <label for="photo3">Foto 3:</label>
        <input type="text" id="photo3" name="photo3" required><br>

        <label for="harga">Harga:</label>
        <input type="text" id="harga" name="harga" required><br>

        <label for="isi">Isi:</label>
        <input type="text" id="isi" name="isi" required><br>

        <label for="deskripsi">Deskripsi:</label>
        <input type="text" id="deskripsi" name="deskripsi" required><br>

        <label for="stock">Stock:</label>
        <input type="text" id="stock" name="stock" required><br>

        <button type="submit">Tambah Produk</button>
    </form>
