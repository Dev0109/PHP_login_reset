<?php session_start();
?>
<html>
<head>
<title>Login</title>
<link href = './css_png/style.css' rel = 'stylesheet' type = 'text/css'>
</head>

<body>
<?php
include( 'connection.php' );

if ( isset( $_POST[ 'submit' ] ) ) {
    $user = mysqli_real_escape_string( $mysqli, $_POST[ 'username' ] );
    $pass = mysqli_real_escape_string( $mysqli, $_POST[ 'password' ] );

    if ( $user == '' || $pass == '' ) {
        echo '<script>alert("Either username or password field is empty.")</script>';

    } else {
        $result = mysqli_query( $mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')" )
        or die( 'Could not execute the select query.' );

        $row = mysqli_fetch_assoc( $result );

        if ( is_array( $row ) && !empty( $row ) ) {
            $validuser = $row[ 'username' ];
            $_SESSION[ 'valid' ] = $validuser;
            $_SESSION[ 'name' ] = $row[ 'name' ];
            $_SESSION[ 'id' ] = $row[ 'id' ];
        } else {
            echo '<h2>Invalid username or password.</h2>';
            echo '<br/>';
            echo "<a href='login.php' style='font-size:25px; color:#336699; margin-left:50px;'>Go back</a>";
        }

        if ( isset( $_SESSION[ 'valid' ] ) ) {
            header( 'Location: index.php' );

        }
    }
} else {
    ?>
    <div id = 'back'>
    <p id = log><font size = '+5'>Login</font></p>

    <div id = 'back_s'>
    <form name = 'form1' method = 'post' action = ''>
    <table id = 'tab'>
    <tr>
    <td width = '25%' >Login</td>
    <td><input type = 'text' name = 'username' id = 'txt'></td>
    </tr>
    <tr>
    <td>Password</td>
    <td><input type = 'password' name = 'password' id = 'txt'></td>
    </tr>
    <tr style = 'height: 150px;' >
    <td colspan = '2'><input type = 'submit' name = 'submit' value = 'OK' id = 'col'></td>
    </tr>
    </table>
    </form>

    <a href = 'forget-password.php' id = 'forg' > ( Forgot Password. )</a>
    </div>
    </div>
    <?php
}
?>
</body>
</html>