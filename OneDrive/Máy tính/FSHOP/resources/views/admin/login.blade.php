<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập trang quản trị</title>
    <link rel="stylesheet" href="/css/admin/login.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="col-left">

            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="" method="post">
                        @csrf
                        <p>
                            <label>Đăng nhập vào trang với vai trò quản trị viên<span>*</span></label>
                            <input type="text" placeholder="UserName" name="name" required>
                        </p>
                        <p>
                            <label>Password<span>*</span></label>
                            <input type="password" placeholder="PassWord" name="pass" required>
                        </p>
                        <p>
                            <input type="submit" value="Log in" />
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>