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
                <th>Trạng thái</th>
            </thead>
            <tbody>
                @if(!empty($datasOrder))
                @foreach($datasOrder as $keyOrder => $order)

                <tr>
                    <td colspan="5"><b>ID Đơn hàng : {{$keyOrder}}</b></td>
                    @php
                    $rowspan = $order['order']->numberProductInOrder+3;
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


                @if(!empty($order['details']))
                @foreach($order['details'] as $detail)

                <tr style="text-align : center">
                    <td><img style="height: 50px;width: 30px;" src="{{asset('storage/'.$detail->img)}}" alt=""></td>
                    <td style="text-align: left; padding: 20px;">
                        <p style="font-size: larger;">{{ $detail->nameProduct }}</p>
                        <span>Màu: </span>
                    </td>

                    <td>{{$detail->amount}}</td>
                    <td>{{ number_format($detail->price) }} VND</td>
                    <td>{{ number_format($detail->price*$detail->amount) }} VND</td>

                </tr>
                @endforeach
                @endif
                <tr>
                    <td colspan="3">
                        <h3><i>Tổng:</i></h3>
                    </td>
                    <td>
                    <td style="text-align: center;"><b>{{number_format($order['order']->total) }} VND</b></td>
                    </td>
                </tr>
                <tr>
                    <td style="height: 20px;"></td>
                </tr>



                @endforeach
                @endif
            </tbody>
        </table>
    </div>

</section>

@include('client.footer.footer')

@if(!empty($datas))
@foreach($datas as $keyP => $parent)
<li class="list-item">

    <a href="">{{$parent['name']}}</a>
    <ul class="submenu">
        @php
        $count=0;
        @endphp
        @while(!empty($parent[$count]))
        <li class="item-li">
            <a href="{{ route('client.getCartegory',['slug' => $parent[$count]['slug']] ) }}">{{ $parent[$count++]['name'] }}</a>
        </li>
        @endwhile
    </ul>
</li>
@endforeach
@endif