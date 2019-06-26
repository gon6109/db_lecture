<?php

session_start();

require_once('env.php');
require_once('user.php');

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
        <form action="menu.php" method="GET">
            <select name="option"></select>
        </form>
        <table id="task" class="tablesorter-blue">
<?php
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn->set_charset("utf8");
$sql = "select task.title,task.deadline,task.priority,task.progress,status.name,user.name from task,status,user where task.status_id = status.id and task.user_id = user.id";
$res = $conn->query($sql);
print("<thead><tr>");
for ($i=0; $i < $res->field_count; $i++) {
    if ($i == 4)
        print("<td>Status</td>");
    else if ($i == 5)
        print("<td>User</td>");
    else
        print("<td>" . $res->fetch_field_direct($i)->name . "</td>");
}
print("</tr></thead>");
print("<tbody>");
while ($row = $res->fetch_array()) {
    print("<tr>");
    for ($i=0; $i < $res->field_count; $i++) {
        print("<td>" . $row[$i] . "</td>");
    }
    print("</tr>");
}
print("</tbody>");
?>
        </table>
        <div><a href="add_task_form.php">タスク追加</a></div>
    </body>
</html>