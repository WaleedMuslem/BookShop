<?php guest_only(); ?>

<?php
    $errors = [];
    $name = "";
    $email = "";

    if (is_post()) {
        
        $name = $_POST['name'];
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($name == null) {
            $errors['name'][] = 'Name is required';
        } else {
            if(!is_string($name)){
                $errors['name'][] = 'Name must be a string';
            }
            if (strlen($name) < 2) {
                $errors['name'][] = 'Name must be at least 2 characters long';
            }
            if (strlen($name) > 255) {
                $errors['name'][] = "The Name must be less then 255 characters long";
            }
        }

        if ($email == null) {
            $errors['email'][] = "Email is required";
        }else{
            if(isUnique($email)){
                $errors['email'][] = "Email already exists";
            }
        }
        

        if ($password == null) {
            $errors['password'][] = "password is required";
        } else {
            if (strlen($password) < 5) {
                $errors['password'][] = "The Password must be at least 5 long";
            }
            if ($password != $confirm_password) {
                $errors['password'][] = "The Password do not match with the confirm password";
            }
        }

        
        if (!count($errors)) {
            $passwordi = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $db->prepare("INSERT INTO users (email, password, name) VALUES (:email, :password, :name)");

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $passwordi);
            $stmt->bindParam(':name', $name);

            try {
                $stmt->execute();

                redirect('login');
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        
    }


?>
<?php include_once './views/_header.php'; ?>

<div class="page page-login">
    <h1 class="singin-h1">Register</h1>
    <hr class="line-style">
    <hr class="line-style2">
    <form class="card login-form" action="<?= page_url('register') ?>" method="POST">
        <?php if (count($errors)) : ?>
            <div class="alert alert-error">
                <?php foreach ($errors as $error) : ?>
                    <p><?= implode(", ", $error);; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <div class="form-group<?php echo isset($errors['name']) ? ' has-error' : ''; ?>">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>">
            <?php if (isset($errors['name'])) : ?>
                <p class="validation-error">
                    <?php echo $errors['name'][0]; ?>
                </p>
            <?php endif; ?>
        </div>
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
        <div class="form-group<?php echo isset($errors['confirm_password']) ? ' has-error' : ''; ?>">
            <label for="confirm_password">Confirm Password</label>
            <input class="form-control" type="password" name="confirm_password" value="">
            <?php if (isset($errors['confirm_password'])) : ?>
                <p class="validation-error">
                    <?php echo $errors['confirm_password'][0]; ?>
                </p>
            <?php endif; ?>
        </div>
        <div class="btn-link">
            <button class="btn" type="submit">Register</button>
            <a href="<?= page_url('login'); ?>">Already have an account?</a>
        </div>
    </form>
</div>

<?php include_once './views/_footer.php'; ?>