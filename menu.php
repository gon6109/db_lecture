<?php

require_once('check_user.php');
CheckUser(false);

require_once('env.php');
require_once('user.php');
require_once('head.php');

$status = NULL;
$words = [];
if (array_key_exists('status', $_GET)) {
    $status = $_GET['status'];
}
if (array_key_exists('word', $_GET)) {
    $words = preg_split("/[\s]+/", $_GET['word']);
}

?>

<html>
    <head>
        <?php CreateHead('進捗ありますか'); ?>
        <!-- choose a theme file -->
        <link rel="stylesheet" href="tablesorter/css/theme.blue.css">
        <!-- load jQuery and tablesorter scripts -->
        <script type="text/javascript" src="jquery-3.4.1.js"></script>
        <script type="text/javascript" src="tablesorter/js/jquery.tablesorter.js"></script>

        <!-- tablesorter widgets (optional) -->
        <script type="text/javascript" src="tablesorter/js/jquery.tablesorter.widgets.js"></script>
        <script type="text/javascript">
$(function() {
    $("#task").tablesorter();
});
        </script>
    </head>
    <body>
        <?php require_once('header.php'); ?>
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-8 is-offset-2">
                        <div class="box">
                            <div class="level">
                                <div class="level-left">
                                    <h1 class="title is-3">タスク</h1>
                                </div>
                                <div class="level-right">
                                    <a href="add_task_form.php">
                                        <span class="icon is-large has-text-success">
                                            <i class="fas fa-plus-circle fa-3x"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <form action="menu.php" method="GET" class="content">
                                <div class="field">
                                    <label class="label">Status</label>
                                    <div class="control"><div class="select"><select name="status">
<?php
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = 'select * from status';
$res = $conn->query($sql);
print('<option value="" selected>未選択</option>');
while ($row = $res->fetch_assoc()) {
    print('<option value="' . $row['id'] .'">' . $row['name'] . '</option>');
}
$conn->close();
?>
                                    </select></div></div>
                                </div>

                                <div class="field">
                                    <label class="label">Words</label>
                                    <div class="control"><input type="text" placeholder="自由ワード検索 スペースでand検索" name="word" class="input"></div>
                                </div>

                                <div class="field">
                                    <div class="control"><button class="button is-primary">検索</button></div>
                                </div>
                            </form>
                            <div class="content"><table id="task" class="table is-striped is-fullwidth"><form>
<?php

function GetSQL($status, $words)
{
    $res = "select task.id,task.title,task.deadline,task.priority,task.progress,status.name,user.name from task,status,user where task.status_id = status.id and task.user_id = user.id";
    if ($status != NULL) {
        $res .= " and task.status_id = " . $status;
    }
    foreach ($words as $item) {
        $res .= ' and (task.title like "%' . $item . '%" or task.detail like "%' . $item . '%" or user.name like "%' . $item . '%")';
    }
    return $res;
}

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = GetSQL($status, $words);
console_log($sql);
$res = $conn->query($sql);
print("<thead><tr>");
for ($i=0; $i < $res->field_count; $i++) {
    if ($i == 5)
        print("<td>Status</td>");
    else if ($i == 6)
        print("<td>User</td>");
    else
        print("<td>" . $res->fetch_field_direct($i)->name . "</td>");
}
print("<td>削除</td>");
print("</tr></thead>");
print("<tbody>");
while ($row = $res->fetch_array()) {
    print("<tr>");
    for ($i=0; $i < $res->field_count; $i++) {
        if ($i == 1) {
            print('<td><a href="detail_task.php?id='. $row[0] . '">' . $row[$i] . "</a></td>");
        }
        else
            print("<td>" . $row[$i] . "</td>");
    }
    print('<td><button formaction="delete_task.php" formmethod="POST" name="id" value="' . $row[0] . '" class="button is-danger">削除</button></td>');
    print("</tr>");
}
print("</tbody>");
?>
                            </form></table></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>