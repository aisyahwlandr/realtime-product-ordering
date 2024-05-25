<?php
include 'db_connect.php'; // Sertakan file koneksi ke database

// Query SQL
$sql = "SELECT
            o.id,
            o.nama,
            o.telepon,
            o.email,
            o.wilayah,
            o.alamat,
            o.mtdBayar,
            o.order_date,
            o.status,
            GROUP_CONCAT(oi.product_id) AS product_id,
            GROUP_CONCAT(p.variant) AS variant,
            GROUP_CONCAT(oi.quantity) AS quantity,
            SUM(oi.harga_orders) AS harga_orders
        FROM
            orders o
        JOIN
            order_items oi ON o.id = oi.order_id
        JOIN
            products p ON oi.product_id = p.id
        GROUP BY
            o.id, o.nama, o.telepon, o.email, o.wilayah, o.alamat, o.mtdBayar, o.order_date, o.status";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Wilayah</th>
                <th>Alamat</th>
                <th>Variant</th>
                <th>Variant ID</th>
                <th>Quantity</th>
                <th>Harga</th>
                <th>Metode Pembayaran</th>
                <th>Waktu Order</th>
                <th>Status</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["nama"]."</td>
                <td>".$row["telepon"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["wilayah"]."</td>
                <td>".$row["alamat"]."</td>
                <td>".$row["variant"]."</td>
                <td>".$row["product_id"]."</td>
                <td>".$row["quantity"]."</td>
                <td>".$row["harga_orders"]."</td>
                <td>".$row["mtdBayar"]."</td>
                <td>".$row["order_date"]."</td>
                <td>".$row["status"]."</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
