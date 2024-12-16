<?php
// Data dummy untuk tabel penjualan
$salesData = [
    ["id" => 1, "customer" => "Aldi Prastyo", "product" => "Laptop", "quantity" => 1, "price" => 1000, "total" => 1000, "date" => "2024-10-01 10:00:00", "status" => "Completed"],
    ["id" => 2, "customer" => "Agung Muhammad", "product" => "Smartphone", "quantity" => 2, "price" => 500, "total" => 1000, "date" => "2024-10-02 12:30:00", "status" => "Completed"],
    ["id" => 3, "customer" => "Steven Ipul", "product" => "Headphones", "quantity" => 5, "price" => 50, "total" => 250, "date" => "2024-10-03 09:15:00", "status" => "Pending"],
];

// Fungsi untuk menampilkan halaman
function renderPage($page) {
    global $salesData;

    switch ($page) {
        case 'home':
            echo "<center><h1>Selamat Datang di Sistem Penjualan</h1></center>";
            echo "<center><p>Kelola data penjualan Anda dengan mudah melalui menu navigasi di atas.</p></center>";
            echo '<div class="info-cards">
                    <div class="card">
                        <h2>Total Penjualan</h2>
                        <p>5 Transaksi</p>
                    </div>
                    <div class="card">
                        <h2>Penjualan Selesai</h2>
                        <p>3 Transaksi</p>
                    </div>
                    <div class="card">
                        <h2>Penjualan Pending</h2>
                        <p>1 Transaksi</p>
                    </div>
                  </div>';
            break;

        case 'penjualan':
            echo "<h1>Data Penjualan</h1>";
            echo '<a href="?page=tambah_penjualan" class="btn btn-add">Tambah Penjualan</a>';
            echo '<table class="table">';
            echo '<thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price per Item</th>
                        <th>Total Price</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                  </thead><tbody>';
            foreach ($salesData as $data) {
                echo "<tr>
                        <td>{$data['id']}</td>
                        <td>{$data['customer']}</td>
                        <td>{$data['product']}</td>
                        <td>{$data['quantity']}</td>
                        <td>{$data['price']}</td>
                        <td>{$data['total']}</td>
                        <td>{$data['date']}</td>
                        <td>{$data['status']}</td>
                      </tr>";
            }
            echo '</tbody></table>';
            break;

        case 'tambah_penjualan':
            echo "<h1>Tambah Penjualan</h1>";
            echo '<form class="form" action="?page=penjualan" method="post">
                    <label for="customer">Nama Customer:</label>
                    <input type="text" id="customer" name="customer" required>

                    <label for="product">Nama Produk:</label>
                    <input type="text" id="product" name="product" required>

                    <label for="quantity">Jumlah:</label>
                    <input type="number" id="quantity" name="quantity" required>

                    <label for="price">Harga per Item:</label>
                    <input type="number" id="price" name="price" required>

                    <button type="submit" class="btn btn-submit">Tambah</button>
                  </form>';
            break;

        default:
            echo "<h1>404 - Halaman Tidak Ditemukan</h1>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #fdfbfb, #ebedee);
            color: #333;
        }
        header {
            background: grey;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: center;
            background: black;
            padding: 10px 0;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-size: 1.1em;
            padding: 5px 10px;
            border-radius: 5px;
        }
        nav a:hover {
            background: #007bff;
        }
        .container {
            padding: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .table th {
            background: #f4f4f4;
        }
        .btn {
            padding: 10px 15px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-add {
            background: #28a745;
        }
        .btn-submit {
            background: #007bff;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .info-cards {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1;
            margin: 0 10px;
            text-align: center;
        }
        .card h2 {
            margin: 0 0 10px;
        }
        .form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        .form label {
            display: block;
            margin: 10px 0 5px;
        }
        .form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form button {
            width: 100%;
            padding: 10px;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <header>
        <h1>Dashboard Penjualan</h1>
    </header>
    <nav>
        <a href="?page=home">Home</a>
        <a href="?page=penjualan">Data Penjualan</a>
        <a href="?page=tambah_penjualan">Tambah Penjualan</a>
    </nav>
    <div class="container">
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        renderPage($page);
        ?>
    </div>
</body>
</html>
