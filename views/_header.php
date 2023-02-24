<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WaleedShop</title>

    <link rel="stylesheet" href="<?= asset('css/app.css'); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= asset("img/icons/online-library.png"); ?>">

</head>
<body>
    <header>
        <div class="container-nav">
            <nav>
                <a href="<?= page_url('home'); ?>"><img class="favicon" src="<?= asset("img/icons/online-library.png"); ?>" alt="home"></a>
                <a class="header-links" href="<?= page_url('home'); ?>">Home</a>
                <?php if (user_logged_in()) : ?>
                    <a class="header-links" href="<?= page_url('upload'); ?>">Upload</a>
                    <a class="header-links" href="<?= page_url('mybooks'); ?>">My Books</a>
                    <a class="header-links" href="<?= page_url('logout'); ?>">Sign out</a>
                    <a class="user-welcome" href="<?= page_url('logout'); ?>">
    
                    <?php if (user_logged_in()) : ?>
                        <?= current_user()->name; ?>
                    <?php endif; ?>
                    <a  href="<?= page_url('home'); ?>"><img class="profile-logo" src="<?= asset("img/icons/user.png"); ?>" alt="profile"></a>

                    <?php else : ?>
                    <a class="header-links" href="<?= page_url('register'); ?>">Register</a>
                    <a class="header-links" href="<?= page_url('login'); ?>">Sign in</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main class="container">
