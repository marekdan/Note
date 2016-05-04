<?php
ob_start();
require_once('./src/connection.php');

if (!isset($_SESSION['userId'])) {
    header('Location: login.php');
}

$today = date("Y-m-d");
$tomorrow = date("Y-m-d", time() + 86400);
$userId = $_SESSION['userId'];

ob_end_flush();
?>
<div class="content">
    <div id="notesForToday">
        <?php
        foreach (Note::LoadNotesByDate($userId, $today) as $note):
            ?>
            <div class="note">
                <div class="noteTitle">
                    <?php
                    echo $note->getTitle();
                    ?>
                </div>

                <div class="noteDescription" style="background-color:<?php $note->getColor() ?> ">
                    <?php
                    echo $note->getDescription();
                    ?>
                </div>
            </div>
            <?php
        endforeach;
        ?>
    </div>

    <div id="notesForTomorrow">
        <?php
        foreach (Note::LoadNotesByDate($userId, $tomorrow) as $note):
            ?>
            <div class="note">
                <div class="noteTitle">
                    <?php
                    echo $note->getTitle();
                    ?>
                </div>

                <div class="noteDescription">
                    <?php
                    echo $note->getDescription();
                    ?>
                </div>
            </div>
            <?php
        endforeach;
        ?>
    </div>
</div>


<!--<div class="notesTitle" id="todayNotesTitle">
    <h1>Today a</h1>
    <hr>
</div>

<div class="notesTitle" id="tomorrowNotes">
    <h1>Tomorrow a</h1>
    <hr>
</div>

<div class="notes" id="todayNotes">
    <?php
/*    $today = date("Y-m-d");
    $userId = $_SESSION['userId'];
    foreach (Note::LoadNotesByDate($userId, $today) as $note) {
        echo '<h1>' . $note->getTitle() . '</h1>';
    }
    */ ?>
</div>

<div class="notes">
    <?php
/*    $tomorrow = date("Y-m-d", time() + 86400);
    $userId = $_SESSION['userId'];
    foreach (Note::LoadNotesByDate($userId, $tomorrow) as $note) {
        echo '<h1>' . $note->getTitle() . '</h1>';
    }
    */ ?>
</div>-->