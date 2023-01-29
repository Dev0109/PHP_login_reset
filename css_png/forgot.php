<?php
session_start();
include( 'connection.php' );
if ( isset( $_POST[ 'submit' ] ) )
 {
    $username = $_POST[ 'name' ];
    $result = mysqli_query( $mysqli, "SELECT * FROM login where username ='" . $_POST[ 'name' ] . "'" );

    $row = mysqli_fetch_assoc( $result );
    $fetch_username = $row[ 'username' ];
    $password = $row[ 'password' ];
    if ( $username == $fetch_username ) {
        $subject = 'Password';
        echo $password;

    } else {
        echo 'invalid username';
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
<link href = './css_png/style.css' rel = 'stylesheet' type = 'text/css'>
</head>
<body>
<p id = 'forg_1'>Forgot Password<p>
<form action = '' method = 'post'>
<table id = 'tab_2'>
<tr style = 'height: 60%; margin-top: 50px;'>
<td style = 'text-align:center'>Username:</td>
<td><input type = 'text' style = 'height:30px' name = 'name'/></td>
</tr>

<tr style = 'height: 60%; margin-top: 50px;'>
<td style = 'text-align:center'>Email:</td>
<td><input type = 'email' style = 'height:30px' name = 'email'/></td>
</tr>

<tr>
<td></td>
<td><input type = 'submit' name = 'submit' id = 'sub' value = 'Submit'/></td>
</tr>
</table>
</form>
<a href = 'login.php' id = 'home'>Login Page</a>
</body>
</html>