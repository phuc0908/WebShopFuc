@include('client.header.header1')
<link rel="stylesheet" href="css/auth/signup.css" />
@include('client.header.header2')
<style>
    .alert.u {
        z-index: 99;
        padding: 20px;
        background-color: rgb(71, 168, 245);
        /* Blue */
        color: white;
        margin-bottom: 15px;
    }

    .alert.d {
        z-index: 99;
        padding: 20px;
        background-color: #f44336;
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

    span.error {
        color: #f44336;
        position: absolute;
    }
</style>
<section class="container">
    <!-- Session alert -->
    @if (session('alertSignUp'))
    <div class="alert u">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{ session('alertSignUp') }}
    </div>

    @endif
    @if (session('alertSignUpErr'))
    <div class="alert d">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{ session('alertSignUpErr') }}
    </div>
    @endif
    <div class="top-container">
        <ul>
            <li>
                <a href="{{route('client.index')}}">Trang Chủ</a>
            </li>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <li><a href="signup.php ">Đăng Ký</a></li>
        </ul>
    </div>

    <div class="center-container">

        <form action="" method="post">


            @csrf
            <div class="container-signin">
                <div class="infor_customer">
                    <label for="">Họ</label> <br />
                    <input type="text" name="lastName" id="" placeholder="Họ..." value="{{ old('lastName') }}" /><br>
                    <span class="error">
                        @error('lastName')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="infor_customer">
                    <label for="">Tên</label> <br />
                    <input type="text" name="firstName" id="" placeholder="Tên..." value="{{ old('firstName') }}" /><br>
                    <span class="error">
                        @error('firstName')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="infor_customer">
                    <label for="">Email</label> <br />
                    <input type="text" name="email" id="" placeholder="Email..." value="{{ old('email') }}" /><br>
                    <span class="error">
                        @error('email')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="infor_customer">
                    <label for="">Điện Thoại</label> <br />
                    <input type="text" name="phone" id="" placeholder="Số điện thoại..." value="{{ old('phone') }}" /><br>
                    <span class="error">
                        @error('phone')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="infor_customer">
                    <label for="">Tỉnh/TP</label> <br />
                    <select name="provinces" id="provinces">
                        <option selected disabled value="">-------</option>
                        @if(!empty($provinces))
                        @foreach($provinces as $v)
                        <option value="{{$v->code}}">{{$v->name}}</option>
                        @endforeach
                        @endif
                    </select><br>
                    <span class="error">
                        @error('provinces')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="infor_customer">
                    <label for="">Quận/Huyện</label><br />
                    <select name="districts" id="districts">
                        <option selected disabled value="">-------</option>
                    </select><br>
                    <span class="error">
                        @error('districts')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="infor_customer">
                    <label for="">Phường/Xã</label><br />
                    <select name="wards" id="wards">
                        <option selected disabled value="">-------</option>
                    </select><br>
                    <span class="error">
                        @error('wards')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="infor_customer">
                    <label for="">Địa Chỉ</label><br />
                    <input type="text" name="address" id="" placeholder="Địa chỉ..." value="{{ old('address') }}" /><br>
                    <span class="error">
                        @error('address')
                        {{$message}}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="container-signup">
                <div class="password_customer">
                    <label for="">User Name</label> <br />
                    <input type="text" name="username" id="" placeholder="Tên đăng nhập...." value="{{ old('username') }}" /><br>
                    <span class="error">
                        @error('username')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="password_customer">
                    <label for="">Mật Khẩu</label> <br />
                    <input type="password" name="pass" id="" placeholder="Mật Khẩu...." value="{{ old('pass') }}" /><br>
                    <span class="error">
                        @error('pass')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="password_customer">
                    <label for="">Nhập Lại Mật Khẩu</label> <br />
                    <input type="password" name="re_pass" id="" placeholder="Nhập Lại Mật Khẩu...." value="{{ old('re_pass') }}" /><br>
                    <span class="error">
                        @error('re_pass')
                        {{$message}}
                        @enderror
                    </span>
                </div>


                <div class="password_customer">
                    <button type="submit" class="btn_signup">
                        <p style="font-size: 20px; color: gray">
                            Đăng Ký
                        </p>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/js/jqueryAddress.js"></script>
@include('client.footer.footer')