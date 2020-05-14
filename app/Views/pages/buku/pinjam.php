<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <link rel="stylesheet" href="/assets/styles/buku.css">
</head>
<body>
    <header>
        <?php require __DIR__ . '/../templates/fixed-topnav.php'; ?>
    </header>
    <main>
        <div class="book-form mb-3">
            <?php
                if ($errors != null) {
            ?>
            
            <div class="notify notify-error">
                <span class="notify-message"><?=$errors['message'] ?></span>
                <span class="notify-code"><?=$errors['code'] ?></span>
            </div>
            
            <?php
                }
            ?>

            <?php
                if ($success != null) {
            ?>

            <div class="notify notify-success">
                <span class="notify-message"><?=$success['message'] ?></span>
            </div>
            
            <?php
                }
            ?>
            <h1>Pinjam Buku</h1>
            <div class="book-pinjam-grid">
                <img src="/buku/cover/<?=$buku['id_buku'] ?>" alt="" class="book-cover mb-1"> 
                <div class="book-detail">
                    <table>
                        <tr>
                            <td>Judul</td>
                            <td>:</td>
                            <td><?=$buku['judul'] ?></td>
                        </tr>
                        <tr>
                            <td>Penulis</td>
                            <td>:</td>
                            <td><?=$buku['penulis'] ?></td>
                        </tr>
                        <tr>
                            <td>ISBN</td>
                            <td>:</td>
                            <td><?=$buku['isbn'] ?></td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td>:</td>
                            <td><?=$buku['penerbit'] ?></td>
                        </tr>
                        <tr>
                            <td>Tahun Terbit</td>
                            <td>:</td>
                            <td><?=$buku['tahun_terbit'] ?></td>
                        </tr>
                        <tr>
                            <td>Cetakan ke</td>
                            <td>:</td>
                            <td><?=$buku['cetakan'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="book-pinjam-form">
                    <form action="" method="post">
                        <div class="input-group">
                            <p class="input-label">Tanggal Peminjaman</p>
                            <input type="date" name="peminjaman_date" id="" value="<?php echo date('Y-m-d'); ?>" readonly>
                            <button type="submit" class="btn btn-primary">Pinjam</button>
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