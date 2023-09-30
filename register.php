<?php require_once 'process.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PBD - Activity 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background: url(bg1.gif) no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="card shadow mt-5 mx-auto w-25">
        <div class="card-header">
            <h2>Register</h2>
            <p class="mb-0">Register your account.</p>
        </div>
        <div class="card-body">

            <?php

            if (isset($_SESSION['registerMessage'])) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['registerMessage'];
                    unset($_SESSION['registerMessage']);
                    ?>
                </div>
            <?php endif; ?>

            <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="name">Username<span style="color: red;">*</span></label>
                    <input type="text" name="USERNAME" class="form-control" value="<?php echo $username; ?>" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                    <label for="name">Password<span style="color: red;"><span>*</span></label>
                    <input type="password" name="PASSWORD" class="form-control" value="<?php echo $password; ?>" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <label for="name">Confirm Password<span style="color: red;"><span>*</span></label>
                    <input type="password" name="confirmPASSWORD" class="form-control" value="<?php echo $password; ?>" placeholder="Enter Password" required>
                </div>

                <div class="form-group mt-2">
                    <input type="submit" name="register" class="btn btn-primary w-100 mb-2" value="Submit">
                    <input type="reset" class="btn btn-secondary w-100" value="Reset">
                </div>
                <p>Already have an account? <a href="login.php">Login here</a>.</p>
            </form>
        </div>
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>