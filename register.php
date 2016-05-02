<?php
ob_start();
require_once('./src/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = User::RegisterUser($_POST['userName'], $_POST['email1'], $_POST['email2'], $_POST['email1'], $_POST['email2']);
    if($user !== false){
        $_SESSION['userId'] = $user->getId();
        header('Location: index.php');
    }
    else{
        echo '<h1 class="errorInfo">Incorrect data, <small class="errorInfo">please try again</small></h1>';
    }
}
ob_end_flush();
?>

<form class="formRegister" action="register.php" method="POST">
    <div class="form-group">
        <label for="username">
            <input type="text" class="form-control" id="username" placeholder="Username" name="userName">
        </label>
    </div>

    <div class="form-group">
        <label for="email1">
            <input type="email"  class="form-control" id="email1" placeholder="E-mail Address" name="email1">
        </label>
    </div>

    <div class="form-group">
        <label for="email2">
            <input type="email" class="form-control" id="email2" placeholder="Confirm E-mail Address" name="email2">
        </label>
    </div>

    <div class="form-group">
        <label for="password1">
            <input type="password" class="form-control" id="password1" placeholder="Password" name="password1">
        </label>
    </div>

    <div class="form-group">
        <label for="password2">
            <input type="password" class="form-control" id="password2" placeholder="Confirm Password" name="password2">
        </label>
    </div>

    <input type="submit" class="btn btn-default" value="Create Account">
</form>