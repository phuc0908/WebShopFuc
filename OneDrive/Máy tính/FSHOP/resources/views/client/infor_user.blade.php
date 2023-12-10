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
<section class="container" style="padding: 120px 0 0 0;height: 640px;">
    <div class="left-container">
        <ul>
            <li style="font-weight: bold">
                <span><ion-icon name="person-circle"></ion-icon></span>Thông tin
                tài khoản
            </li>
            <li>
                <form action="{{route('client.auth.logout')}}" method="post">
                    @csrf
                    <button type="submit"> <span><ion-icon name="log-out"></ion-icon></span>Đăng xuất</button>
                </form>
            </li>
        </ul>
    </div>
    <div class="right-container">
        <div class="right-con top">
            @if(!empty($infor))
            @foreach($infor as $value)
            <div>
                <h3>Thông tin tài khoản</h3>
                <p>Tên Đăng Nhập : {{$value->username}} </p>
                <p>Email : {{$value->email}}</p>
                <p>Điện thoại : {{$value->phone}}</p>
            </div>
        </div>
        <div class="right-con bot">
            <h3>Địa chỉ nhận hàng</h3>
            <div>
                <p>Tên : {{$value->name}}</p>
                <p>Địa chỉ : {{$value->address." / ".$value->nameWard." / ".$value->nameDistrict." / ".$value->nameProvince}}</p>
                <p>Điện thoại : {{$value->phone}}</p>
            </div>
        </div>
        @endforeach
        @else
        <div>
            <h3>Thông tin tài khoản</h3>
            <p>Tên Đăng Nhập :</p>
            <p>Email :</p>
            <p>Điện thoại :</p>
        </div>
    </div>
    <div class="right-con bot">
        <h3>Địa chỉ nhận hàng</h3>
        <div>
            <p>Tên :</p>
            <p>Địa chỉ:</p>
            <p>Điện thoại :</p>
        </div>
    </div>
    @endif
    </div>
</section>

@include('client.footer.footer')