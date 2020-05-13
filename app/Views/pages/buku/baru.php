<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <link rel="stylesheet" href="/assets/styles/user.css">
</head>
<body>
    <header>
        <?php require __DIR__ . '/../templates/fixed-topnav.php'; ?>
    </header>
    <main>
        <div class="user-form-edit mb-3">
            <form action="" enctype="multipart/form-data" method="post">
                <h1>Ubah Profil</h1>
                <div class="input-group">
                    <p class="input-label">Cover</p>
                    <!-- TODO: ubah src, bikin controller utk get cover buku -->
                    <img src="/photo/profile" alt="" class="user-photo-profile mb-1"> 
                    <input type="file" name="foto" id="">
                    <p class="input-label">ISBN</p>
                    <input type="text" name="isbn" id="" required autofocus>
                    <p class="input-label">Judul</p>
                    <input type="text" name="judul" id="" required>
                    <p class="input-label">Tahun Terbit</p>
                    <input type="text" name="tahun_terbit" id="">
                    <p class="input-label">Penulis</p>
                    <input type="text" name="penulis" id="">
                    <p class="input-label">Penerbit</p>
                    <input type="text" name="penerbit" id="">
                    <p class="input-label">Sinopsis</p>
                    <textarea name="sinopsis" id="" cols="30" rows="10"></textarea>
                    <p class="input-label">Cetakan</p>
                    <input type="text" name="cetakan" id="">
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