@include('admin.layouts.header')

<h1>Danh Sách Khách Hàng</h1>
</header>
<section class="admin-container">

    @include('admin.layouts.sideBar')

    <style>
        td {
            white-space: nowrap;
        }

        .admin-container-right {
            font-size: 12px;
        }

        /* The alert message box */
        .alert.u {
            padding: 20px;
            background-color: rgb(71, 168, 245);
            /* Blue */
            color: white;
            margin-bottom: 15px;
        }

        .alert.d {
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
    <div class="admin-container-right">
        <!-- ALERT -->
        @if (session('alertUpdate'))
        <div class="alert u">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('alertUpdate') }}
        </div>
        @elseif (session('alertDelete'))
        <div class="alert d">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('alertDelete') }}
        </div>
        @endif
        <!-- LIST -->
        <div class="admin-container-type-list">

            <table>
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Tên Đăng Nhập</th>
                    <th>Email</th>
                    <th>Mật Khẩu</th>
                    <th>Địa Chỉ</th>
                    <th style="width: 100px;">SĐT</th>
                    <th>Ngày Tạo</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Tùy Biến</th>
                    <th>Trạng Thái</th>

                </tr>

                @if(!empty($data))
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->username}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->password}}</td>
                    <td>
                        {{$value->address}}
                        <!-- WARD -->
                        @foreach($ward as $w)
                        @if($w->code === $value->ward_id)
                        {{" - ".$w->name}}
                        @endif
                        @endforeach
                        <!-- DISTRICT -->
                        @foreach($district as $d)
                        @if($d->code === $value->district_id)
                        {{" - ".$d->name}}
                        @endif
                        @endforeach
                        <!-- PORVINCE -->
                        @foreach($province as $p)
                        @if($p->code === $value->province_id)
                        {{" - ".$p->name}}
                        @endif
                        @endforeach
                    </td>
                    <td style="width: 100px;">{{$value->phone}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>{{$value->updated_at}}</td>
                    <td><a href="{{ route('admin.user.edit', ['id' => $value->id]) }}">Sửa</a> |
                        <a href="{{ route('admin.user.destroy', ['id' => $value->id]) }}">Xóa</a>
                    </td>
                    <td>
                        @if( $value->status == 0 )
                        {{"Chưa kích hoạt"}}
                        @elseif( $value->status == 1 )
                        {{"Đã kích hoạt"}}
                        @else
                        {{"Bị khóa"}}
                        @endif
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="13">Không có người dùng nào</td>
                </tr>
                @endif

            </table>
        </div>
    </div>
</section>

</body>

</html>