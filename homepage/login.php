<?php session_start();
include('dbconn.php');
if (count($_POST) > 0) {
    $result = sqlsrv_query($oConn, "SELECT * FROM accounts WHERE username='" . $_POST["username"] . "' and password = '" . $_POST["password"] . "'");
    $row  = sqlsrv_fetch_array($result);
    if (is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
    } else {
        echo "<script type='text/javascript'>alert('You have entered incorrect username or password!');</script>";
    }
}
if (isset($_SESSION["id"])) {
    header("Location:index.php");
}
?>


<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <center>
        <div style="top:10rem;">
            <p>Login</p>
            <form action="" method="POST">
                <input type="text" id="user" name="username" placeholder="username">
                <br>
                <input type="text" id="pass" name="password" placeholder="password">
                <br>
                <button type="submit" id="btn" name="login" default>Login</button>
            </form>
        </div>
    </center>
</body>


</html>