<?php

function getmatch(){
    require('M/match_bd.php');
    getFriendsMatch();
    require('V/friends.php');
}

function deletematch(){
    $user_two = $_POST["userid"];

    require('M/match_bd.php');
    deleteMatch_bd($user_two);
    deleteLike_bd($user_two);
    require('V/friends.php');

}

?>