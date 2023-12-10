@include('client.header.header1')
<link rel="stylesheet" href="css/auth/signin.css" />
@include('client.header.header2')

<style>
    .alert.d {
        z-index: 99;
        padding: 20px;
        background-color: #f44336;
        /* Blue */
        color: white;
        margin-bottom: 15px;
    }

    .alert.u {
        z-index: 99;
        padding: 20px;
        background-color: rgb(71, 168, 245);
        /* Blue */
        color: white;
        margin-bottom: 15px;
    }


    /* The close button */
    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    /* When moving the mouse over the close button */
    .closebtn:hover {
        color: black;
    }
</style>

<section class="container">

    @if (session('alertErr'))
    <div class="alert d">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{ session('alertErr') }}
    </div>
    @endif
    @if (session('alertSignUp'))
    <div class="alert u">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{ session('alertSignUp') }}
    </div>
    @endif

    <div class="top-container">
        <ul>
            <li>
                <a href="{{ route('client.index') }}">Trang Chủ</a>
            </li>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <li>
                <a href="{{ route('client.auth.signin') }}">Đăng Nhập</a>
            </li>
        </ul>
    </div>

    <div class="center-container">
        <form class="container-signin" method="post">
            @csrf
            <div class="background-login">
                <h1>Bạn đã có tài khoản ?</h1>
                <p>
                    Nếu bạn đã có tài khoản, hãy đăng nhập đễ tích lũy
                    điểm thành viên và nhận được những ưu đãi tốt hơn!
                </p>
                <div style="display: flex; flex-direction: column">
                    <input type="text" name="username" id="" class="input-phone" placeholder="User Name hoặc Email" />

                    <input type="text" name="password" id="" class="input-password" placeholder="Mật Khẩu" />
                </div>
                <input type="checkbox" name="" id="" />
                <label for="">Ghi Nhớ Đăng Nhập</label>
                <div class="btn-signin">
                    <a href="">Quên Mật Khẩu</a>
                    <button class="button-signin" type="submit">
                        <a href="{{ route('client.auth.signin') }}">
                            <span style="color: #fff; font-size: 16px">
                                Đăng nhập
                            </span>
                        </a>
                    </button>
                </div>
            </div>
        </form>

        <div class="container-signup">
            <div class="background-signup">
                <h1>Tạo Tài Khoản Mới</h1>
                <p>
                    Trở thành Thành Viên FSHOP dể nhận được thông báo
                    mới của shop
                </p>
                <p>
                    <i class="fa-sharp fa-solid fa-circle-check" style="color: #1f5129"></i>Tích Điểm Tự Động
                </p>
                <p>
                    <i class="fa-sharp fa-solid fa-circle-check" style="color: #1f5129"></i>Nhiều Ưu Đãi Đặc Biệt
                </p>
                <p>
                    <i class="fa-sharp fa-solid fa-circle-check" style="color: #1f5129"></i>Thông Tin Mới Nhất
                </p>
                <a href="{{ route('client.auth.signup') }}"><button class="button-signup">
                        <span style="color: #fff; font-size: 16px">Đăng Ký</span>
                    </button></a>
            </div>
        </div>
    </div>
</section>

@include('client.footer.footer')