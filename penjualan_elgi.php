<?php
// Koneksi ke database
$host = 'localhost'; // Ganti dengan host Anda
$db   = 'nama_database'; // Ganti dengan nama database Anda
$user = 'username'; // Ganti dengan username database Anda
$pass = 'password'; // Ganti dengan password database Anda
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Query untuk mengambil data penjualan
$sql = "
    SELECT 
        o.id AS order_id,
        c.name AS customer_name,
        p.name AS product_name,
        od.quantity,
        od.price AS price_per_item,
        (od.quantity * od.price) AS total_price,
        o.order_date,
        o.status
    FROM Orders o
    JOIN OrderDetails od ON o.id = od.order_id
    JOIN Products p ON od.product_id = p.id
    JOIN Customers c ON o.customer_id = c.id
";

// Eksekusi query
$stmt = $pdo->query($sql);

// Tampilkan data dalam tabel HTML
echo "<table border='1'>
        <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price per Item</th>
            <th>Total Price</th>
            <th>Order Date</th>
            <th>Status</th>
        </tr>";

// Mengambil dan menampilkan setiap baris data
while ($row = $stmt->fetch()) {
    echo "<tr>
            <td>{$row['order_id']}</td>
            <td>{$row['customer_name']}</td>
            <td>{$row['product_name']}</td>
            <td>{$row['quantity']}</td>
            <td>{$row['price_per_item']}</td>
            <td>{$row['total_price']}</td>
            <td>{$row['order_date']}</td>
            <td>{$row['status']}</td>
          </tr>";
}

echo "</table>";
?>
