<?php session_start();
?>
<html>
<head>
<title>Homepage</title>
<link href = './css_png/style.css' rel = 'stylesheet' type = 'text/css'>
</head>

<body>
<div id = 'header'>
<stronsg>Main Menu</stronsg>
</div>
<?php
if ( isset( $_SESSION[ 'valid' ] ) ) {

    include( 'connection.php' );

    $result = mysqli_query( $mysqli, 'SELECT * FROM login' );
    ?>
    <a href = 'logout.php' id = 'out'>Logout</a><br/>
    <br/>
    <div id = 'part_1'>
    <div id = 'part_s'><a href = 'projects.php' id = 'view'>Projects</a></div>
    <div id = 'part_s'><a href = 'wells.php' id = 'view'>Wells</a></div>
    <div id = 'part_s1'><a href = 'workers.php' id = 'view'>Workers</a></div>
    </div>
    <div id = 'part_2'>
    <img src = './css_png/222.png' id = 'pic'>
    </div>
    <div id = 'footer'>
    <p id = 'foot'>Site Map : Main Menu  |  Projects  |  Wells  |  Workers  |  About </p>
    </div>

    <?php
} else {
    echo '<h3>You must be logged in to view this page.</h3><br/><br/>';

    echo "<a href='login.php' style='color:#336699; text-decoration:none; font-size:25px; margin:0px 30px;'>Login</a> | 
    <a href='register.php' style='color:#336699; text-decoration:none; font-size:25px; margin:0px 30px;'>Register</a>";
}

?>
</body>
</html>