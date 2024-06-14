<?php require_once '../inc/config.php';
if (is_login()) {
    redirect('profile');
}
require_once '../sections/header.php';
?>


<main>
    <?php
    if ($message) {
        ?>
        <div class="success-message"><?php echo $message ?></div>
        <?php
    }
    if ($error) {
        ?>
        <div class="error-message"><?php echo $error ?></div>
        <?php
    }
    ?>
    <section class="register-page" id="register">
        <form action="register.php" method="post">
            <div class="contact-form">
                <h1>Register</h1>
                <input required placeholder="Full Name" class="inp" type="name" name="name">
                <input required placeholder="Email" class="inp" type="email" name="email">
                <input required placeholder="Password" class="inp" type="password" name="password" autocomplete="off">
                <input required placeholder="Confirm password" class="inp" type="password" name="password-conf" autocomplete="off">
                <input class="submit-btn" type="submit" name="do-register" value="Create new account">
            </div>
        </form>
        <p class="note">Do you have an account? <a href="login.php#login"> Login</a></p>
    </section>

<?php require_once '../sections/footer.php' ?>


</body>
</html>