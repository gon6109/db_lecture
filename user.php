<html>
    <head>
        <title>ユーザ一覧</title>
    </head>
    <body>
        <table border="1">
<?php
$conn = new mysqli("localhost", "s1811424", "s1811424new", "s1811424");
$conn->set_charset("utf8");
$sql = "SELECT * FROM user";
$res = $conn->query($sql);
print("<tr>");
for ($i=0; $i < $res->field_count; $i++) { 
    print("<td>" . $res->fetch_field_direct($i)->name . "</td>");
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
    </body>
</html>