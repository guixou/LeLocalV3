<?php

function shop() {
    require('model/shopModel.php');
    
    $posts = show();

    require('view/shopView.php');
}