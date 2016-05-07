<?php

ob_start();

require_once('./src/connection.php');

if (!isset($_SESSION['userId'])) {
    header('Location: login.php');
}

$userId = $_SESSION['userId'];
$currentUser = User::getUserById($userId);
?>
    <div class="content">
        <div class="profile">
            <div class="photoContainer">
                <img class="profilePhoto" src="./img/defaultProfile.jpg">
            </div>
            <div class="profileInfo">
                <? echo $currentUser->getName() ?>
                <div id="changeName" class="btn btn-default editButton visible">change</div>

                <div id="saveName" class="btn btn-default editButton invisible">save</div>
                <div id="cancelName" class="btn btn-default editButton invisible">cancel</div>
                <hr>
                <? echo $currentUser->getEmail() ?>
                <div id="changeEmail" class="btn btn-default editButton visible">Change</div>
                <div id="saveEmail" class="btn btn-default editButton invisible">save</div>
                <div id="cancelEmail" class="btn btn-default editButton invisible">cancel</div>
            </div>
        </div>
    </div>
<?php

require_once('./src/footer.php');

ob_end_flush();