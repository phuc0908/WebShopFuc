@include('client.header.header1')
<link rel="stylesheet" href="/css/client/page_purched.css" />
<!-- <link rel="stylesheet" href="/css/client/cart.css" /> -->
@include('client.header.header2')
<section class="container">
    <div class="top-container">
        <ul>
            <li><a href="{{ route('client.index') }}">Trang Chủ</a></li>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <li><a href="{{ route('client.pay') }}">Trang Thanh Toán</a></li>
        </ul>
    </div>
    @if(!empty($inforMySelf) && !empty(session('cart')) )
    <h1 style="font-weight: 900; margin-bottom: 30px; margin-left: 30px">
        Đặt Hàng
    </h1>
    <form class="center-container" method="post" action="{{route('client.payOrder')}}">
        @csrf
        <div class="purched">
            <div class="infor_purched">
                <div class="address_ship">
                    <h3>Địa Chỉ Giao Hàng</h3>

                    <ul style="
                                    border: 1px solid #cccc;
                                    padding: 20px 0 20px 20px;
                                    margin: 15px;
                                    border-radius: 4px;
                                ">
                        <li>
                            <b>{{$inforMySelf->name}}</b>
                            <b style="color: #ef660b; margin-left: 20px">Cơ Quan / Nhà Riêng</b>
                        </li>
                        <li>
                            <p>Điện Thoại : {{$inforMySelf->phone}}</p>
                        </li>
                        <li>
                            <p>
                                Đia Chỉ :{{$inforMySelf->address." / ".$inforMySelf->nameWard." / ".$inforMySelf->nameDistrict." / ".$inforMySelf->nameProvince}}
                            </p>
                            <input type="hidden" name="address" value="{{$inforMySelf->address." / ".$inforMySelf->nameWard." / ".$inforMySelf->nameDistrict." / ".$inforMySelf->nameProvince}}">
                        </li>
                    </ul>

                </div>

                <div class="function_ship">
                    <h3>Phương Thức Giao Hàng</h3>
                    <ul>
                        <li style="
                                        border: 1px solid #cccc;
                                        padding: 20px 0 20px 20px;
                                        margin: 15px;
                                        border-radius: 4px;
                                    ">
                            <p>
                                <i class="fa-solid fa-circle-check"></i>
                                Chuyển Phát Nhanh
                            </p>
                            <p>
                                Thời gian giao hàng dự kiến : {{$datenow}}
                            </p>
                        </li>

                        <li style="
                                        border: 1px solid #cccc;
                                        padding: 20px 0 20px 20px;
                                        margin: 15px;
                                        border-radius: 4px;
                                    ">
                            <p>
                                <i class="fa-solid fa-circle-check"></i>
                                Tôi đồng ý với
                                <a href="" style="text-decoration: underline">chính sách giao vận chuyển
                                </a>
                                của Fshop
                            </p>
                        </li>

                        <li style="
                                        border: 1px solid #cccc;
                                        padding: 20px 0 20px 20px;
                                        margin: 15px;
                                        border-radius: 4px;
                                    ">
                            <p>
                                <i class="fa-solid fa-circle-check"></i>
                                Tôi đã ra soát và xác nhận thông tin chi
                                tiết về giao dịch này
                            </p>
                        </li>
                    </ul>
                </div>
            </div>



            <div class="function_purched">
                <h3>Phương Thức Thanh Toán</h3>
                <ul style="
                                border: 1px solid #cccc;
                                padding: 20px 0 20px 20px;
                                margin: 15px;
                                border-radius: 4px;
                            ">
                    <li>
                        Mọi giao dịch đều được bảo mật và mã hóa. Thông
                        tin thẻ tín dụng sẽ không bao giờ được lưu lại
                    </li>

                    <li>
                        <i class="fa-solid fa-circle-check"></i>
                        <label for="">Thanh toán khi giao hàng</label>
                    </li>
                </ul>
            </div>
        </div>

        <div class="bill_purched">
            <div class="bill">
                <div class="infor_bill" style="width: 100%;">
                    <h3>Tóm tắt đơn hàng</h3>
                    <table style="width: 100%;">
                        <tr>
                            <td>Tổng sản phẩm:</td>
                            <td>{{$total_quantity}}</td>
                        </tr>
                        <tr>
                            <td>Tổng tiền hàng:</td>
                            <td>{{number_format($total_price)}} VND</td>
                        </tr>
                        <tr>
                            <td>Giảm Voucher:</td>
                            <td>0 VND</td>
                        </tr>
                        <tr>
                            <td>Phí vận chuyển:</td>
                            <td>45,000 VND</td>
                        </tr>
                        <tr>
                            <td>
                                Tiền thanh toán:</td>
                            <td>{{number_format($total_price-45000)}} VND</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="btn-order" style="padding: 0;">
                <button type="submit" style="width: 100%;background-color: rgb(51, 51, 51);border: none;color:aliceblue;cursor: pointer;height: 100%;">
                    <h1>Đặt Hàng</h1>
                </button>
            </div>
        </div>
    </form>
    @else
    <div style="height: 400px; display: flex;justify-content: center; align-items: center;">Bạn chưa đăng nhập hoặc chưa có sản phẩm trong giỏ hàng</div>
    @endif
</section>

@include('client.footer.footer')