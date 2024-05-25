<?php
include 'db_connect.php'; // Sertakan file koneksi ke database

// Ambil data yang dikirimkan melalui form
$variant = $_POST['variant'];
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$harga = $_POST['harga'];
$isi = $_POST['isi'];
$deskripsi = $_POST['deskripsi'];
$stock = $_POST['stock'];

// Query SQL untuk menambahkan produk ke dalam database
$sql = "INSERT INTO products (variant, photo1, photo2, photo3, harga, isi, deskripsi, stock) 
        VALUES ('$variant', '$photo1', '$photo2', '$photo3', '$harga', '$isi', '$deskripsi', '$stock')";

if ($conn->query($sql) === TRUE) {
    echo "Produk berhasil ditambahkan!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi ke database
$conn->close();
?>
