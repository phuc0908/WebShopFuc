@include('client.header.header1')
<link rel="stylesheet" href="/css/client/cart.css" />
@include('client.header.header2')
<style>
    thead {
        position: sticky;
        top: 0;

    }

    thead tr {
        background: white;
    }

    .is-form,
    .input-qty {
        height: 30px;
    }
</style>

<section class="container">
    <div class="top-container">
        <ul>
            <li><a href="{{ route('client.index') }}">Trang Chủ</a></li>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <li><a href="{{ route('client.cart') }}">Giỏ Hàng</a></li>
        </ul>
    </div>

    <div class="center-container">
        <div class="left-container" style="overflow-y: auto; ">
            <table border="0" class="table-bill">
                <thead>
                    <tr>
                        <th colspan="2">Sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Số Lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($list))
                    @foreach($list as $product)

                    @if(!empty($product))
                    @foreach($product as $color)

                    @if(!empty($color))
                    @foreach($color as $size)

                    <tr class="one-product">
                        <td class="img-product">
                            <a href="{{ route('client.product', ['id'=>$size['product_id']]) }}">
                                <img src="{{ $size['image'] }}" alt="" />
                            </a>
                        </td>
                        <td class="name-product">
                            <div class="info-product">
                                <h1>{{$size['product_name']}}</h1>
                                <p>Màu sắc: {{$size['color_name']}}</p>
                                <p>Size : {{$size['size_name']}}</p>
                            </div>
                        </td>
                        <td class="price-product">
                            <span class="price" style="font-size: smaller;"> {{ number_format($size['price']) }} VND</span>

                        </td>
                        <td class="quantity-product" style="text-align: center;">
                            <span class="small" style="font-size: smaller;"> {{ $size['quantity'] }}</span>
                            <!-- <form action="" class="buttons_added" style="position: relative; top: 33px; ">
                                <input class=" minus is-form" type="button" value="-" />
                                <input aria-label="quantity" class="input-qty" max="200" min="1" name="" type="number" value="1" />
                                <input class="plus is-form" type="button" value="+" />
                            </form> -->
                        </td>
                        <td class="total-product">
                            <span disabled>{{ number_format($size['sum_price']) }} VND</span>
                        </td>
                        <td class="col-last" style="display: flex;">
                            <span class="deleteProduct" style="cursor: pointer;" onclick="hideGrandparent()">
                                <a href="{{ route('client.cart.destroy',[$size['product_id'],$size['color_id'],$size['size_id'] ]) }}">&times;</a>
                            </span>

                        </td>
                    </tr>
                    @endforeach
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @else
                    <div style="width: 300px;;position:relative;top:100px;left: 400px;z-index: 0;">Chưa có sản phẩm trong giỏ</div>
                    @endif

                    <!-- end -->
                </tbody>

            </table>
        </div>

        <div class="right-container">
            <div class="bill">
                <div class="cart-product">
                    <h1 style="margin: 0 0 30px 0;">Tóm Tắt Đơn Hàng</h1>
                    <div>
                        <p>Số loại sản phẩm</p>
                        @if(!empty($total_type))
                        <p>{{$total_type}}</p>
                        @endif
                    </div>
                    <div>
                        <p>Tổng sản phẩm</p>
                        @if(!empty($total_quantity))
                        <p>{{$total_quantity}}</p>
                        @endif
                    </div>
                    <div>
                        <p>Tổng tiền hàng</p>
                        @if(!empty($total_price))
                        <p class="total-all-product">{{ number_format($total_price) }} VND</p>
                        @endif
                    </div>
                    <div>
                        <p>Giảm Voucher</p>
                        @if(!empty($total_price))
                        <p class="voucher">0 VND</p>
                        @endif
                    </div>
                    <div>
                        <p>Phí vận chuyển</p>
                        @if(!empty($total_price))
                        <p class="transport-fee">45,000 VND</p>
                        @endif
                    </div>
                    <div>
                        <p>Tiền Thanh Toán</p>
                        @if(!empty($total_price))
                        <p class="total-bill">{{ number_format($total_price-45000) }} VND</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="btn-cart">
                <a href="{{ route('client.pay') }}">
                    <h1>Thanh Toán</h1>
                </a>
            </div>
        </div>
    </div>
</section>
<script src="/js/cart_event.js"></script>
<script>
    function hideGrandparent() {
        var button = event.target;
        var parentElement = button.parentElement;
        var grandparentElement = parentElement.parentElement;
        var godparentElement = grandparentElement.parentElement;
        godparentElement.style.display = 'none';
    }
</script>
<script>
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // })
    $("input:radio[type=radio]").click(function() {

    });
</script>
@include('client.footer.footer')