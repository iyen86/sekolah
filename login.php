<?php
session_start();
include_once ("config/koneksi.php");
//periksa koneksi
if($kon -> connect_error){
    die("koneksi gagal:" .$conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    //Mengecek data pengguna dari 
    $sql = ("SELECT * FROM logins WHERE username = '$username' AND password ='$password'");
    $result = $kon->query($sql);
    if ($result->num_rows ==1){
        //Login sukses,set session
        $row =$result->fetch_assoc();
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["email"] = $row["email"];
        header("Location: public/dashboard/dashboard.php");
    } else {
        echo "Login gagal. Silahkan coba lagi.";
    }
}
$kon->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php"></form>
    <label for="username"> Username:</label>
    <input type="text" name="username" require><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" require><br><br>
        <input type="submit" value="login">
        <?php 
        $_SESSION["username"];
        ?>
</form>
</body>
</html>