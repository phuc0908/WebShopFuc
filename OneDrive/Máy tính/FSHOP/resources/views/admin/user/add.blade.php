@include('admin.layouts.header')

<h1>Thêm Khách Hàng</h1>
<style>
    label {
        font-size: 12px;
    }

    .alert {
        padding: 20px;
        background-color: rgb(46, 184, 134);
        /* Green */
        color: white;
        margin-bottom: 15px;
    }

    .alertErr {
        padding: 20px;
        background-color: rgb(244, 67, 54);
        /* Green */
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
</header>
<section class="admin-container">

    @include('admin.layouts.sideBar')
    </style>


    <div style="width: 200px; height: 100vh"></div>
    <div class="admin-container-right">
        @if (session('alert'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('alert') }}
        </div>
        @endif
        @if (session('alertErr'))
        <div class="alertErr">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('alertErr') }}
        </div>
        @endif
        <div class="admin-container-type-add">

            <form action="" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div style="display: flex;margin: 40px 0 0 0;">
                    <div class="infor">
                        <label>Nhập tên</label><br />
                        <input required type="text" name="name" placeholder="Nhập tên " />
                        <br>
                        <label>Nhập tên đăng nhập</label><br />
                        <input required type="text" name="username" placeholder="Nhập tên đăng nhập" />
                        <br />
                        <label>Nhập mật khẩu</label><br />
                        <input required type="text" name="pass" placeholder="Nhập mật khẩu" />
                        <br />
                        <label>Nhập email</label><br />
                        <input required type="email" name="email" placeholder="Nhập email" />
                        <br />
                        <label>Nhập số điện thoại</label>
                        <br />
                        <input required type="text" name="phone" id="" placeholder="Nhập số điện thoại " />
                        <br />
                    </div>

                    <div class="address">
                        <label>Tỉnh</label><br>
                        <select name="provinces" id="provinces">
                            @if(!empty($provinces))
                            @foreach($provinces as $v)
                            <option value="{{$v->code}}">{{$v->name}}</option>
                            @endforeach
                            @endif
                        </select>
                        <br>
                        <label>Huyện/Quận</label>
                        <br>
                        <select name="districts" id="districts">

                        </select>

                        <br>
                        <label>Xã/Thị Trấn</label>
                        <br>
                        <select name="wards" id="wards">

                        </select>
                        <br />
                        <label>Nhập địa chỉ</label>
                        <br />
                        <input required type="text" name="address" id="" placeholder="Địa chỉ nhà... " />
                        <br>
                        <label for="">Trạng thái </label><br>
                        <select name="status" id="status">
                            <option value="0">Chưa kích hoạt</option>
                            <option value="1">Đã kích hoạt</option>
                            <option value="2">Bị khóa</option>
                        </select>
                    </div>


                    <button style="position: absolute;top: 400px;" class="bt_add_type" type="submit" name="submit">Thêm</button>
                </div>

            </form>
        </div>
    </div>
</section>
</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $("#provinces").change(function() {
        var province_code = $(this).val();

        $.ajax({
            type: 'get',
            url: 'showDistricts/' + province_code,
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

</html>