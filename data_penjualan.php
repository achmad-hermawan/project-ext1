<?php
// Data penjualan (biasanya diambil dari database, tetapi untuk contoh ini kita definisikan secara manual)
$sales_data = [
    [
        'order_id' => 1,
        'customer_name' => 'Aldi Prastyo',
        'product_name' => 'Laptop',
        'quantity' => 1,
        'price_per_item' => 1000.00,
        'total_price' => 1000.00,
        'order_date' => '2024-10-01 10:00:00',
        'status' => 'Completed',
    ],
    [
        'order_id' => 2,
        'customer_name' => 'Agung Muhammad',
        'product_name' => 'Smartphone',
        'quantity' => 2,
        'price_per_item' => 500.00,
        'total_price' => 1000.00,
        'order_date' => '2024-10-02 12:30:00',
        'status' => 'Completed',
    ],
    [
        'order_id' => 3,
        'customer_name' => 'Steven Ipul',
        'product_name' => 'Headphones',
        'quantity' => 5,
        'price_per_item' => 50.00,
        'total_price' => 250.00,
        'order_date' => '2024-10-03 09:15:00',
        'status' => 'Pending',
    ],
    [
        'order_id' => 4,
        'customer_name' => 'Yanto Gareng',
        'product_name' => 'Tablet',
        'quantity' => 3,
        'price_per_item' => 300.00,
        'total_price' => 900.00,
        'order_date' => '2024-10-04 14:20:00',
        'status' => 'Completed',
    ],
    [
        'order_id' => 5,
        'customer_name' => 'Achmad Zaenudin',
        'product_name' => 'Monitor',
        'quantity' => 1,
        'price_per_item' => 200.00,
        'total_price' => 200.00,
        'order_date' => '2024-10-05 16:00:00',
        'status' => 'Canceled',
    ],
];

// Tampilkan data dalam tabel HTML
echo "<table border='1' style='border-collapse: collapse; width: 100%;'>
        <thead>
            <tr>
                <th style='padding: 8px; text-align: left;'>Order ID</th>
                <th style='padding: 8px; text-align: left;'>Customer Name</th>
                <th style='padding: 8px; text-align: left;'>Product Name</th>
                <th style='padding: 8px; text-align: left;'>Quantity</th>
                <th style='padding: 8px; text-align: left;'>Price per Item</th>
                <th style='padding: 8px; text-align: left;'>Total Price</th>
                <th style='padding: 8px; text-align: left;'>Order Date</th>
                <th style='padding: 8px; text-align: left;'>Status</th>
            </tr>
        </thead>
        <tbody>";

// Mengambil dan menampilkan setiap baris data
foreach ($sales_data as $row) {
    echo "<tr>
            <td style='padding: 8px;'>{$row['order_id']}</td>
            <td style='padding: 8px;'>{$row['customer_name']}</td>
            <td style='padding: 8px;'>{$row['product_name']}</td>
            <td style='padding: 8px;'>{$row['quantity']}</td>
            <td style='padding: 8px;'>{$row['price_per_item']}</td>
            <td style='padding: 8px;'>{$row['total_price']}</td>
            <td style='padding: 8px;'>{$row['order_date']}</td>
            <td style='padding: 8px;'>{$row['status']}</td>
          </tr>";
}

echo "</tbody></table>";
?>
