<?php
function CreateHead($title) {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">';
    echo '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">';
    echo '<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p:300,400,500,700&display=swap" rel="stylesheet">';
    echo '<link rel="stylesheet" type="text/css" href="main.css">';
    echo '<title>'. $title . '</title>';
}