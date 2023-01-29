<html>
<head>
    <title>Register</title>
    <link href = './css_png/style.css' rel = 'stylesheet' type = 'text/css'>
</head>

<body>
    <?php
    include("connection.php");

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = $_POST['username'];
        $pass = $_POST['password'];

        if($user == "" || $pass == "" || $name == "" || $email == "") {
            echo "<h3>All fields should be filled. Either one or many fields are empty.</h3>";
            echo "<br/>";
            echo "<a href='register.php' style='font-size:20px; color:#336699;'>Go back</a>";
        } else {
            mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
            or die("Could not execute the insert query.");
			
            echo "<h2>Registration successfully!</h2>";
            echo "<br/>";
            echo "<img src = './css_png/123.png' style='width:30px; height: 30px; margin-left:50px'>";
            echo "<a href='login.php' style='font-size:25px; color:#336699; margin-left:20px;'>Login</a>";
        }
    } else {
?>
        <div id = 'back_reg'>
    <p id = log><font size = '+5'>Register</font></p>

    <div id = 'back_s'>
    <form name = 'form1' method = 'post' action = ''>
    <table id = 'tab_1'>
    <tr>
    <td width = '25%' >Full Name</td>
    <td><input type = 'text' name = 'name' id = 'txt'></td>
    </tr>
    <tr>
    <td width = '25%' >Email</td>
    <td><input type = 'text' name = 'email' id = 'txt'></td>
    </tr>
    <tr>
    <td width = '25%' >Userame</td>
    <td><input type = 'text' name = 'username' id = 'txt'></td>
    </tr>
    <tr>
    <td>Password</td>
    <td><input type = 'password' name = 'password' id = 'txt'></td>
    </tr>
    <tr style = 'height: 150px;' >
    <td colspan = '2'><input type = 'submit' name = 'submit' value = 'OK' id = 'col_1'></td>
    </tr>
    </table>
    </form>
    </div>
    </div>
    <?php
    }
    ?>
</body>
</html>