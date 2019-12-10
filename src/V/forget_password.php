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
            <h5 id="slogan">Enter your e-mail address and we will <br/>will send a link to recover your account.</h5>
                <br/><br/><br/><br/>
            <form method="post" action="index.php?controle=connect&action=forget">
                <div class="form-group">
                    <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your e-mail address" required>
                </div>
                <br/><br/><br/>
                <input type="submit" value="Send a password recovery link" name="submit" class="btn btn-primary" style="  background-color:#E9467C;color:white; border-color:white; border-radius:10px;width:27%;" required>
                <br/><br/><br/>
                <hr width="40%">
                <h6><a href="index.php" style="font-family: 'Roboto', sans-serif;text-decoration:none;color:#E9467C;">Click here to login or create an account</a></h6>
            </form>
</center>

 <?php
    require('footer.php');
?>