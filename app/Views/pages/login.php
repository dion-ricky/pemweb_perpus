<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <link rel="stylesheet" href="/assets/styles/login.css">
    <script src="/assets/scripts/main.js" defer></script>
</head>
<body class="child-v-center full-height">
    <div class="h-center max-width-medium">
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
        <div class="flex card login-card">
            <div class="login-img child-v-center">
                <img src="/assets/images/fingerprint_swrc.svg" alt="" srcset="" style="max-width: 250px">
            </div>
            <div class="v-divider ml-1 mr-1"></div>
            <div class="login-form">
                <form action="?r=/" method="post">
                    <h1 style="margin-top: 0">Please authenticate<br>yourself</h1>
                    <div class="input-group">
                        <p class="input-label">Email</p>
                        <input type="email" name="email" id="" style="min-width: 400px" required autofocus>
                        <p class="input-label">Password</p>
                        <input type="password" name="password" id="" style="min-width: 400px" required>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <span class="text-muted">
                            Didn't have an account? <a href="/auth/register">Sign up now!</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>