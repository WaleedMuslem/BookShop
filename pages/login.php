<?php include_once './views/_header.php'; ?>
<div class="page-page-login">
    <h1 class="singin-h1">Sign in</h1>
    <hr class="line-style">
    <hr class="line-style2">
    <form class="card login-form" action="<?= page_url('login') ?>" method="POST">
        <?php if (count($errors)) : ?>
            <div class="alert alert-error">
                <?php foreach ($errors as $error) : ?>
                    <p><?= $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="form-group<?php echo isset($errors['email']) ? ' has-error' : ''; ?>">
            <label for="email">Email address</label>
            <input class="form-control" type="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
            <?php if (isset($errors['email'])) : ?>
                <p class="validation-error">
                    <?php echo $errors['email'][0]; ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="form-group<?php echo isset($errors['password']) ? ' has-error' : ''; ?>">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" value="">
            <?php if (isset($errors['password'])) : ?>
                <p class="validation-error">
                    <?php echo $errors['password'][0]; ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="btn-link">
            <button class="btn" type="submit">Sign in</button>
            <a href="<?= page_url('register'); ?>">Don’t have an account?</a>
        </div>
        
    </form>
</div>
<?php include_once './views/_footer.php'; ?>