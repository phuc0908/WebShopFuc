@include('admin.layouts.header')

<h1>Danh Sách màu</h1>
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
                    <th>STT</th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Mã Màu</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Tùy Biến</th>
                </tr>

                @if(!empty($data))
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->color_id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->code_color}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>
                        <a href="{{ route('admin.product.color.destroy', ['product_id' => $value->product_id, 'color_id' => $value->color_id]) }}">Xóa</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8">Không có màu nào của sảm phẩm này</td>
                </tr>
                @endif

            </table>
            <a style="position: absolute; top:400px;color:coral" href="
                {{ route('admin.product.list') }}">Quay về danh sách sản phẩm &#10152;</a>
        </div>
    </div>
</section>

</body>

</html>