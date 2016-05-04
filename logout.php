<?php

require_once('./src/connection.php');

unset ($_SESSION['userId']);
header('Location: index.php');

require_once('./src/footer.php');