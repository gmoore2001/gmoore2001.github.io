<html>
<head>
<title>CSC155 001DR Survey Thing</title>
<style>
table, td, th {
  border: 0px solid black;
}

table {
  border-width: 2px;
  margin-left: auto; 
  margin-right: auto;
  padding: 3; 

}

td {
  vertical-align: bottom;
  text-align: right;
  padding: 4; 
  background-color: antiquewhite;
}
</style>
<?php

require ('library/functions.php');

// depending on the zone, call one of
checkAccount("none");
//checkAccount("user");
//checkAccount("admin");

// get connection object
$conn = getDBConnection();

if (isset($_POST['selection'])) // form loaded itself
{
    if ($_POST['selection'] == "Create Account") // insert new record chosen
    {
	// build SQL command SECURELY
        // prepare
	$stmt = $conn->prepare("INSERT INTO users 
                       (username, encrypted_password, usergroup, email, firstname, lastname) 
                       VALUES (?, ?, ?, ?, ?, ?)" );
	// bind variable names and types
	$stmt->bind_param("ssssss", $username, $encrypted_password, $usergroup, $email, $firstname, $lastname);

	$username=$_POST['username'];
	$encrypted_password=password_hash($_POST['password'],PASSWORD_DEFAULT);
	$usergroup=$_POST['usergroup'];
	$email=$_POST['email'];
	$firstname=$_POST['lastname'];
	$lastname=$_POST['firstname'];


	// put the statement together and send it to the database
	$stmt->execute();
        header("Location: welcome.php");
    }
    if ($_POST['selection'] == "Cancel") // insert new record chosen
    {
        header("Location: welcome.php");
    }
}
?>

</head>
<body>

<form method='POST'>
<div style='border-width: 2px'>
<table><td><form>
<input type="radio" id="user" checked="checked" name="usergroup" value="user">
<label for="User">User</label><br>
<input type="radio" id="admin" name="usergroup" value="admin">
<label for="Admin">Admin</label><br>
<input type="radio" id="su" name="usergroup" value="su">
<label for="su">Su</label><br></tr></form></td>
<tr>
  <td>Username</td>
  <td><input type='text' name='username' /></td>
</tr>
<tr>
  <td>Password</td>
  <td><input type='password' name='password' /> </td>
</tr>
<tr>
  <td>Confirm Password</td>
  <td> <input type='password' name='confirm' /></td>
</tr>
<tr>
  <td>Email</td>
  <td> <input type='text' name='email' /> </td>
</tr>
<tr>
  <td>First Name</td>
  <td> <input type='text' name='firstname' /> </td>
</tr>

<tr>
  <td>Last Name</td>
  <td> <input type='text' name='lastname' /> </td>
</tr>
</div>
<tr>
  <td colspan='2' style='text-align: center; background-color: white;'> 
    <input type='submit' name='selection' value='Create Account' />
    &nbsp;
    <input type='submit' name='selection' value='Cancel' />
  </td>
</tr>
<tr>
  <td colspan='2' style='text-align: center; background-color: lightred;'>
    Warning: This is class project and is not secure!  
  </td>
</tr>
</table>
</div>
</form>


<h3>Short Form</h3>
<form method='POST'>
Username: <input type='text' name='username' /> <br />
Password: <input type='text' name='password' /> 
This is visible so you don't really put in a password.  This site is not secure! <br/>
Confirm Password: <input type='text' name='confirm' /> 
This is visible so you don't really put in a password.  This site is not secure! <br/>
<input type='submit' name='selection' value='Create Account' />
    &nbsp;
    &nbsp;
<input type='submit' name='selection' value='Cancel' />
</form>

</body>
</html>
