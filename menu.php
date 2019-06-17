<?php

session_start();

require_once('env.php');
require_once('user.php');

?>

<html>
    <head>
        <title>メニュー</title>
    </head>
    <body>
        <h1>こんにちは <?php print(GetUserName($_SESSION['ID'])); ?> さん </h1>
        <h2><?php print(GetUserName($_SESSION['ID'])); ?> さんのタスク一覧</h2>
        <table border="1">
<?php
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = "select task.title,task.priority,task.progress,status.name from task,status where task.status_id = status.id and task.user_id = " . $_SESSION['ID'];
$res = $conn->query($sql);
print("<tr>");
for ($i=0; $i < $res->field_count; $i++) {
    print("<td>" . ($i != 3 ? $res->fetch_field_direct($i)->name : "Status") . "</td>");
}
print("</tr>");

while ($row = $res->fetch_array()) {
    print("<tr>");
    for ($i=0; $i < $res->field_count; $i++) {
        print("<td>" . $row[$i] . "</td>");
    }
    print("</tr>");
}
?>
        </table>
        <div><a href="all_task.php">タスク一覧</a></div>
        <div><a href="add_task_form.php">タスク追加</a></div>
    </body>
</html>