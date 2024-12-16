<?php
// Konfigurasi koneksi database
$host = 'localhost'; // Ganti dengan host database Anda jika perlu
$db_name = 'tabel laptop'; // Nama database
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $db_name);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data untuk diedit
$order_id = $_GET['order_id'];
$sql = "SELECT * FROM sales WHERE order_id = $order_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Proses update data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_name = $_POST['customer_name'];
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price_per_item = $_POST['price_per_item'];
    $total_price = $quantity * $price_per_item;
    $order_date = $_POST['order_date'];
    $status = $_POST['status'];

    $sql = "UPDATE sales SET customer_name='$customer_name', product_name='$product_name', quantity=$quantity, 
            price_per_item=$price_per_item, total_price=$total_price, order_date='$order_date', status='$status' 
            WHERE order_id=$order_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Ganti dengan nama file utama Anda
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penjualan</title>
    <style>
        body {  
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            margin-top: 10px;
            display: block;
        }
        input[type="text"], input[type="number"], input[type="date"], select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff; /* Warna Biru */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3; /* Warna Biru Gelap */
        }
        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: white;
            background-color: #28a745; /* Warna Hijau */
            padding: 10px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #218838; /* Warna Hijau Gelap */
        }
    </style>
</head>
<body>
    <h2>Edit Penjualan</h2>
    <form method="POST">
        <label>Nama Pelanggan:</label>
        <input type="text" name="customer_name" value="<?= $row['customer_name'] ?>" required>
        
        <label>Nama Produk:</label>
        <input type="text" name="product_name" value="<?= $row['product_name'] ?>" required>
        
        <label>Kuantitas:</label>
        <input type="number" name="quantity" value="<?= $row['quantity'] ?>" required>
        
        <label>Harga per Item:</label>
        <input type="number" name="price_per_item" value="<?= $row['price_per_item'] ?>" required>
        
        <label>Tanggal Pemesanan:</label>
        <input type="date" name="order_date" value="<?= $row['order_date'] ?>" required>
        
        <label>Status:</label>
        <select name="status" required>
            <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
            <option value="Completed" <?= $row['status'] == 'Completed' ? 'selected' : '' ?>>Completed</option>
            <option value="Canceled" <?= $row['status'] == 'Canceled' ? 'selected' : '' ?>>Canceled</option>
        </select>
        
        <input type="submit" value="Update">
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
