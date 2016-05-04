<?php

require_once('./src/connection.php');

if (!isset($_SESSION['userId'])):
    echo '<div class="errorInfo"></div>';
else:

    $today = date("Y-m-d");
    $tomorrow = date("Y-m-d", time() + 86400);
    $userId = $_SESSION['userId'];

    ?>
    <div class="content">
        <div id="notesForToday">
            <? foreach (Note::LoadNotesByDate($userId, $today) as $note): ?>
                <div class="note" >
                    <div class="noteTitle">
                        <? echo $note->getTitle(); ?>
                    </div>

                    <div class="noteDescription" style="background-color:<? echo $note->getColor(); ?>; ">
                        <? echo $note->getDescription(); ?>
                    </div>
                </div>
                <? endforeach; ?>
        </div>

        <div id="notesForTomorrow">
            <? foreach (Note::LoadNotesByDate($userId, $tomorrow) as $note): ?>
                <div class="note">
                    <div class="noteTitle">
                        <? echo $note->getTitle(); ?>
                    </div>

                    <div class="noteDescription">
                        <? echo $note->getDescription(); ?>
                    </div>
                </div>
                <? endforeach; ?>
        </div>
    </div>
    <?php
endif;

require_once('./src/footer.php');