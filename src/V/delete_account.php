<head>
    <link type="text/css" rel="stylesheet" href="V/css/forgetPassword.css">
</head>
<?php
    require('header.php');
?>

<br/><br/><br/>
<center>
            <br/>
            <h3 id="emble">Delete your account?</h3>
                <br/>
            <h5 id="slogan">Enter your password to delete your account.</h5>
                <br/><br/><br/><br/>
            <form method="post" action="index.php?controle=param&action=delete_compte">
                <div class="form-group">
					<input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your password" required>
					<br/>
                </div>
                <br/><br/><br/>
                <button type="submit" value="submit" class="btn btn-primary" style="background-color:#E9467C;color:white; border-color:white; border-radius:10px;width:27%;">Delete your account</button>
            </form>
</center>

<?php
    require('footer.php');
?> 
