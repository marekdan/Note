<?php

ob_start();

require_once('./src/connection.php');

if (!isset($_SESSION['userId'])) {
    header('Location: login.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['userId'];
    $note = Note::CreateNote($_POST['noteTitle'], $_POST['noteDescription'], $_POST['noteColor'], $_POST['noteDate'], $userId);
    if ($note !== false) {
        header('Location: index.php');
    }
    else {
        echo '<h1 class="errorInfo">Incorrect data, <small class="errorInfo">please try again</small></h1>';
    }
}

?>

<form class="formRegister" action="addNote.php" method="POST">
    <div class="form-group">
        <label>
            <input type="text" class="form-control" placeholder="Note title" name="noteTitle">
        </label>
    </div>

    <div class="form-group">
        <label>
            <textarea cols="40" rows="5" name="noteDescription"></textarea>
        </label>
    </div>

    <div class="form-group">
        <label>
            <input type="date" class="form-control" name="noteDate">
        </label>
    </div>

    <div class="form-group">
        <label>
            <input type="color" name="noteColor">
        </label>
    </div>

    <input type="submit" class="btn btn-default" value="Add note">
</form>

<?php

require_once('./src/footer.php');

ob_end_flush();
