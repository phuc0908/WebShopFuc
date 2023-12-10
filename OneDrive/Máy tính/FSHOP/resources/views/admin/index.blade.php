<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập trang quản trị</title>
    <link rel="stylesheet" href="/css/admin/login.css">
</head>

<body>
    <section class="container">
        <h1>Bạn cần đăng nhập để vào được trang quản trị</h1>
        <form action="" method="post">
            @csrf
            <div class="name">
                <label>Name</label>
                <input type="text" required name="name">
            </div>
            <div class="pass">
                <label>Pass</label>
                <input type="text" required name="pass">
            </div>
            <div class="submit">
                <button>Log in</button>
            </div>

        </form>

    </section>
</body>

</html>