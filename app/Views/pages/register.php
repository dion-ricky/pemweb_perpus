<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <link rel="stylesheet" href="/assets/styles/login.css">
    <script src="/assets/scripts/main.js" defer></script>
</head>
<body class="child-v-center full-height">
    <div class="h-center max-width-medium">
        <div class="flex card login-card">
            <div class="login-img child-v-center">
                <img src="/assets/images/forms_78yw.svg" alt="" srcset="" style="max-width: 250px">
            </div>
            <div class="v-divider ml-1 mr-1"></div>
            <div class="login-form">
                <form action="auth/register" method="post">
                    <h1 style="margin-top: 0">Please fill in the forms</h1>
                    <div class="input-group">
                        <p class="input-label">Nama</p>
                        <input type="text" name="nama" id="" required autofocus>
                        <p class="input-label">Email</p>
                        <input type="email" name="email" id="" style="min-width: 400px" required>
                        <p class="input-label">Password</p>
                        <input type="password" name="password" id="" style="min-width: 400px" required>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                        <span class="text-muted">
                            Already have an account? <a href="/login">Sign in</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>