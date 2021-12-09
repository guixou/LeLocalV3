<?php

function shop($notification) {
    require('model/shopModel.php');
    
    $posts = show();

    require('view/shopView.php');
}