<?php

require_once('user.php');

?>
<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
            <a href="menu.php" class="navbar-item">進捗どうですか</a>
    </div>
    <div class="navbar-menu">
        <div class="navbar-end">
<?php
if ($_SESSION == NULL || !array_key_exists('ID', $_SESSION)) {
    echo '<div class="navbar-item">';
    echo '<span class="icon">';
    echo '<a href="login_user_form.php" class="fa fa-user">ログイン</a>';
    echo '</span>';
    echo '</div>';
}
else if (!$_SESSION['MANAGER']){
    echo '<div class="navbar-item">';
    echo GetUserName($_SESSION['ID']) . 'さん';
    echo '</div>';
    echo '<a href="update_user_form.php" class="navbar-item">ユーザ設定</a>';
}
else
{
    echo '<div class="navbar-item">';
    echo '管理者としてログイン中';
    echo '</div>';
}
?>
        </div>
    </div>
</nav>
