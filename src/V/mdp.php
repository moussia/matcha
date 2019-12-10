<head>
    <link type="text/css" rel="stylesheet" href="V/css/forgetPassword.css">
</head>
<?php
    require('header.php');
?>
 
 <br/><br/><br/>
<center>
            <br/>
            <h3 id="emble">Change your password?</h3>
                <br/>
            <h5 id="slogan">Enter your new password and reconfirm it (8 characters minimum and 1 digit required).</h5>
                <br/><br/><br/><br/>
            <form method="post" action="index.php?controle=param&action=modif_psw">
                <div class="form-group">
					<input type="password" name="newmdp1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your new password" required>
					<br/>
					<input type="password" name="newmdp2" class="form-control" aria-describedby="emailHelp" placeholder="Confirm password" style="width:70%;" required>
					<br/>
                </div>
                <br/><br/><br/>
                <button type="submit" value="submit" class="btn btn-primary" style="background-color:#E9467C;color:white; border-color:white; border-radius:10px;width:27%;">Save new password</button>
            </form>
</center>

 <?php
    require('footer.php');
?> 