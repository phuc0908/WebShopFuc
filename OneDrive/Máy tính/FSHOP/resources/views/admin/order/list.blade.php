<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/css/admin/style.css" />

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>

<body>

    <header style="position: fixed;
          top: 0;
          left: 0;
          z-index: 99;
          background-color: gray;">
        <h1>Danh Sách Đơn Hàng</h1>
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
        </style>

        <div class="admin-container-right">
            <div class="admin-container-type-list">

                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Tên Khách Hàng</th>
                        <th>Địa Chỉ</th>
                        <th>Ngày Tạo Đơn Hàng</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
                        <th>Tùy Biến</th>
                    </tr>
                    @if(!empty($data))
                    @foreach ($data as $key => $value)
                    <tr>
                        <td>{{$key}}</td>
                        <td><a href="">F_SHOP_{{$value->id}}</a></td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->address}}</td>
                        <td>{{$value->created_at}}</td>
                        <td>{{number_format($value->total)}} VND</td>
                        <td>Đang chờ xác nhận</td>
                        <td>Sửa | Xóa</td>
                    </tr>
                    @endforeach
                    @endif

                </table>
            </div>
        </div>
    </section>

</body>

</html>