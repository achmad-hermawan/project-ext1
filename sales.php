<?php
$host = 'localhost'; 
$db_name = 'tabel laptop'; 
$username = 'root'; 
$password = ''; 


$conn = new mysqli($host, $username, $password, $db_name);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_POST['delete'])) {
    $order_id = (int)$_POST['order_id'];

    
    $sql = "DELETE FROM sales WHERE order_id = $order_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?message=Data berhasil dihapus."); 
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$sql = "SELECT * FROM sales";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penjualan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-edit {
            background-color: yellow;
            padding: 5px 10px;
            border: none;
            color: black;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-hapus {
            background-color: red;
            padding: 5px 10px;
            border: none;
            color: white;
            cursor: pointer;
        }
        .btn-tambah {
            background-color: #007bff;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h2>Data Penjualan</h2>

    <!-- Tombol Tambah Penjualan -->
    <a href="form_tambah.php" class="btn-tambah">Tambah Penjualan</a>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price per Item</th>
                        <th>Total Price</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>";

        // Mengambil dan menampilkan setiap baris data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['order_id']}</td>
                    <td>{$row['customer_name']}</td>
                    <td>{$row['product_name']}</td>
                    <td>{$row['quantity']}</td>
                    <td>{$row['price_per_item']}</td>
                    <td>{$row['total_price']}</td>
                    <td>{$row['order_date']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <a href='edit.php?order_id={$row['order_id']}' class='btn-edit'>Edit</a>
                        <form method='POST' style='display:inline;'>
                            <input type='hidden' name='order_id' value='{$row['order_id']}'>
                            <input type='submit' name='delete' class='btn-hapus' value='Hapus' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\");'>
                        </form>
                    </td>
                  </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "Tidak ada data penjualan.";
    }

    // Tutup koneksi
    $conn->close();
    ?>

</body>
</html>
