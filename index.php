<?php

require_once('./src/connection.php');

if (!isset($_SESSION['userId'])):
    ?>
    <h1 class="info">How it works?
        <small class="info">It's simple just add note with title and additional description if u wish.
            <br>Try it now and you will not regret
        </small>
    </h1>
<? else: ?>
    <a href="addNote.php">
        <div class="btn btn-default addNote">Add note</div>
    </a>
    <a href="showNotes.php">
        <div class="btn btn-default addNote">Show notes</div>
    </a>
    <?php

    require_once('./showNotes.php');

endif;

require_once('./src/footer.php');