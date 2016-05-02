<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta charset="UTF-8"/>
    <title>
        Note
    </title>
</head>
<div class="navbar navbar-default navbar-static-top myNav">
    <a class="navbar-brand" href="index.php">Your notes</a>
    <?php
    if (!isset($_SESSION['loggedUserId'])):
    ?>
        <a role="button" class="btn btn-default pull-right" href="register.php" role="button">Register</a>
        <a class="btn btn-default pull-right" href="login.php" role="button">Login</a>
    <?php
    else:
    ?>
        <a role="button" class="btn btn-default" href="account.php" role="button">Account</a>
        <a class="btn btn-default" href="logout.php" role="button">Logut</a>
    <?php
    endif;
    ?>
</div>
</html>