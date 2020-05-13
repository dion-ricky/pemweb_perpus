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
        <?php
            // print_r($data);
            // data['errors']
        ?>
        <div class="user-form-edit mb-3">
            <form action="" method="post">
                <h1>Ubah Password</h1>
                <div class="input-group">
                    <p class="input-label">Current Password</p>
                    <input type="password" name="current-password" id="">
                    <p class="input-label">New Password</p>
                    <input type="password" name="password" id="">
                    <p class="input-label">Confirm New Password</p>
                    <input type="password" name="confirm-passowrd" id="">
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