<?php

ob_start();

require_once('./src/connection.php');

if (!isset($_SESSION['userId'])) {
    header('Location: login.php');
}
?>

<div class="content">

</div>

<?php

require_once('./src/footer.php');

ob_end_flush();
