<?php

require_once('env.php');
require_once('task.php');
require_once('user.php');
require_once('status.php');
require_once('comment.php');

require_once('check_user.php');
CheckUser(false);

?>

<html>
    <head>
        <title><?php Print(GetTitle($_GET['id'])); ?></title>
    </head>
    <body>
        <h1><?php Print(GetTitle($_GET['id'])); ?></h1>
        <h2>担当者</h2>
        <p><?php Print(GetUserName(GetUserId($_GET['id']))); ?></p>
        <h2>締め切り</h2>
        <p><?php Print(GetDeadline($_GET['id'])); ?></p>
        <h2>状態</h2>
        <p><?php Print(GetStatusName(GetStatusId($_GET['id']))); ?>
        <h2>進捗</h2>
        <p><?php Print(GetProgress($_GET['id'])); ?>
        <h2>詳細</h2>
        <p><?php Print(nl2br(GetDetail($_GET['id']))); ?></p>
        <h3><form>
            <button formaction="update_task_form.php" formmethod="GET" name="id" value="<?php echo $_GET['id']; ?>">編集</button>
            <button formaction="delete_task.php" formmethod="POST" name="id" value="<?php echo $_GET['id']; ?>">削除</button>
        </form></h3>
        <h2>コメント</h2>
<?php

$ids = GetCommentIds($_GET['id']);
console_log($ids);
foreach ($ids as $id) {
    print("<h3>". GetCommentCreateDate($id) . "</h3>");
    print("<h4>". GetUserName(GetCommentUserId($id)) . "</h4>");
    print("<p>" . nl2br(GetComment($id)) . "</p>");
}

?>
        <h3>新規コメント</h3>
        <form action="add_comment.php" method="POST">
            <textarea name="comment" rows="10" cols="60"></textarea>
            <input type="hidden" name="task_id" value="<?php print($_GET['id']); ?>">
            <input type="submit" value="追加">
        </form>
    </body>
</html>