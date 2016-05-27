<style type="text/css">
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Trang đăng ký</title>
</head>
<body>
<div style="border: 1px solid #dddddd; width: 800px; margin: auto; margin-top: 100px; border-radius: 20px;background-color: ghostwhite">
<h1 align="center" style="background-color: #1ca8c3; padding: 20px; margin-top: 0;border-top-left-radius: 20px;border-top-right-radius: 20px;color: gold">Trang đăng ký thành viên</h1>
<form action="xuly.php" method="POST">
    <table cellpadding="0" cellspacing="10" border="0" align="center">
        <tr>
            <td>
                Họ và tên :
            </td>
            <td>
                <input type="text" name="txtFullname" size="50" />
            </td>
        </tr>
        <tr>
            <td>
                Tên đăng nhập :
            </td>
            <td>
                <input type="text" name="txtUsername" size="50" />
            </td>
        </tr>
        <tr>
            <td>
                Mật khẩu :
            </td>
            <td>
                <input type="password" name="txtPassword" size="50" />
            </td>
        </tr>
        <tr>
            <td>
                Email :
            </td>
            <td>
                <input type="text" name="txtEmail" size="50" />
            </td>
        </tr>
        <tr>
            <td>
                Phone :
            </td>
            <td>
                <input type="text" name="txtphone" size="50" />
            </td>
        </tr>
        <tr>
            <td>
                Chọn ảnh đại diện :
            </td>
            <td>
                <input type="file" name="txtImage" size="50" />
            </td>
        </tr>
        <tr>
            <td>
                Người giới thiệu :
            </td>
            <td>
                <input type="text" name="txtwho" size="50">
            </td>
        </tr>
        <tr align="center">
            <td>
                <input
                    style="margin-top: 30px;cursor: pointer;height: 42px;color: white;background-color: #1ca8c3; border: 1px solid #dddddd;border-radius: 5px;padding: 10px;width: 100px;margin-left: 100px" type="submit" value="Đăng ký" />
            </td>
            <td>
                <input style="margin-top: 30px;cursor: pointer;height:42px;color:white;background-color: #1ca8c3; border: 1px solid #dddddd;border-radius: 5px;padding: 10px;width: 100px" type="reset" value="Nhập lại" />
            </td>
        </tr>
    </table>

</form>
</div>
</body>
</html>