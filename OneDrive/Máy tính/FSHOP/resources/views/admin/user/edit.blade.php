@include('admin.layouts.header')

<h1>Sửa Khách Hàng</h1>
<style>
    label {
        font-size: 12px;
    }
</style>
</header>
<section class="admin-container">

    @include('admin.layouts.sideBar')

    <div style="width: 200px; height: 100vh"></div>
    <div class="admin-container-right">
        <div class="admin-container-type-add">

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="display: flex;margin: 40px 0 0 0;">
                    <div class="infor">
                        @if(!empty($data))
                        @foreach($data as $value)
                        <label>Họ và Tên </label><br />
                        <input required type="text" name="name" placeholder="Nhập tên " value="{{$value->name}}" />
                        <br />
                        <label>Tên Đăng Nhập </label><br />
                        <input required type="text" name="username" placeholder=" " value="{{$value->username}}" />
                        <br />
                        <label>Mật khẩu</label><br />
                        <input required type="text" name="pass" placeholder="Nhập mật khẩu" value="{{$value->password}}" />
                        <br />
                        <label>Email</label><br />
                        <input readonly required type="email" name="email" placeholder="Nhập email" value="{{$value->email}}" />
                        <br />
                        <label>Nhập số điện thoại</label>
                        <br />
                        <input required type="text" name="phone" id="" placeholder="Nhập số điện thoại " value="{{$value->phone}}" />
                        <br />
                    </div>
                    <div class="address">
                        <label>Tỉnh</label>
                        <br>
                        <select name="provinces" id="provinces">
                            @if(!empty($province))
                            @foreach($province as $v)
                            <option value="{{$v->code}}" {{$v->code === $value->province_id ? 'selected' : '' }}>{{$v->name}}</option>
                            @endforeach
                            @endif
                        </select>
                        <br>
                        <label>Huyện/Quận</label>
                        <br>
                        <select name="districts" id="districts">
                            @if(!empty($district))
                            @foreach($district as $v)
                            <option value="{{$v->code}}" {{$v->code === $value->district_id ? 'selected' : '' }}>{{$v->name}}</option>
                            @endforeach
                            @endif
                        </select>

                        <br>
                        <label>Xã/Thị Trấn</label>
                        <br>
                        <select name="wards" id="wards">
                            @if(!empty($ward))
                            @foreach($ward as $v)
                            <option value="{{$v->code}}" {{$v->code === $value->ward_id ? 'selected' : '' }}>{{$v->name}}</option>
                            @endforeach
                            @endif
                        </select>
                        <br />
                        <label>Nhập địa chỉ</label>
                        <br />
                        <input required type="text" name="address" id="" placeholder="Địa chỉ nhà... " value="{{$value->address}}" />
                        <br>
                        <label for="">Trạng thái </label><br>
                        <select name="status" id="status">
                            <option value="0" {{0 === $value->status ? 'selected' : '' }}>Chưa kích hoạt</option>
                            <option value="1" {{1 === $value->status ? 'selected' : '' }}>Đã kích hoạt</option>
                            <option value="2" {{2 === $value->status ? 'selected' : '' }}>Bị khóa</option>
                        </select>
                        <br>
                    </div>


                    @endforeach
                    @endif
                    <button style="position: absolute;top: 400px;" class="bt_add_type" type="submit" name="submit">Cập nhật</button>
                </div>

            </form>
        </div>
    </div>
</section>
</body>

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
            url: '/showWards/' + district_code,
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