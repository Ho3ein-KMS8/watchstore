<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Watch Store</title>
    <link rel="stylesheet" href="<?php echo PATH; ?>styles/styles.css">
    <link rel="shortcut icon" href="<?php echo PATH; ?>images/ws-fav.png" type="image/x-icon">
</head>
<body>

<header>
    <nav>
        <div class="logo-menu">
            <img src="<?php echo PATH ?>images/logo.png" alt="Logo">
            <ul>
                <li><a href="<?php echo PATH; ?>"#home>Home</a></li>
                <li><a href="<?php echo PATH; ?>products.php#products">Products</a></li>
                <li><a href="<?php echo PATH; ?>about.php#about">About</a></li>
                <?php if(!is_login()) { ?>
                    <li><a href="<?php echo PATH; ?>users/login.php#login">Login</a></li>
                    <li><a href="<?php echo PATH; ?>users/register.php#register">Register</a></li>
                <?php } else { ?>
                    <li><a href="<?php echo PATH; ?>users/profile#profile">Profile</a></li>
                    <li><a href="<?php echo PATH; ?>users/profile/?logout=1">Logout</a></li>
                <?php }?>
            </ul>
        </div>
    </nav>
    
    <div class="description1">
		<h1>Watch Store</h1>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab quod laborum omnis, suscipit dolore aliquid voluptatibus earum. Soluta itaque odio vel est perspiciatis ipsam reiciendis nesciunt quae aspernatur consequuntur! Porro.</p>
	</div>
    
</header>