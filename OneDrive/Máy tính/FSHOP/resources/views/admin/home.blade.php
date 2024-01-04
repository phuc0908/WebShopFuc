@include('admin.layouts.header')

<h1>Trang thống kê</h1>
</header>
<section class="admin-container">
    <style>
        div.row {
            width: 90%;
            height: 200px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .jus {
            display: flex;
            align-items: center;
            justify-content: center;
            width: auto;
            height: 100px;
        }

        .ofjus {
            font-size: 50px;
        }

        .ofjus.income {
            font-size: 30px;
        }

        div.infor {
            border-radius: 15px;
            border: solid 1px black;
            width: 300px;
            height: 150px;
            padding: 10px;
            margin: 0 40px;
        }
    </style>

    @include('admin.layouts.sideBar')

    <div style="width: 200px; height: 100vh"></div>
    <div class="admin-container-right" style="padding: 100px 20px;">
        <div class="admin-container-type-add">

            <!-- A ROW -->

            <h1><i>Doanh thu</i></h1>

            <div class="row">
                <div class="infor">
                    <p>Doanh thu tháng</p>
                    <div class="jus">
                        @if(!empty($totalIncome))
                        <h1 class="ofjus income">{{number_format($totalIncome)}}</h1>
                        @endif
                    </div>
                </div>
                <div class="infor">
                    <p>Doanh thu dự kiến đạt được</p>
                    <div class="jus">
                        <h1 class="ofjus income">{{number_format(20000000)}}</h1>
                    </div>
                </div>

                <div class="infor">
                    <p>Tổng doanh thu </p>
                    <div class="jus">
                        @if(!empty($totalIncome))
                        <h1 class="ofjus income">{{number_format($totalIncome)}}</h1>
                        @endif
                    </div>
                </div>

            </div>

            <!-- A ROW -->
            <h1><i>Đơn hàng</i></h1>
            <div class="row">
                <div class="infor order">
                    <p>Số đơn hàng đã xác nhận</p>
                    <div class="jus">
                        @if(!empty($verifiedOrder))
                        <h1 class="ofjus">{{$verifiedOrder}}</h1>
                        @endif
                    </div>
                </div>
                <div class="infor order">
                    <p>Số đơn hàng chưa xác nhận</p>
                    <div class="jus">
                        @if(!empty($unverifiedOrder))
                        <h1 class="ofjus">{{$unverifiedOrder}}</h1>
                        @endif
                    </div>
                </div>
                <div class="infor order">
                    <p>Số khách hàng đã đặt hàng</p>
                    <div class="jus">
                        @if(!empty($orderedUser))
                        <h1 class="ofjus">{{$orderedUser}}</h1>
                        @endif
                    </div>
                </div>
            </div>
            <!-- A ROW -->
            <h1><i>Sản phẩm</i></h1>
            <div class="row">
                <div class="infor product">
                    <p>Tổng loại sản phẩm có trên cửa hàng</p>
                    <div class="jus">
                        @if(!empty($numberOfProduct))
                        <h1 class="ofjus">{{$numberOfProduct}}</h1>
                        @endif
                    </div>
                </div>
                <div class="infor product">
                    <p>Số lượng sản phẩm được đặt </p>
                    <div class="jus">
                        @if(!empty($amountOfOrderedProduct))
                        <h1 class="ofjus">{{$amountOfOrderedProduct}}</h1>
                        @endif
                    </div>
                </div>

            </div>
            <!-- A ROW -->
            <h1><i>Người dùng</i></h1>
            <div class="row">
                <div class="infor product">
                    <p>Số khách hàng đã đăng ký</p>
                    <div class="jus">
                        @if(!empty($numberOfRegister))
                        <h1 class="ofjus">{{$numberOfRegister}}</h1>
                        @endif
                    </div>
                </div>

            </div>




        </div>
    </div>
</section>
</body>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

</html>