<?php

require_once('env.php');
require_once('task.php');
require_once('user.php');
require_once('status.php');
require_once('comment.php');
require_once('head.php');

require_once('check_user.php');
CheckUser(false);

?>

<html>
    <head>
        <?php CreateHead(GetTitle($_GET['id'])); ?>
    </head>
    <body>
        <?php require_once('header.php'); ?>
        <section class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-8 is-offset-2">
                        <span class="tag is-info is-large"><?php Print(GetStatusName(GetStatusId($_GET['id']))); ?></span>
                        <div class="box">
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <h1 class="title is-3"><?php Print(GetTitle($_GET['id'])); ?></h1>
                                    </div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">
                                        <h2 class="subtitle is-3"><?php Print(GetUserName(GetUserId($_GET['id']))); ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item">
                                        <h2 class="title is-4">締め切り</h2>
                                    </div>
                                    <div class="level-item">
                                        <p><?php Print(GetDeadline($_GET['id'])); ?></p>
                                    </div>
                                    <div class="level-item">
                                        <h2 class="title is-4">進捗</h2>
                                    </div>
                                    <div class="level-item">
                                        <p><?php Print(GetProgress($_GET['id'])); ?></p>
                                    </div>
                                </div>
                            </div>
                            <progress class="progress is-success" value="<?php Print(GetProgress($_GET['id'])); ?>"
                                max="100"><?php Print(GetProgress($_GET['id'])); ?>%</progress>
                            <h2 class="title is-4">詳細</h2>
                            <div class="box"><p><?php Print(nl2br(GetDetail($_GET['id']))); ?></p></div>
                            <form>
                                <button class="button is-primary" formaction="update_task_form.php" formmethod="GET" name="id" value="<?php echo $_GET['id']; ?>">編集</button>
                                <button class="button is-danger" formaction="delete_task.php" formmethod="POST" name="id" value="<?php echo $_GET['id']; ?>">削除</button>
                            </form>
                        </div>
                        <div class="box">
                            <h2 class="title is-4">コメント</h2>
<?php

$ids = GetCommentIds($_GET['id']);
console_log($ids);
foreach ($ids as $id) {
    echo '<div class="box">';
    echo '<div class="level">';
    echo '<div class="level-left">';
    echo '<div class="level-item">';
    print('<h3 class="title is-4">'. GetUserName(GetCommentUserId($id)) . "</h3>");
    echo '</div>';
    echo '<div class="level-item">';
    print('<h4 class="subtitle is-4">'. GetCommentCreateDate($id) . "</h4>");
    echo '</div>';
    echo '</div>';
    echo '</div>';
    print("<p>" . nl2br(GetComment($id)) . "</p>");
    echo '</div>';
}

?>
                            <form action="add_comment.php" method="POST">
                                <div class="field">
                                    <label class="label">新規コメント</label>
                                    <div class="control">
                                        <textarea name="comment" class="textarea"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="task_id" value="<?php print($_GET['id']); ?>">
                                <div class="field">
                                    <input  class="button is-link" type="submit" value="追加">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>