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
    <div class="admin-container-right" style="font-size: 8px;">
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

            <table style="width: 100%;">
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Danh Mục</th>
                    <th>Giá (VNĐ)</th>
                    <th style="width: 100px;">Giá sau Sale (VNĐ)</th>
                    <th>Số Lượng</th>
                    <th>Slug</th>
                    <th>Ảnh Gốc</th>

                    <th>Ngày Tạo</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Thêm Ảnh</th>
                    <th>Thêm Size</th>
                    <th>Thêm Màu</th>
                    <th>Xem Danh Sách Ảnh</th>
                    <th>Xem Danh Sách Size</th>
                    <th>Xem Danh Sách Màu</th>

                    <th>Tùy Biến</th>
                    <th>Chi Tiết Sản Phẩm</th>

                </tr>
             

                @if(!empty($data))
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->cartegory_id}}</td>
                    <td>{{$value->price}}</td>
                    <td>{{$value->price_final}}</td>
                    <td>{{$value->amount}}</td>
                    <td>{{$value->slug}}</td>
                    <td><img style="height: 50px;width: 30px;" src="{{asset('storage/'.$value->img)}}" alt="Error"></td>

                    <td>{{$value->created_at}}</td>
                    <td>{{$value->updated_at}}</td>
                    <!-- Add -->
                    <td><a href="{{route('admin.image.add', ['product_id' => $value->id])}}">Thêm &#8921;</a></td>
                    <td><a href="{{ route('admin.product.size.add', ['product_id' => $value->id] ) }}">Thêm &#8921;</a></td>
                    <td><a href="{{ route('admin.product.color.add', ['product_id' => $value->id] ) }}">Thêm &#8921;</a></td>
                    <!-- List  -->
                    <td><a href="{{route('admin.image.list', ['product_id' => $value->id])}}">Xem &#8921;</a></td>
                    <td><a href="{{route('admin.product.size.list', ['product_id' => $value->id])}}">Xem &#8921;</a></td>
                    <td><a href="{{route('admin.product.color.list', ['product_id' => $value->id])}}">Xem &#8921;</a></td>

                    <!-- Action -->
                    <td><a href="{{ route('admin.product.edit', ['id' => $value->id]) }}">Sửa</a> |
                        <a href="{{ route('admin.product.destroy', ['id' => $value->id]) }}">Xóa</a>
                    </td>
                    <!-- Description -->
                    <td class="des" style="padding:10px 30px;">{!!$value->description!!}</td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="19">Không có sản phẩm nào</td>
                </tr>
                @endif

            </table>
        </div>
    </div>
</section>

</body>

</html>