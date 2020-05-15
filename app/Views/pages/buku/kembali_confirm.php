<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pengembalian Buku</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <link rel="stylesheet" href="/assets/styles/buku.css">
</head>
<body>
    <header>
        <?php require __DIR__ . '/../templates/fixed-topnav.php'; ?>
    </header>
    <main>
        <?php print_r($data); ?>
        <div class="book-form mb-3">
            <h1>Konfirmasi Pengembalian Buku</h1>
            <div class="book-pinjam-grid">
                <img src="/buku/cover/<?=$transaksi['id_buku'] ?>" alt="" class="book-cover mb-1"> 
                <div class="book-detail">
                    <table>
                        <tr>
                            <td>Judul</td>
                            <td>:</td>
                            <td><?=$transaksi['judul'] ?></td>
                        </tr>
                        <tr>
                            <td>ISBN</td>
                            <td>:</td>
                            <td><?=$transaksi['isbn'] ?></td>
                        </tr>
                        <tr>
                            <td>Dipinjam oleh</td>
                            <td>:</td>
                            <td><?=$transaksi['nama'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="book-pinjam-form">
                    <form action="/buku/kembali/<?=$transaksi['id_transaksi'] ?>" method="post">
                        <div class="input-group">
                            <p class="input-label">Tanggal Peminjaman</p>
                            <input type="date" name="" id="" value="<?=$transaksi['tanggal'] ?>" readonly>
                            <p class="input-label">Tanggal Pengembalian</p>
                            <input type="date" name="pengembalian_date" id="" value="<?php echo date('Y-m-d'); ?>" required>
                            <button type="submit" class="btn btn-primary">Kembalikan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php require __DIR__ . '/../templates/footer.php'; ?>
    </footer>
</body>
</html>