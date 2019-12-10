<head>
    <link type="text/css" rel="stylesheet" href="V/css/forgetPassword.css">
    <link rel="stylesheet" href="V/css/footer.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700|Roboto:300i&display=swap" rel="stylesheet">
</head>

<br/><br/><br/><br/>
<center>
            <br/>
            <h3 id="emble">Forgot your password ?</h3>
                <br/>
            <h5 id="slogan">Enter your new password to log in to your Matcha account.</h5>
                <br/><br/><br/><br/>
            <form method="post" action="index.php?controle=connect&action=change_psw">
                <div class="form-group">
                    <input type="password" name="change_mdp" class="form-control" id="exampleInputEmail1" placeholder="Enter your new password" required>
                    <br/>
                    <input type="password" name="change_mdpc" class="form-control" placeholder="Enter the confirmation of your password" style="width:70%;" required>
                </div>
                <br/><br/><br/>
                <input type="submit" value="Confirm the new password" name="change_submit" class="btn btn-primary" style="  background-color:#E9467C;color:white; border-color:white; border-radius:10px;width:27%;" required>
            </form>
</center>

 <?php
    require('footer.php');
?>