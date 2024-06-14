<?php require_once '../../inc/config.php'; ?>
<?php
if (!is_login()) {
    redirect('../login.php');
}
$user_data = get_userdata();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello <?php echo $user_data['display_name'] ?></title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>


<?php require_once '../../sections/header.php' ?>


<main id="profile" class="profile">


    <div class="profile-box">
        <div class="profile-info">
            <div class="user-image">
                <?php if ($user_data['user_image']) { ?>
                    <img src="../../images/profile/<?php echo $user_data['user_image'] ?>" alt="<?php echo $user_data['display_name'] ?>">
                <?php } else { ?>
                    <img src="../../images/profile/profile.jpg" alt="Profile">
                <?php } ?>

            </div>
            <div id="sidebar">
                <div class="sidebar-item">
                    <ul>
                        <li><a href="index.php#profile">Profile</a></li>
                        <li><a href="orders.php#orders">Orders</a></li>
                        <li><a href="edit-profile.php#editprofile">Edit</a></li>
                        <li><a href="?logout=1">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="user-info">
                <ul>
                    <li><span style="color: rgb(250, 202, 103);">Name: </span><?php echo $user_data['display_name'] ?></li>
                    <li><span style="color: rgb(250, 202, 103);">Email: </span><?php echo $user_data['email'] ?></li>
                    <li><span style="color: rgb(250, 202, 103);">Address: </span>

                        <?php
                        if ($user_data['user_address']) {
                            echo $user_data['user_address'];
                        } else {
                            echo "<span style='color: rgb(250, 202, 103);'>Enter your address from edit option.</span>";
                        } ?>

                    </li>
                    <li><span style="color: rgb(250, 202, 103);">Phone number: </span>

                        <?php
                        if ($user_data['user_number']) {
                            echo $user_data['user_number'];
                        } else {
                            echo "<span style='color: rgb(250, 202, 103);'>Enter your phone number from edit option.</span>";
                        } ?>

                    </li>
                </ul>
                <a href="edit-profile.php#editprofile" style="color: #fff; padding: 1vh 2vw; ">Edit profile</a>
            </div>
        </div>
    </div>


</main>

<?php require_once '../../sections/footer.php'  ?>

</body>
</html>