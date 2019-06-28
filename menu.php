<?php

session_start();

require_once('env.php');
require_once('user.php');

$status = NULL;
$words = [];
if (array_key_exists('status', $_GET)) {
    $status = $_GET['status'];
}
if (array_key_exists('word', $_GET)) {
    $words = preg_split("/[\s　]+/", $_GET['word']);
}

?>

<html>
    <head>
        <title>メニュー</title>
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
        <h1>こんにちは <?php print(GetUserName($_SESSION['ID'])); ?> さん </h1>
        <a href="update_user_form.php">ユーザ設定</a>
        <h2>検索</h2>
        <form action="menu.php" method="GET">
            <div>Status<select name="status">
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
            </select></div>
            <div><input type="text" placeholder="自由ワード検索 スペースでand検索" name="word"></div>
            <div><input type="submit" value="検索"></div>
        </form>
        <form><table id="task" class="tablesorter-blue">
<?php

function GetSQL($status, $words)
{
    $res = "select task.id,task.title,task.deadline,task.priority,task.progress,status.name,user.name from task,status,user where task.status_id = status.id and task.user_id = user.id";
    if ($status != NULL) {
        $res .= " and task.status_id = " . $status;
    }
    foreach ($words as $item) {
        $res .= ' and (task.title like "%' . $item . '%" or task.detail like "%' . $item . '%" or user.name = "%' . $item . '%")';
    }
    return $res;
}

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = GetSQL($status, $words);
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
    print('<td><button formaction="delete_task.php" formmethod="POST" name="id" value="' . $row[0] . '">削除</button></td>');
    print("</tr>");
}
print("</tbody>");
?>
        </table></form>
        <div><a href="add_task_form.php">タスク追加</a></div>
    </body>
</html>