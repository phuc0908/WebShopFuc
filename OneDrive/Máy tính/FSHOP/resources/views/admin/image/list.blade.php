@include('admin.layouts.header')

<h1>Danh Sách Danh Mục</h1>
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
        @if(!empty($product_id))
        <button><a href="{{ route('admin.image.destroyAll', [ 'product_id'=> $product_id ]) }}">Xóa hết</a></button>
        @endif
        <!-- LIST -->
        <div class="admin-container-type-list">

            <table>
                <tr>
                    <th>STT</th>
                    <th>ID</th>
                    <th>Đường Dẫn</th>
                    <th>Hình</th>
                    <th>Thêm Màu</th>
                    <th>Xem Màu</th>
                    <th>Ngày Tạo</th>
                    <th>Tùy Biến</th>
                </tr>
                @if(!empty($data))
                @foreach ($data as $key => $value)

                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->id}}</td>
                    <td>{{$value->value}}</td>
                    <td><img style="height: 50px;width: 30px;" src="{{asset('storage/'.$value->value)}}" alt="Error"></td>
                    <td><a href="{{route('admin.image.color.add', ['image_id' => $value->id,'product_id'=> $product_id])}}">Thêm &#8921;</a></td>
                    <td><a href="{{route('admin.image.color.list', ['image_id' => $value->id,'product_id'=> $product_id])}}">Xem &#8921;</a></td>
                    <td>{{$value->created_at}}</td>
                    <td>
                        <a href="{{ route('admin.image.destroy', ['product_id'=> $value->product_id,
                                                                    'id' => $value->id] ) }}">Xóa</a>
                    </td>
                </tr>


                @endforeach
                @else
                <tr>
                    <td colspan="7">Không có ảnh nào</td>
                </tr>
                @endif

            </table>
        </div>
    </div>
</section>

</body>

</html>