@include('client.header.header1')
<link rel="stylesheet" href="/css/client/page_purched.css" />
<!-- <link rel="stylesheet" href="/css/client/cart.css" /> -->
@include('client.header.header2')
<style>
    span.error {
        color: #f44336;
        font-size: smaller;
    }
</style>
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

                <div class="jus">
                    <div class="address_ship">
                        <h3>Thông tin khách hàng</h3>

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
                            <!-- <li>
                           
                            <input type="hidden" name="address" value="{{$inforMySelf->address." / ".$inforMySelf->nameWard." / ".$inforMySelf->nameDistrict." / ".$inforMySelf->nameProvince}}">
                        </li> -->
                        </ul>
                    </div>

                    <div class="address_ship">
                        <h3>Địa Chỉ Giao Hàng</h3>

                        <ul style="
                                    border: 1px solid #cccc;
                                    padding: 20px 0 20px 0;
                                    margin: 15px;
                                    border-radius: 4px; ">
                            <li class="formMyAddress">
                                <div style=" display: flex;align-items: center;margin: 0 0 20px 0;">

                                    <input class="addressRadio" checked type="radio" name="addressRadio" value="0" {{ old("addressRadio") == 0 ? 'checked' : '' }}>

                                    <span style="padding: 0 20px;">Địa chỉ trong tài khoản của bạn</span>

                                </div>
                                <p>
                                    <b>Đia Chỉ</b> :{{$inforMySelf->address." / ".$inforMySelf->nameWard." / ".$inforMySelf->nameDistrict." / ".$inforMySelf->nameProvince}}
                                </p>

                                <input type="hidden" name="myAddress" value="{{$inforMySelf->address." / ".$inforMySelf->nameWard." / ".$inforMySelf->nameDistrict." / ".$inforMySelf->nameProvince}}">
                            </li>
                        </ul>
                    </div>
                </div>



                <div class="function_ship">
                    <h3>Phương Thức Giao Hàng</h3>
                    <ul>
                        <li class="form-li" style="
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

                        <li class="form-li">
                            <p>
                                <i class="fa-solid fa-circle-check"></i>
                                Tôi đồng ý với
                                <a href="" style="text-decoration: underline">chính sách giao vận chuyển
                                </a>
                                của Fshop
                            </p>
                        </li>

                        <li class="form-li" style="
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

            <div class="otherAddress">
                <div style="display: flex;align-items: center;">
                    <input type="radio" name="addressRadio" class="addressRadio" value="1" {{ old("addressRadio") == 1 ? 'checked' : '' }}>
                    <span style=" padding: 0 20px;">Địa chỉ khác</span>
                </div>

                <div class="selectAddress">
                    <div class="infor_customer">
                        <label for="">Tỉnh/TP</label> <br />
                        <select name="provinces" id="provinces">
                            <option selected disabled value="">-------</option>
                            @if(!empty($provinces))
                            @foreach($provinces as $v)
                            <option value="{{$v->code}}">{{$v->name}}</option>

                            @endforeach
                            @endif
                        </select><br>
                        <span class="error">
                            @error('provinces')
                            {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="infor_customer">
                        <label for="">Quận/Huyện</label><br />
                        <select name="districts" id="districts">
                            <option selected disabled value="">-------</option>
                        </select><br>
                        <span class="error">
                            @error('districts')
                            {{$message}}
                            @enderror
                        </span>
                    </div>

                    <div class="infor_customer">
                        <label for="">Phường/Xã</label><br />
                        <select name="wards" id="wards">
                            <option selected disabled value="">-------</option>
                        </select><br>
                        <span class="error">
                            @error('wards')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="infor_customer">
                        <label for="">Địa Chỉ</label><br />
                        <input type="text" name="address" id="" placeholder="Địa chỉ..." value="{{ old('address') }}" /><br>
                        <span class="error">
                            @error('address')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <div class="function_purched">
                <h3>Phương Thức Thanh Toán</h3>
                <ul style="
                                border: 1px solid #cccc;
                                padding: 20px 0 ;
                                margin: 15px;
                                border-radius: 4px;
                            ">

                    <li style="height: 10px;">
                        <p>Chọn phương thức giao hàng (Hiện tại chúng tôi chưa có phương thức thanh toán qua ngân hàng và thẻ tín dụng)</p>
                    </li>
                    <li style="height: 2px;">
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

<script>



</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/js/jqueryAddress.js"></script>
<script src="/js/purched.js"></script>

@include('client.footer.footer')