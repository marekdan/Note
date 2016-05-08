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

                <form id="changeNameForm" class="changeForm invisible">
                    <label>
                        <input id="newName" type="text" name="name">
                    </label>
                    <input type="hidden" name="actionType" value="nameChange">
                    <input id="saveName" class="btn btn-default editButton" type="submit" value="save">
                </form>
                <div id="cancelName" class="btn btn-default editButton invisible">cancel</div>

                <hr>

                <? echo $currentUser->getEmail() ?>
                <div id="changeEmail" class="btn btn-default editButton visible">change</div>

                <form id="changeEmailForm" class="changeForm invisible" action="account.php" method="POST">
                    <label>
                        <input type="text" name="email">
                    </label>
                    <input type="hidden" name="actionType" value="emailChange">
                    <input id="saveEmail" class="btn btn-default editButton" type="submit" value="save">
                </form>
                <div id="cancelEmail" class="btn btn-default editButton invisible">cancel</div>
            </div>
        </div>
    </div>
<?php

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['actionType'] === 'nameChange') {
    $currentUser->setName($_POST['name']);
    $currentUser->updateName();
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['actionType'] === 'emailChange') {
    $currentUser->setEmail($_POST['email']);
    $currentUser->updateEmail();
}

require_once('./src/footer.php');

ob_end_flush();