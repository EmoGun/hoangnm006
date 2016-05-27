<style type="text/css">
    a{
        text-decoration: none;
        color: black;
        font-size: 17px;
        color: white;
    }
    input:focus{
        outline: none;
    }
    input{
        height: 30px;
        font-size: 17px;
    }
</style>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<?php
session_start();
?>
    <?php if($_SESSION['check']==0) { ?>
        <div
            style="border: 1px solid #dddddd; width: 800px; margin: auto; margin-top: 100px; border-radius: 20px;background-color: ghostwhite">
            <h1 align="center"
                style="background-color: #1ca8c3; padding: 20px; margin-top: 0;border-top-left-radius: 20px;border-top-right-radius: 20px;color: gold">
                Trang đăng nhập</h1>
            <form action='xuly-login.php' method='POST'>
                <table cellpadding='0' cellspacing='10' border='0' align="center">
                    <tr>
                        <td>
                            Tên đăng nhập (hoặc Email):
                        </td>
                        <td>
                            <input type='text' name='txtUsername'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mật khẩu :
                        </td>
                        <td>
                            <input type='password' name='txtPassword'/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input
                                style="margin-top: 30px;cursor: pointer;height: 42px;color: white;background-color: #1ca8c3; border: 1px solid #dddddd;border-radius: 5px;padding: 10px;width: 120px;margin-left: 100px"
                                type='submit' name="dangnhap" value='Đăng nhập'/>
                        </td>
                        <td>
                            <button
                                style="margin-top: 25px;cursor: pointer;height: 42px;color: white;background-color: #1ca8c3; border: 1px solid #dddddd;border-radius: 5px;padding: 10px;width: 120px;margin-left: 100px">
                                <a href='registion.php' title='Đăng ký'>Đăng ký</a></button>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
        <?php
    }
    if($_SESSION['check']==1){
        if(empty($_COOKIE['a'])){
            $_SESSION['check']=0;
        }
    }
    ?>


</body>
</html>
