<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/notesScript.js"></script>
    <meta charset="UTF-8"/>
    <title>
        Your notes
    </title>
</head>
<div class="navbar navbar-default navbar-static-top myNav">
    <a class="navbar-brand" href="index.php">Your notes</a>
    <?php
    ob_start();
    if (!isset($_SESSION['userId'])):
    ?>
        <a role="button" class="btn btn-default pull-right" href="register.php">Register</a>
        <a class="btn btn-default pull-right" href="login.php" role="button">Login</a>
    <?php
    else:
    ?>
        <a role="button" class="btn btn-default pull-right" href="account.php">Account</a>
        <a class="btn btn-default pull-right" href="logout.php" role="button">Logout</a>
    <?php
    endif;
    ob_end_flush();
    ?>
</div>
</html>