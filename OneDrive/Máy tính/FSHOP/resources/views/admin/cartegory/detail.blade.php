@include('admin.layouts.header')

<h1>Danh Sách Sản Phẩm</h1>
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
                    <th>Tên</th>
                    <th>Giá (VNĐ)</th>
                    <th>Giá sau Sale (VNĐ)</th>
                    <th>Ảnh Gốc</th>
                    <th>Số Lượng</th>
                    <th>Slug</th>
                    <th>Thêm Ảnh</th>
                    <th>Thêm Size</th>
                    <th>Thêm Màu</th>
                    <th>Xem Danh Sách Ảnh</th>
                    <th>Xem Danh Sách Size</th>
                    <th>Xem Danh Sách Màu</th>

                    <th>Ngày Tạo</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Tùy Biến</th>
                    <th>Chi Tiết Sản Phẩm</th>
                </tr>

                @if(!empty($data))
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->price}}</td>
                    <td>{{$value->price_final}}</td>
                    <td><img style="height: 50px;width: 30px;" src="{{asset('storage/'.$value->img)}}" alt="Error"></td>
                    <td>{{$value->amount}}</td>
                    <td>{{$value->slug}}</td>
                    <!-- Add -->
                    <td><a href="{{route('admin.image.add', ['product_id' => $value->id])}}">Thêm &#8921;</a></td>
                    <td><a href="{{ route('admin.product.size.add', ['product_id' => $value->id] ) }}">Thêm &#8921;</a></td>
                    <td><a href="{{ route('admin.product.color.add', ['product_id' => $value->id] ) }}">Thêm &#8921;</a></td>
                    <!-- List  -->
                    <td><a href="{{route('admin.image.list', ['product_id' => $value->id])}}">Xem &#8921;</a></td>
                    <td><a href="{{route('admin.product.size.list', ['product_id' => $value->id])}}">Xem &#8921;</a></td>
                    <td><a href="{{route('admin.product.color.list', ['product_id' => $value->id])}}">Xem &#8921;</a></td>


                    <td>{{$value->created_at}}</td>
                    <td>{{$value->updated_at}}</td>
                    <td><a href="{{ route('admin.product.edit', ['id' => $value->id]) }}">Sửa</a> |
                        <a href="{{ route('admin.product.edit', ['id' => $value->id]) }}">Xóa</a>
                    </td>
                    <td style="padding:10px 30px;">{!!$value->description!!}</td>
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