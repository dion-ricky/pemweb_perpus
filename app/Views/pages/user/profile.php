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
                <h1>Ubah Profil</h1>
                <div class="input-group">
                    <p class="input-label">Foto</p>
                    <img src="/photo/profile" alt="" class="user-photo-profile mb-1">
                    <input type="file" name="foto" id="">
                    <p class="input-label">Nomor Anggota</p>
                    <input type="text" name="" id="" value="<?=$user['nomor_anggota']?>" readonly>
                    <p class="input-label">Nama</p>
                    <input type="text" name="nama" id="" value="<?=$user['nama'] ?>" autofocus required>
                    <p class="input-label">Email</p>
                    <input type="email" name="email" id="" value="<?=$user['email']?>" required>
                    <p class="input-label">Password</p>
                    <div class="flex">
                        <input type="password" name="" id="" value="thisisnotyourpassword" readonly style="flex-grow: 1; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                        <button type="reset" class="btn btn-danger" style="margin-top: 0; border-top-left-radius: 0; border-bottom-left-radius: 0;" onclick="window.location = '/user/profile/changepass';">Ubah Password</button>
                    </div>
                    <p class="input-label">Status</p>
                    <input type="text" name="" id="" value="<?php echo $user['status'] == 1 ? 'Aktif' : 'Blokir'; ?>" readonly>
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