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
                    <input type="text" name="lastName" id="" placeholder="Họ..." />
                </div>

                <div class="infor_customer">
                    <label for="">Tên</label> <br />
                    <input type="text" name="firstName" id="" placeholder="Tên..." />
                </div>

                <div class="infor_customer">
                    <label for="">Email</label> <br />
                    <input type="email" name="email" id="" placeholder="Email..." />
                </div>

                <div class="infor_customer">
                    <label for="">Điện Thoại</label> <br />
                    <input type="text" name="phone" id="" placeholder="Số điện thoại..." />
                </div>

                <div class="infor_customer">
                    <label for="">Tỉnh/TP</label> <br />
                    <select name="provinces" id="provinces">
                        @if(!empty($provinces))
                        @foreach($provinces as $v)
                        <option value="{{$v->code}}">{{$v->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>

                <div class="infor_customer">
                    <label for="">Quận/Huyện</label><br />
                    <select name="districts" id="districts"></select>
                </div>

                <div class="infor_customer">
                    <label for="">Phường/Xã</label><br />
                    <select name="wards" id="wards">

                    </select>
                </div>

                <div class="infor_customer">
                    <label for="">Địa Chỉ</label><br />
                    <input type="text" name="address" id="" placeholder="Địa chỉ..." />
                </div>
            </div>

            <div class="container-signup">
                <div class="password_customer">
                    <label for="">User Name</label> <br />
                    <input type="text" name="username" id="" placeholder="Tên đăng nhập...." />
                </div>
                <div class="password_customer">
                    <label for="">Mật Khẩu</label> <br />
                    <input type="text" name="pass" id="" placeholder="Mật Khẩu...." />
                </div>

                <div class="password_customer">
                    <label for="">Nhập Lại Mật Khẩu</label> <br />
                    <input type="text" name="re_pass" id="" placeholder="Nhập Lại Mật Khẩu...." />
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // })
    $("#provinces").change(function() {
        var province_code = $(this).val();

        $.ajax({
            type: 'get',
            url: '/showDistricts/' + province_code,
            dataType: 'json',
            success: function(data) {
                $("#wards").html('');
                $("#districts").html('');
                $.each(data, function(key, value) {
                    $("#districts").append(
                        "<option value=" + value.code + ">" + value.name + "</option>"
                    );
                });

            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });
    $("#districts").change(function() {
        var district_code = $(this).val();

        $.ajax({
            type: 'get',
            url: 'showWards/' + district_code,
            dataType: 'json',
            success: function(data) {
                $("#wards").html('');
                $.each(data, function(key, value) {
                    $("#wards").append(
                        "<option value=" + value.code + ">" + value.name + "</option>"
                    );
                });
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });
</script>

@include('client.footer.footer')