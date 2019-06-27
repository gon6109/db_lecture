<html>
    <head>
        <title>管理者画面</title>
        <!-- choose a theme file -->
        <link rel="stylesheet" href="tablesorter/css/theme.blue.css">
        <!-- load jQuery and tablesorter scripts -->
        <script type="text/javascript" src="jquery-3.4.1.js"></script>
        <script type="text/javascript" src="tablesorter/js/jquery.tablesorter.js"></script>

        <!-- tablesorter widgets (optional) -->
        <script type="text/javascript" src="tablesorter/js/jquery.tablesorter.widgets.js"></script>
        <script type="text/javascript">
$(function() {
    $("#user").tablesorter();
});
        </script>
    </head>
    <body>
        <h1>管理者画面</h1>
        <h2>ユーザ一覧</h2>
            <form><table id="user" class="tablesorter-blue">
<?php
$conn = new mysqli("localhost", "s1811424", "s1811424new", "s1811424");
$conn->set_charset("utf8");
$sql = "SELECT user.id, user.name, user.mail_address, user.password FROM user WHERE user.user_type='GUEST'";
$res = $conn->query($sql);
print("<thead><tr>");
for ($i=0; $i < $res->field_count; $i++) { 
    print("<td>" . $res->fetch_field_direct($i)->name . "</td>");
}
print("<td>削除</td>");

print("</tr></thead>");
print("<tbody>");

while ($row = $res->fetch_array()) {
    print("<tr>");
    for ($i=0; $i < $res->field_count; $i++) { 
        print("<td>" . $row[$i] . "</td>");
    }
    print('<td><button formaction="delete_user.php" formmethod="POST" name="id" value="' . $row[0] . '">削除</button></td>');
    print("</tr>");
}
print("</tbody>");
?>
        </table></form>
        <p>テスト用にパスワードを載せてます</P>
    </body>
</html>