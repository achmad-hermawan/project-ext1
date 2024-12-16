<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Sistem Penjualan</title>
</head>
<body>
    <h1>Form Input Sistem Penjualan</h1>


    <h2>Form Input Pelanggan</h2>
    <form action="process_customer.php" method="post">
        <label for="customerName">Nama Pelanggan:</label><br>
        <input type="text" id="customerName" name="customerName" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="phone">Telepon:</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>
        
        <label for="shippingAddress">Alamat Pengiriman:</label><br>
        <input type="text" id="shippingAddress" name="shippingAddress" required><br><br>
        
        <input type="submit" value="Kirim">
    </form>

    <hr>


    <h2>Form Input Produk</h2>
    <form action="process_product.php" method="post">
        <label for="productName">Nama Produk:</label><br>
        <input type="text" id="productName" name="productName" required><br><br>
        
        <label for="category">Kategori:</label><br>
        <input type="text" id="category" name="category" required><br><br>
        
        <label for="price">Harga per Item:</label><br>
        <input type="number" id="price" name="price" required step="0.01"><br><br>
        
        <label for="stock">Stok:</label><br>
        <input type="number" id="stock" name="stock" required><br><br>
        
        <label for="description">Deskripsi:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>
        
        <input type="submit" value="Kirim">
    </form>

    <hr>

   
    <h2>Form Input Pesanan</h2>
    <form action="process_order.php" method="post">
        <label for="customerId">ID Pelanggan:</label><br>
        <input type="text" id="customerId" name="customerId" required><br><br>
        
        <label for="orderDate">Tanggal Pemesanan:</label><br>
        <input type="datetime-local" id="orderDate" name="orderDate" required><br><br>
        
        <h3>Rincian Produk:</h3>
        
        <label for="productId">ID Produk:</label><br>
        <input type="text" id="productId" name="productId" required><br><br>
        
        <label for="quantity">Jumlah:</label><br>
        <input type="number" id="quantity" name="quantity" required><br><br>
        
        <input type="submit" value="Kirim">
    </form>
</body>
</html>
