<?php

require_once('./src/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = User::RegisterUser($_POST['name'], $_POST['email'], $_POST['email2'], $_POST['password1'], $_POST['password2']);
    if ($user !== false) {
        $_SESSION['userId'] = $user->getId();
        header('Location: index.php');
    }
    else {
        echo '<h1 class="errorInfo">Incorrect data, <small class="errorInfo">please try again</small></h1>';
    }
}

?>

    <form class="formRegister" action="register.php" method="POST">
        <div class="form-group">
            <label>
                <input type="text" class="form-control" placeholder="Username" name="name">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input type="email" class="form-control" placeholder="E-mail" name="email">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input type="email" class="form-control" placeholder="Confirm E-mail" name="email2">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input type="password" class="form-control" placeholder="Password" name="password1">
            </label>
        </div>

        <div class="form-group">
            <label>
                <input type="password" class="form-control" placeholder="Confirm Password" name="password2">
            </label>
        </div>

        <input type="submit" class="btn btn-default" value="Create Account">
    </form>

<? require_once('./src/footer.php');