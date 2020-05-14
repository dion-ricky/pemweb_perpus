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
        <?php //print_r($list_buku); ?>
        <div class="book-form mb-3">
            <h1>Pengembalian Buku</h1>
            <form action="" method="get">
                <div class="input-group">
                    <p class="input-label">Email</p>
                    <div class="flex">
                        <input type="email" name="email" id="" value="<?=$email ?>" style="flex-grow: 1; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                        <button type="submit" class="btn btn-primary" style="margin-top: 0; border-top-left-radius: 0; border-bottom-left-radius: 0;">Cari</button>
                    </div>
                </div>
            </form>
            <div class="mt-2">
                <?php
                    if ($list_buku != null) {
                ?>
                <table class="list-buku-dipinjam">
                    <tr>
                        <th>Cover</th>
                        <th>Detail Buku</th>
                        <th>Operasi</th>
                    </tr>
                <?php
                        foreach ($list_buku as $buku) {
                ?>
                    <tr>
                        <td>
                            <img src="/buku/cover/<?php echo $buku['id_buku']; ?>" alt="">
                        </td>
                        <td>
                            <table class="detail-buku">
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
                        </td>
                        <td>
                            <a href="/buku/kembali/confirm/<?=$buku['id_transaksi'] ?>">Kembalikan</a>
                        </td>
                    </tr>
                <?php 
                        }
                ?>
                </table>
                <?php
                    }
                ?>
            </div>
        </div>
    </main>
    <footer>
        <?php require __DIR__ . '/../templates/footer.php'; ?>
    </footer>
</body>
</html>