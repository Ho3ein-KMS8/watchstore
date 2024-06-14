<?php require_once '../inc/config.php';
if (is_login()) {
    redirect('profile');
}
require_once '../sections/header.php';
?>

<main id="login">
    <?php
    if ($message) {
        ?>
        <div style="color: white" class="success-message"><?php echo $message ?></div>
        <?php
    }
    if ($error) {
        ?>
        <div style="color: white" class="error-message"><?php echo $error ?></div>
        <?php
    }
    ?>
    <section class="login-page">
        <form action="login.php" method="post">
            <div class="contact-form">
                <h1>Login</h1>
                <input required placeholder="Email" class="inp" type="email" name="email">
                <input required placeholder="Password" class="inp" type="password" name="password">               
                <input type="submit" class="submit-btn" name="do-login" value="Login">
            </div>
        </form>
        <p class="note">Do you have an account? <a href="register.php#register">Create one</a></p>
        <p class="note"><a href="#">forgot my password</a></p>
    </section>
</main>

<?php require_once '../sections/footer.php' ?>
</body>
</html>