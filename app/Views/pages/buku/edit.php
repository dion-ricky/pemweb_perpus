<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
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
            <form action="" enctype="multipart/form-data" method="post">
                <h1>Edit Buku</h1>
                <div class="input-group">
                    <p class="input-label">Cover</p>
                    <img src="/buku/cover/<?=$buku['id_buku'] ?>" alt="" class="book-nocover mb-1"> 
                    <input type="file" name="cover" id="">
                    <p class="input-label">ISBN</p>
                    <input type="text" name="isbn" id="" value="<?=$buku['isbn'] ?>" required>
                    <p class="input-label">Judul</p>
                    <input type="text" name="judul" id="" value="<?=$buku['judul'] ?>" required>
                    <p class="input-label">Tahun Terbit</p>
                    <input type="text" name="tahun_terbit" value="<?=$buku['tahun_terbit'] ?>" id="">
                    <p class="input-label">Penulis</p>
                    <input type="text" name="penulis" value="<?=$buku['penulis'] ?>" id="">
                    <p class="input-label">Penerbit</p>
                    <input type="text" name="penerbit" value="<?=$buku['penerbit'] ?>" id="">
                    <p class="input-label">Sinopsis</p>
                    <textarea name="sinopsis" id="" rows="3" spellcheck="false" style="resize: vertical"><?=$buku['sinopsis'] ?></textarea>
                    <p class="input-label">Cetakan</p>
                    <input type="text" name="cetakan" id="" value="<?=$buku['cetakan'] ?>">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <?php require __DIR__ . '/../templates/footer.php'; ?>
    </footer>
</body>
</html>