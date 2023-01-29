<?php
session_start();
include( 'connection.php' );
if ( isset( $_POST[ 'submit' ] ) ) 
 {
    $email = $mysqli->real_escape_string( $_POST[ 'email' ] );

    $data = $mysqli->query( "SELECT id FROM login WHERE email='$email'" );

    if ( $data->num_rows > 0 ) {
        $str = '0123456789qwertyyuiokkgffasdasdsvcvd';
        $str = str_shuffle( $str );
        $str = substr( $str, 0, 9 );
        $url = "http://domain.com/resetpassword.php?token=$str&email=$email";

        mail( $email, 'Reset Password', "To Reset the Password, Please Visit: $url", 'From: support@domain.com\r\n' );

        $mysqli->query( "UPDATE login SET token='$str' WHERE email='$email'" );

    } else {

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
<td style = 'text-align:center; width:40%'>Email:</td>
<td><input type = 'email' style = 'height:30px;width:200px' name = 'email'/></td>
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