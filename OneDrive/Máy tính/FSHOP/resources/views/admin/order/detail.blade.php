@include('admin.layouts.header')

<h1>Danh Sách Sản Phẩm Trong Đơn Hàng</h1>
</header>
<section class="admin-container">

    @include('admin.layouts.sideBar')

    <style>
        td {
            white-space: nowrap;
        }

        .admin-container-right {
            font-size: 10px;
        }
    </style>

    <div class="admin-container-right">
        <div class="admin-container-type-list">

            <table>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Màu</th>
                    <th>Size</th>
                    <th>Giá (VNĐ)</th>
                    <th>Ảnh Gốc</th>
                    <th>Số Lượng</th>
                    <th>Ngày Tạo</th>
                </tr>

                @if(!empty($data))
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->nameProduct}}</td>
                    <td>{{$value->nameColor}}</td>
                    <td>{{$value->nameSize}}</td>
                    <td>{{$value->price}}</td>
                    <td><img style="height: 50px;width: 30px;" src="{{asset('storage/'.$value->img)}}" alt="Error"></td>
                    <td>{{$value->amount}}</td>
                    <td>{{$value->created_at}}</td>
                    <!-- <td>
                        <a href="{{ route('admin.order.detail.destroy', ['id' => $value->id]) }}">Xóa</a>
                    </td> -->
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="13">Không có sản phẩm nào</td>
                </tr>
                @endif

            </table>
        </div>
    </div>
</section>

</body>

</html>