<?php

require_once('user.php');

?>
<header class="nav">
    <div class="nav-left">
        <span class="nav-item">
            <a href="menu.php">進捗どうですか</a>
        </span>
    </div>
    <div class="nav-right">
        <?php
if ($_SESSION == NULL || !array_key_exists('ID', $_SESSION)) {
    echo '<span class="nav-item">';
    echo '<a href="login_user_form.php" class="fa fa-user">ログイン</a>';
    echo '</span>';
}
else if (!$_SESSION['MANAGER']){
    echo '<span class="nav-item">';
    echo GetUserName($_SESSION['ID']) . 'さん';
    echo '</span>';
    echo '<span class="nav-item">';
    echo '<a href="update_user_form.php">ユーザ設定</a>';
    echo '</span>';
}
else
{
    echo '<span class="nav-item">';
    echo '管理者としてログイン中';
    echo '</span>';
}
            ?>
    </div>
</header>