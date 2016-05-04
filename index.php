<?php
require_once('./src/connection.php');
?>

<h1 class="info">How it works?
    <small class="info">It's simple just add note with title and additional description if u wish</small>
</h1>

<a href="addNote.php"><div class="btn btn-default addNote">Add note</div></a>
<a href="showNotes.php"><div class="btn btn-default addNote">Shownotes</div></a>

<?php
require_once('./showNotes.php');
?>