<?php

ob_start();

require_once('./src/connection.php');

unset ($_SESSION['userId']);
header('Location: index.php');

ob_end_flush();