<?php require_once '../inc/config.php'; ?>
<?php
if(is_admin_login()){
    redirect("index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login to admin panel</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="shortcut icon" href="../images/ws-fav.png" type="image/x-icon">
</head>
<body>
<main>
    <div id="login-page">
        <h1>Login to admin panel</h1>
        <?php
        if ($error) {
            ?>
            <div class="error-message"><?php echo $error ?></div>
            <?php
        }
        ?>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Login" name="admin-login">
        </form>
    </div>
</main>
</body>
</html>