@include('client.header.header1')
<link rel="stylesheet" href="/css/client/index.css" />
@include('client.header.header2')

<div class="slider">
    <img src="img/slider_4.jpg" />
</div>
<section class="container">
    <div class="sidebarone">
        @if(!empty($datas))
        @foreach($datas as $keyP => $parent)
        <li>

            <a href="#">{{$parent['name']}}</a>
            <ul>
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
                    <span class="price">{{ number_format($value->price_final) }} VND</span>
                </p>
            </a>
        </div>
        @endforeach
        @endif

    </div>
</section>

@include('client.footer.footer')