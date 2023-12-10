@include('client.header.header1')
<link rel="stylesheet" href="/css/client/index.css" />
@include('client.header.header2')
<style>
    .top-container {
        padding: 120px 0 25px 0;
        width: 100vw;
    }

    .container {
        display: block;
    }

    .top-container ul {
        display: flex;
    }

    .top-container ul li {
        padding-right: 20px;
        padding-left: 20px;
    }

    .top-container ion-icon {
        margin-top: 5px;
    }

    .top-container li a:hover {
        color: rgb(172, 47, 51);
    }

    .maincontent {
        text-align: center;
    }
</style>

<section class="container">
    <div class="top-container">
        <ul>
            <li><a href="{{ route('client.index') }}">Trang Chủ</a></li>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <li><a href="product_all.php">Tất cả sản phẩm</a></li>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            @if(!empty($cate_name))
            <li>
                <a Áo href="index.php">
                    {{$cate_name}}
                </a>
            </li>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            @endif

        </ul>
    </div>
    <div class="maincontent" id="id-content">
        @if(!empty($dataProduct))
        @foreach($dataProduct as $value)
        <div class="list__product">
            <a href="{{ route('client.product', ['id'=>$value->id]) }}">
                <div>
                    <img src="{{asset('storage/'.$value->img)}}" alt="Error">
                </div>
                <p>
                    <span>{{$value->name}}</span>
                    <br />
                    <span class="price"> {{ number_format($value->price_final,3) }} VND</span>
                </p>
            </a>
        </div>
        @endforeach
        @else
        <div style="height: 40vh;width: 100vw;display: flex;justify-content: center; align-items: center;">
            <h1 sty>Không có sản phẩm nào thuộc danh mục mà bạn chọn</h1>
        </div>
        @endif
    </div>
</section>

@include('client.footer.footer')