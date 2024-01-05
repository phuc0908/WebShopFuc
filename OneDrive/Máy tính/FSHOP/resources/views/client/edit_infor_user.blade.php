@include('client.header.header1')
<link rel="stylesheet" href="/css/auth/signup.css" />
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
            <li><a href="signup.php ">Chỉnh sửa thông tin</a></li>
        </ul>
    </div>

    <div class="center-container">

        <form action="" method="post">


            @csrf

            @if(!empty($infor))
            @foreach($infor as $value)

            <div class="container-signin">
                <div class="infor_customer">
                    <label for="">Họ và Tên</label> <br />
                    <input type="text" name="name" id="" placeholder="" value="{{ old('name',$value->name) }}" /><br>
                    <span class="error">
                        @error('name')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="infor_customer">
                    <label for="">Email</label> <br />
                    <input type="text" name="email" id="" placeholder="" value="{{ old('email',$value->email) }}" /><br>
                    <span class="error">
                        @error('email')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="infor_customer">
                    <label for="">Điện Thoại</label> <br />
                    <input type="text" name="phone" id="" placeholder="Số điện thoại..." value="{{ old('phone',$value->phone) }}" /><br>
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

                <div class="infor_customer" style="width: 500px">
                    <label for="">Địa Chỉ</label><br />
                    <input style="width: 500px" type="text" name="address" id="" placeholder="Địa chỉ..." value="{{ old('address',$value->address) }}" /><br>
                    <span class="error">
                        @error('address')
                        {{$message}}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="container-signup">

                <div class="password_customer" style="padding: 25px 0 30px 0;">
                    <img style="width: 500px;object-fit: contain; opacity: 0.7;" src="../../img/logoedit.jpg" alt="">
                </div>

                <div class="password_customer">
                    <button type="submit" class="btn_signup" name="submit">
                        <p style="font-size: 20px; color: white">
                            Cập nhật
                        </p>
                    </button>
                </div>
            </div>

            @endforeach
            @endif
        </form>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/js/jqueryAddress.js"></script>
@include('client.footer.footer')