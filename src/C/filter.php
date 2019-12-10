<?php

function get_filter(){
    require('M/filter_bd.php');

    $tag = isset($_POST['interests'])?$_POST['interests']:'';
    $age = isset($_POST['age'])?$_POST['age']:'';
    $location = isset($_POST['location'])?$_POST['location']:'';
    $popularity = isset($_POST['popularity'])?$_POST['popularity']:'';

    $_SESSION['filter'] = filter($age, $tag, $location, $popularity);
    require('V/search_filter.php');
}

?>