<?php

require_once('env.php');
require_once('head.php');
require_once('check_user.php');
CheckUser(false);

?>

<html>
    <head>
        <?php CreateHead('タスク追加'); ?>
    </head>
    <body>
        <?php require_once('header.php') ?>
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-8 is-offset-2">
                        <div class="box">
                            <h1 class="title is-3">タスク追加</h1>
                            <form class="content" action="add_task.php" method="POST">
                                <div class="field">
                                    <label class="label">タイトル</label>
                                    <div class="control">
                                        <input class="input" type="text" name="title">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">進捗</label>
                                    <div class="control">
                                        <input class="input" type="number" name="progress">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">優先度</label>
                                    <div class="control">
                                        <input class="input" type="number" name="priority">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">締め切り</label>
                                    <div class="control">
                                        <input class="input" type="date" name="deadline">
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">ユーザ</label>
                                    <div class="control">
                                        <div class="select"><select name="user_id">
<?php
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = 'select * from user where user_type="GUEST"';
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    print('<option value="' . $row['id'] . '">' . $row['name'] . '</option>');
}
$conn->close();
?>
                                        </select></div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Status</label>
                                    <div class="control">
                                        <div class="select"><select name="status_id">
<?php
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = 'select * from status';
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    print('<option value="' . $row['id'] . '">' . $row['name'] . '</option>');
}
$conn->close();
?>
                                        </select></div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">詳細</label>
                                    <div class="control">
                                        <textarea class="textarea" name="detail"></textarea>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <input class="button is-link" type="submit" value="追加">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </body>
</html>