<html>
<head>
<title>CSC155 001DR Survey Thing</title>
<?php

require ('library/functions.php');

// depending on the zone, call one of
checkAccount("none");
//checkAccount("user");
//checkAccount("admin");
 
?>
</head>
<body>

This is the welcome page for our project.

If you don't have an account, you can create one <a href='createAccount.php'> here </a>. <br/>
This is where you can see the account database over the web <a href='showAccounts.php'> here </a>. <br/>
Login form broken.
<form action="action_page.php" method="post">
<div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>  </div>

  <div class="container" style="background-color:#f1f1f1"></form>
</body>
