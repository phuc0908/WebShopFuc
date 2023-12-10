@include('admin.layouts.header')

<h1>Sửa Ảnh</h1>
</header>
<section class="admin-container">

    @include('admin.layouts.sideBar')

    <div style="width: 200px; height: 100vh"></div>
    <div class="admin-container-right">

        <!-- ALERT -->
        @if (session('store'))
        <div class="alert alertInsert">
            {{ session('store') }}
        </div>
        @endif
        <!-- LST -->
        <div class="admin-container-type-add">

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div>

                    <p>Chọn ảnh</p>
                    <input type="file" name="img" id="" multiple="multiple" />
                    <br />
                    <input type="hidden" name="product_id" value="{{$product_id}}">
                </div>
                <button style="position: absolute; top:200px;" class="bt_add_type" type="submit" name="submit">Thêm</button>
                <a style="position: absolute; top:300px;color:coral" href="
                {{ route('admin.image.list',['product_id'=>$product_id])}}">Xem danh sách ảnh &#10152;</a>
            </form>

        </div>

    </div>

</section>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</html>