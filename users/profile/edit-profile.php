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
    <title>Edit profile<?php echo $user_data['display_name'] ?></title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>

<?php require_once '../../sections/header.php' ?>


<main class="profile" id="editprofile">


    <div class="box" style="padding: 10px;box-sizing: border-box">
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
        <div class="update-profile">
            <form action="edit-profile.php" method="post" enctype="multipart/form-data">
                <input type="text" name="display-name" value="<?php echo $user_data['display_name'] ?>" placeholder="display name..."><br>
                <input type="text" name="user-address" value="<?php echo $user_data['user_address'] ?>" placeholder="Postal address..."><br>
                <input type="text" name="user-number" value="<?php echo $user_data['user_number'] ?>" placeholder="Your phone number..."><br>
                <span class="profile-span">Profile image</span><br>
                <?php if ($user_data['user_image']) { ?>
                    <img src="../../images/profile/<?php echo $user_data['user_image'] ?>" alt="<?php echo $user_data['display_name'] ?>" width="80"><br>
                <?php } else { ?>
                    <img src="../../images/profile/profile.jpg" alt="<?php echo $user_data['display_name'] ?>" width="80"><br>
                <?php } ?>
                
                <input type="file" name="new-user-image"><br>
                <input type="hidden" value="<?php echo $user_data['user_image'] ?>" name="user-image">

                <input type="hidden" name="user-email" value="<?php echo $user_data['email'] ?>">
                <input type="submit" name="update-profile" value="Update profile">
            </form>
        </div>
    </div>

    

</main>

<?php require_once '../../sections/footer.php' ?>

</body>
</html>