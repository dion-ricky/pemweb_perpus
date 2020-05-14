<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku - <?=$buku['judul'] ?></title>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <link rel="stylesheet" href="/assets/styles/buku.css">
</head>
<body>
    <header>
        <?php require __DIR__ . '/../templates/fixed-topnav.php'; ?>
    </header>
    <main>
        <div class="mb-3">
            <div class="book-detail-grid">
                <img src="/buku/cover/<?=$buku['id_buku'] ?>" alt="" class="book-cover">
                <div class="v-divider book-detail-divider"></div>
                <div class="book-detail">
                    <h2>Detail Buku</h2>
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
                    <?php if ($buku['status'] == 0 ) { ?>
                    <div class="flex mt-2 book-availability book-available">
                        <span> Buku tersedia!</span>
                        <i class="material-icons ml-05">done</i>
                    </div>
                    <?php } else { ?>
                    <div class="flex mt-2 book-availability book-unavailable">
                        <span> Buku tidak tersedia</span>
                        <i class="material-icons ml-05">close</i>
                    </div>
                    <?php } ?>
                    <button class="btn btn-primary" <?php echo $buku['status'] == 0 ? '' : 'disabled' ?> onclick="window.location = '/buku/pinjam/<?=$buku['id_buku']?>';">Pinjam</button>
                    <?php
                        if ($sub !== null) {
                            if ($sub['level'] == 1) {
                    ?>
                    <button class="btn btn-primary" onclick="window.location = '/buku/ubah/<?=$buku['id_buku']?>'; ">Edit</button>
                    <?php
                            }
                        }
                    ?>
                </div>
                <div class="book-desc">
                    <h2>Sinopsis</h2>
                    <?php
                        echo nl2br($buku['sinopsis']);
                    ?>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php require __DIR__ . '/../templates/footer.php'; ?>
    </footer>
</body>
</html>