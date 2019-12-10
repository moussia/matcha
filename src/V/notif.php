<head>
<link type="text/css" rel="stylesheet" href="V/css/notif.css">
</head>
<?php
        require('header.php');
?>

<center>
    <h5 id="title">My notifications.</h5>
</center>
<br/><br/>
<div class="container">
    <?php
    require_once('M/notif_bd.php');
    $tab = get_notif_bd();

    foreach ($tab as $notif) {
        if ($notif['type'] == 'match'){
            echo '<div class="alert alert-warning" role="alert">';
            echo 'Congratulation ! You have match with ' . getUserlogin($notif['user_id'])['login'] . ' at ' . $notif['time'] . ' ! <br>';
            echo '</div>';
        }
        else if ($notif['type'] == 'likes'){
            echo '<div class="alert alert-danger" role="alert">';
            echo 'You have received a like from ' . getUserlogin($notif['user_id'])['login'] . ' at ' . $notif['time'] . ' ! <br>';
            echo '</div>';
        }
        else if ($notif['type'] == 'visiteur'){
            echo '<div class="alert alert-success" role="alert">';
            echo 'You have received a new visite from ' . getUserlogin($notif['user_id'])['login'] . ' at ' . $notif['time'] . ' ! <br>';
            echo '</div>';
        }
    }
    ?>
    <br/><br/>
</div>

<?php require('footer.php'); ?>