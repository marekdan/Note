<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8"/>
    <title>
        Your notes
    </title>
</head>
<body>
<div class="navbar navbar-default navbar-static-top myNav">
    <a class="navbar-brand" href="index.php">Your notes</a>
    <? if (!isset($_SESSION['userId'])): ?>
        <a role="button" class="btn btn-default pull-right" href="register.php">Register</a>
        <a class="btn btn-default pull-right" href="login.php" role="button">Login</a>
    <? else: ?>
        <a role="button" class="btn btn-default pull-right" href="account.php">Account</a>
        <a class="btn btn-default pull-right" href="logout.php" role="button">Logout</a>
    <? endif; ?>
</div>