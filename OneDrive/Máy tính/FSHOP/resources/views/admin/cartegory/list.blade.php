@include('admin.layouts.header')

<h1>Danh Sách Danh Mục</h1>
</header>
<section class="admin-container">

    @include('admin.layouts.sideBar')

    <style>
        td {

            white-space: nowrap;
        }

        .detail {
            padding: 7px 0 0 10px;
        }

        .detail:hover {
            color: rgb(64, 72, 119);
            background: rgb(171, 219, 230);
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
                    <th>Slug</th>
                    <th>Danh Mục Cha</th>
                    <th>Ngày Tạo</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Tùy Biến</th>
                </tr>
                @if(!empty($data))
                @foreach ($data as $key => $value)
                <a href="{{ route('admin.cartegory.detail',['id' => $value->id]) }}">
                    <tr>

                        <td>{{$key+1}}</td>
                        <td>{{$value->id}}</td>
                        <td class="parent" style="padding: 0;">
                            <a class="detail" style="display: block ;height: 100%;" href=" {{ route('admin.cartegory.detail',['id' => $value->id]) }}">
                                {{$value->name}}
                            </a>
                        </td>
                        <td>{{$value->slug}}</td>
                        <td>{{$value->parent_id}}</td>
                        <td>{{$value->created_at}}</td>
                        <td>{{$value->updated_at}}</td>
                        <td><a href="{{ route('admin.cartegory.edit', ['id' => $value->id]) }}">Sửa</a> |
                            <a href="{{ route('admin.cartegory.destroy', ['id' => $value->id]) }}">Xóa</a>
                        </td>
                    </tr>
                </a>

                @endforeach
                @else
                <tr>
                    <td colspan="7">Không có danh mục nào</td>
                </tr>
                @endif

            </table>
        </div>
    </div>
</section>

</body>

</html>