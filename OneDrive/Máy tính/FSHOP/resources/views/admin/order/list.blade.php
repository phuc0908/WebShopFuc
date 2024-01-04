@include('admin.layouts.header')

<h1>Thêm Sản Phẩm</h1>
</header>
<section class="admin-container">

    @include('admin.layouts.sideBar')

    <style>
        tr.table td {
            text-align: center;
            white-space: nowrap;
        }

        .admin-container-right {
            font-size: 12px;
        }

        button {
            width: 100%;
        }
    </style>

    <div class="admin-container-right">
        <div class="admin-container-type-list">

            <table>
                <tr>
                    <th style="width: 10px;">STT</th>
                    <th style="width: 20px;">ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Địa Chỉ</th>
                    <th>Ngày Tạo Đơn Hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Tùy biến</th>
                </tr>
                @if(!empty($data))
                @foreach ($data as $key => $value)
                <tr class="table">
                    <td>{{$key}}</td>
                    <td>
                        < <a class="detail" style="display: block ;height: 100%;" href=" {{ route('admin.order.detail',['idorder' => $value->id]) }}">
                            F_SHOP_{{$value->id}}
                            </a>
                    </td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->address}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>{{number_format($value->total)}} VND</td>
                    @if($value->state==0)
                    <td style="color: blue;font-weight: 600;">
                        Đang chờ xác nhận
                    </td>
                    <td><a href="{{ route('admin.order.state', ['id' => $value->id,'state' => 1]) }}"><button>Xác nhận</button></a></td>
                    @elseif($value->state==1)
                    <td style="color: green;font-weight: 600;">
                        Đã xác nhận
                    </td>
                    <td><a href="{{ route('admin.order.state', ['id' => $value->id,'state' => 2]) }}"><button>Hủy bỏ</button></a></td>
                    @else
                    <td style="color: red;font-weight: 600;">
                        Đã hủy
                    </td>
                    <td><a href="{{ route('admin.order.state', ['id' => $value->id,'state' => 1]) }}"><button>Xác nhận</button></a></td>
                    @endif

                </tr>
                @endforeach
                @endif

            </table>
        </div>
    </div>
</section>

</body>

</html>