<style type="text/css">
    a{
        text-decoration: none;
        color: black;
    }
    a:hover{
    }
    div{

        border: 1px solid #dddddd;
        width: 1000px;
        margin: auto;
        border-radius: 20px;
        background-color: ghostwhite;
        margin-top: 100px;
        box-sizing: border-box;
        height: 200px;
    }
    h2{
        margin-top: 0;padding: 20px;background-color: #1ca8c3;border-top-left-radius: 20px;border-top-right-radius: 20px;color: gold;
    }
    .button{
        border: 1px solid #dddddd;
        background-color: #1ca8c3;
        color: gold;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 10px;
    }
</style>
<?php
session_start();

header('Content-Type: text/html; charset=UTF-8');

if (isset($_POST['dangnhap']))
{
    include('connection.php');

    $email = $username = addslashes($_POST['txtUsername']);
    $password = addslashes($_POST['txtPassword']);

    if (!$username || !$password) {
        echo "<div align='center'><h2>Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.</h2><br><br> <a class='button' href='javascript: history.go(-1)'>Trở lại</a></div>";
        exit;
    }
    $password = md5($password);
    if ($_SESSION['num']==null){
        $_SESSION['num']=0;
    }
    if($_SESSION['num']==5){
        echo 'đăng nhập quá 5 lần';
        unset($_SESSION['num']);
        $URL = "login.php";
        header("Location: $URL");
        $_SESSION['check']=1;
        $a=time();
    }
    else{
        $_SESSION['check']=0;
    }
        $query = mysql_query("SELECT username, password FROM member WHERE username='$username'");
        $query1 = mysql_query("SELECT username, password FROM member WHERE email='$email'");
        if (mysql_num_rows($query) == 0 && mysql_num_rows($query1) == 0) {
            echo "<div align='center'><h2>Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại.</h2><br><br> <a class='button' href='javascript: history.go(-1)'>Trở lại</a></div>";
            $_SESSION['num'] = $_SESSION['num'] + 1;
            exit;
        }
        $row = mysql_fetch_array($query);
        $row1 = mysql_fetch_array($query1);
        if ($password != $row['password'] && $password != $row1['password']) {
            echo "<div align='center'><h2>Mật khẩu không đúng. Vui lòng nhập lại.</h2><br><br> <b><a class='button' href='javascript: history.go(-1)'>Trở lại</a></b></div>";
            $_SESSION['num'] = $_SESSION['num'] + 1;
            exit;
        }
        if (mysql_num_rows($query) != 0) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $URL = "home.php";
            header("Location: $URL");
            die();
        }
        if (mysql_num_rows($query1) != 0) {
            $_SESSION['username'] = $row1['username'];
            $_SESSION['password'] = $password;
            $URL = "home.php";
            header("Location: $URL");
            die();
        }
}
?>