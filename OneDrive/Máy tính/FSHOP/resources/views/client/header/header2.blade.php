</head>

<body>
    <header>
        <div class="head_left">
            <ul class="list-icon">
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

                <li class="list-item">
                    <a href="#">BỘ SƯU TẬP</a>
                </li>
                <li class="list-item">
                    <a href="#">VỀ CHÚNG TÔI</a>

                </li>
            </ul>
        </div>


        <style>
            .icon-search {
                border: none;
                background-color: white;
                cursor: pointer;
                height: 90%;
            }
        </style>


        <div class="head_center">
            <a href="{{ route('client.index') }}">
                <img src="/img/logo_P_1.png" alt="logo" />
            </a>
        </div>
        <div class="head_right">
            <form style="display: flex;align-items: center;" method="post" action="{{route('client.search')}}">
                @csrf
                <input class="input-search" type="text" placeholder="search" name="nameProduct" />
                <button class="icon icon-search" type="submit">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </form>
            <!-- Cart -->
            <span class="icon">
                <a href="{{ route('client.cart') }}">
                    <ion-icon name="cart-outline"></ion-icon>
                </a>
            </span>
            <!-- SIGN IN and SIGN UP-->
            @if(session('checkUser') == 0)
            <span class="did_sign_in"><a href="{{ route('client.auth.signin') }}">SIGN IN</a></span>
            <span class="did_sign_in">
                <hr style="background: #8a8787; height: 20px; width: 2px" />
            </span>
            <span class="did_sign_in"><a href="{{ route('client.auth.signup') }}">SIGN UP</a></span>
            @else
            <!-- INFORMATION USER -->
            <span><a href="{{ route('client.auth.infor') }}"><ion-icon name="person"></ion-icon></a></span>
            @endif
        </div>
    </header>