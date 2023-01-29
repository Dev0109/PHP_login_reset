<?php
if ( isset( $_GET[ 'email' ] ) && isset( $_GET[ 'token' ] ) ) {
    include( 'connection.php' );
    $email = $mysqli->real_escape_string( $_GET[ 'email' ] );
    $token = $mysqli->real_escape_string( $_GET[ 'token' ] );
    $data = $mysqli->query( "SELECT id FROM login WHERE email='$email' AND token='$token'" );
    if ( $data->num_rows >0 ) {
        echo 'please check your link';
        $str = '0123456789qwertyuioplkjhgfdsa';
        $str = str_shuffle( $str );
        $str = substr( $str, 0, 15 );
        $password = sha1( $str );
        $mysqli->query( "UPDATE login SET password='$password', token='' WHERE email='$email'" );
        echo "Your New Password is $str";
    } else {

        header( 'Location: login.php' );
        exit();
    }

} else {
    header( 'Location: login.php' );
    exit();
}

?>