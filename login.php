<?php
ob_start();
require_once('./src/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = User::logInUser($_POST['email'], $_POST['password']);
    if ($user !== false) {
        $_SESSION['userId'] = $user->getId();
        header('Location: index.php');
    }
    else {
        echo '<h1 class="errorInfo">Incorrect email or password, <small class="errorInfo">please try again</small></h1>';
    }
}
ob_end_flush();
?>

<form class="formRegister" action="login.php" method="POST">
    <div class="form-group">
        <label>
            <input type="email" class="form-control" placeholder="E-mail Address" name="email">
        </label>
    </div>

    <div class="form-group">
        <label>
            <input type="password" class="form-control" placeholder="Password" name="password">
        </label>
    </div>

    <input type="submit" value="Sign In">
</form>