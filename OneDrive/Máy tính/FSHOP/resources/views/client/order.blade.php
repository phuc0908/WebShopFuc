@include('client.header.header1')
<link rel="stylesheet" href="/css/client/infor_user.css" />
<!-- <link rel="stylesheet" href="/css/client/index.css" /> -->
@include('client.header.header2')
<style>
    form {
        height: 30px;
        width: 150px;
    }

    button {
        height: 100%;
        width: 100%;
        background: white;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    button:hover {
        background: gray;
    }
</style>
<section class="container" style="padding: 120px 0 0 0;height: 690px;background-color: white;">

    <div class="left-container">
        <ul>
            <li style="font-weight: 100">
                <a href="{{route('client.auth.infor')}}"><span><ion-icon name="person-circle"></ion-icon></span>Thông tin
                    tài khoản</a>
            </li>
            <li style="font-weight: bold">
                <span><ion-icon name="cart"></ion-icon></span>Đơn hàng của bạn
            </li>
            <li>
                <form action="{{route('client.auth.logout')}}" method="post">
                    @csrf
                    <button type="submit"> <span><ion-icon name="log-out"></ion-icon></span>Đăng xuất</button>
                </form>
            </li>
        </ul>
    </div>

    <div class="right-container" style="overflow-y: auto; position: relative;padding: 0;">
        <table style="width: 90%;font-size: smaller;">
            <thead style="position: sticky; top: 0; background-color: white">
                <th colspan="2">Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
                <th style="width: 100px;">Trạng thái</th>
            </thead>
            <tbody>
                @if(!empty($datasOrder))
                @foreach($datasOrder as $keyOrder => $order)

                <tr>
                    <td colspan="4"><b>ID Đơn hàng : {{$keyOrder}}</b></td>
                    <td colspan="2"><b><i>Địa chỉ : </i></b>{{$order['order']->address}}</td>

                </tr>

                <tr>
                    <td colspan="5"></td>
                    @php
                    $rowspan = $order['order']->numberProductInOrder+5;
                    @endphp
                    @if($order['order']->state==0)
                    <td rowspan="{{$rowspan }}" style="text-align: center;color: blue;">
                        Đang chờ xác nhận
                    </td>
                    @elseif($order['order']->state==1)
                    <td rowspan="{{$rowspan}}" style="text-align: center;color: green;">
                        Đã xác nhận
                    </td>
                    @else
                    <td rowspan="{{$rowspan}}" style="text-align: center;color: red;">
                        Đã hủy
                    </td>
                    @endif
                </tr>
                <tr>
                    <td colspan="6">
                        <hr>
                    </td>
                </tr>
                @php
                $totalAmount = 0 ;
                @endphp


                @if(!empty($order['details']))
                @foreach($order['details'] as $detail)

                <tr style="text-align : center">
                    <td><img style="height: 100px;object-fit: contain;" src="{{asset('storage/'.$detail->img)}}" alt=""></td>
                    <td style="text-align: left; padding: 20px;">
                        <p style="font-size: larger;font-weight: 600;">{{ $detail->nameProduct }}</p>
                        <span>Màu: {{$detail->nameColor}} </span><br>
                        <span>Size: {{$detail->nameSize}} </span>
                    </td>

                    @php
                    $totalAmount+=$detail->amount ;
                    @endphp

                    <td>{{$detail->amount}}</td>
                    <td>{{ number_format($detail->price) }} VND</td>
                    <td>{{ number_format($detail->price*$detail->amount) }} VND</td>

                </tr>
                @endforeach
                @endif
                <tr>
                    <td colspan="2">
                        <h3>Tổng:</h3>
                    </td>
                    <td colspan="1" style="text-align: center;">
                        {{$totalAmount}}
                    </td>

                    <td>
                    <td style="text-align: center;"><b style="font-weight: 400;"><i>{{number_format($order['order']->total) }} VND</i></b></td>
                    </td>
                </tr>
                <tr style="background-color: rgb(240, 240, 240);">
                    <td colspan="3" style="border-collapse: collapse;">
                        <h3><i>Thành tiền</i></h3>
                    </td>

                    <td style="text-align: center;"><b style="font-weight: 400;">+ <i>{{number_format(45000) }} VND</i></b></td>

                    <td style="text-align: center;"><i><b>{{number_format($order['order']->total+45000) }} VND</b></i></td>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="height: 40px;"></td>
                </tr>



                @endforeach
                @endif
            </tbody>
        </table>
    </div>

</section>

@include('client.footer.footer')