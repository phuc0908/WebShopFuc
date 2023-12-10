@include('admin.layouts.header')

<h1>Thêm Màu</h1>
</header>
<section class="admin-container">

    @include('admin.layouts.sideBar')

    <div style="width: 200px; height: 100vh"></div>
    <div style="padding: 140px 0 0 10px;" class="admin-container-right">

        <!-- ALERT -->
        <style>
            /* The alert message box */
            .alert {
                padding: 20px;
                background-color: rgb(46, 184, 134);
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

        <!-- LST -->
        <label for="">Chọn Màu</label>
        <div class="admin-container-type-list">

            <form action="" method="POST" style="width: 100%;">
                @csrf
                <!--  -->
                <table class="addform">
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Mã Màu</th>
                        <th>Ngày Tạo</th>
                        <th>Ngày Cập Nhật</th>
                        <th>Tùy Biến</th>
                    </tr>

                    @if(!empty($colors))
                    @foreach ($colors as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->code_color}}</td>
                        <td>{{$value->created_at}}</td>
                        <td>{{$value->updated_at}}</td>
                        <td> <input style="width: 20px;" type="checkbox" name="color[{{$key}}]" value="{{$value->id}}" />
                        </td>
                    </tr>

                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">Không có dữ liệu nào</td>
                    </tr>
                    @endif
                    <button style="position: absolute; top:-50px;right: 10px;" class="addbutton" type="submit" name="submit">Thêm</button>
                    <a style="position: absolute; top:400px;color:coral" href="
                {{ route('admin.product.color.list',['product_id'=> $product_id ]) }}">Xem danh sách color &#10152;</a>
            </form>

        </div>
    </div>
</section>
</body>

</html>