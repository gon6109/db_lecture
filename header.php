<?php

require_once('user.php');

?>
<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a href="." class="navbar-item"><strong>進捗どうですか？</strong></a>
    </div>
    <div class="navbar-menu">
        <div class="navbar-start">
            <a href="menu.php" class="navbar-item">メニュー</a>
        </div>
        <div class="navbar-end">
<?php
if ($_SESSION == NULL || !array_key_exists('ID', $_SESSION)) {
    echo '<a class="navbar-item" href="login_user_form.php">ログイン</a>';
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
