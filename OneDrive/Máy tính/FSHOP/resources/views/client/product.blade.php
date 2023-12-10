@include('client.header.header1')
<link rel="stylesheet" href="/css/client/product.css" />
@include('client.header.header2')
<style>
    div.pic-product div {
        height: 544px;
        -ms-overflow-style: none;
        /* khai báo sử dụng Internet Explorer, Edge */
        scrollbar-width: none;
        /* sử dụng Firefox */
        overflow-y: scroll;
    }

    div.pic-product div::-webkit-scrollbar {
        display: none;
        /* cho Chrome, Safari, and Opera */
    }

    div.pic-product ul li img {
        width: 60px;
        height: 100px;
        object-fit: contain;
    }

    input[type="text"].color {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        cursor: pointer;
    }

    .alert.u {
        z-index: 99;
        padding: 20px;
        background-color: rgb(71, 168, 245);
        /* Blue */
        color: white;
        margin-bottom: 15px;
    }

    .alert.d {
        z-index: 99;
        padding: 20px;
        background-color: #f44336;
        /* Blue */
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
<section class="container">
    @if (session('alertErr'))
    <div class="alert d" style="width: 100%;position: absolute;top:0">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{ session('alertErr') }}
    </div>

    @endif
    @if(!empty($data))
    @foreach($data as $value)
    <div class="top-container" style="position: absolute;top: 10px;">
        <ul>

            <li><a href="{{ route('client.index') }}">Trang Chủ</a></li>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <li><a href="">Tất cả sản phẩm</a></li>
            <ion-icon name="chevron-forward-outline"></ion-icon>
            <li>
                <a href="">{{$value->name}} </a>
            </li>
        </ul>
    </div>


    <form class="center-container" action="{{ route('client.product.addCart' , ['id'=>$value->id]) }}" method="post" style="margin-top: 140px;">
        <div class="pic-product" style="display: flex;">
            <div>
                <ul>
                    @if(!empty($imgs))
                    @foreach($imgs as $key => $img)
                    <!-- List Image -->
                    <li> <img class="image[{{$key}}]" {{'onclick=changeIMG('.$key.')'}} id="{{$key}}" src="{{asset('storage/'.$img->value)}}" alt="Error" /></li>

                    @endforeach
                    @endif
                </ul>
            </div>
            <img id="main-img" style="margin-left: 100px; object-fit: contain;" src="{{asset('storage/'.$value->img)}}" alt="Error" />
            <!-- <img src="../../img/aophongdung.jpg" alt="" class="pic-two" /> -->
        </div>

        <div class="infor-product">
            @csrf
            <h1>{{$value->name}}</h1>
            <p>
                <i class="fa-solid fa-star" style="color: #eeb256"></i>
                <i class="fa-solid fa-star" style="color: #eeb256"></i>
                <i class="fa-solid fa-star" style="color: #eeb256"></i>
                <i class="fa-solid fa-star" style="color: #eeb256"></i>
                <i class="fa-solid fa-star" style="color: #eeb256"></i>
                <img src="/favicon.ico" alt="">
                <span>(0 Đánh Giá)</span>
            </p>
            <h2>
                <span class="price">{{ number_format($value->price_final,3) }} VND</span>
                <strike class="price" style="font-size: 16px">{{ number_format($value->price,3) }} VND</strike>

            </h2>

            <span style="font-weight: 600;">Màu Sắc :
                @if(!empty($colors))
                @foreach($colors as $key => $color)
                <span class="color_name" style="display: none;">{{$color->name}}</span>
                @endforeach
                @endif
            </span>

            <div>
                @if(!empty($colors))
                @foreach($colors as $key => $color)
                <?php
                echo "<input type='text' class='color' style=' background-color:" . $color->code_color . "'/>"
                ?>
                <input type="radio" style="display: none;" value="{{$color->color_id}}" name="color_id" class="color_id" />
                <input type="radio" style="display: none;" value="{{asset('storage/'.$color->value)}} " name="img_id" class="img_id" />
                @endforeach
                @endif
            </div>

            <div>
                @if(!empty($sizes))
                @foreach($sizes as $key => $size)
                <span class="size-product">{{$size->name}}</span>
                <input style="display: none;" type="radio" name="size_id" class="size_id" value="{{$size->size_id}}">
                @endforeach
                @endif
            </div>

            <div class="buttons_added">
                <label for="" style="margin: 3px 8px 0 0">Số Lượng</label>
                <input class="minus is-form" type="button" value="-" />
                <input aria-label="quantity" class="input-qty" name="quantity" type="number" value="1" max="20" min="1" />
                <input class="plus is-form" type="button" value="+" />
            </div>

            <div class="trade">
                <button type="submit" class="add">
                    <h4>Thêm Vào Giỏ</h4>
                </button>
            </div>

        </div>
    </form>

    <!-- Introduce -->
    <style>
        div.container-description {
            width: 100%;
            padding: 100px 35px;

        }

        div.description {
            background: rgb(204, 204, 204);
            padding: 10px;
            margin-top: 40px;
        }
    </style>

    <div class="container-description">
        <h1>Chi tiết sản phẩm</h1>
        <div class="description">
            {!!$value->description!!}
        </div>

    </div>
    @endforeach
    @endif
    <!-- chưa có -->
</section>
<script src="/js/product.js"></script>
<script>
    function changeIMG(id) {
        let path = document.getElementById(id).getAttribute("src");
        document.getElementById("main-img").setAttribute("src", path);
    }
</script>

@include('client.footer.footer')