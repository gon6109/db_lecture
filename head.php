<?php
function CreateHead($title) {
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.1.2/css/bulma.css">';
    echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">';
    echo '<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:300,400,500,700&display=swap" rel="stylesheet">';
    echo '<title>'. $title . '</title>';
}