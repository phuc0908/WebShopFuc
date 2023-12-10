@include('admin.layouts.header')

<h1>Sửa Size</h1>
</header>
<section class="admin-container">

    @include('admin.layouts.sideBar')

    <div style="width: 200px; height: 100vh"></div>
    <div class="admin-container-right">

        <!-- LST -->
        <div class="admin-container-type-add">

            <form action="" method="POST">
                @csrf
                <div>
                    @if(!empty($data))
                    @foreach($data as $value)
                    <label for="">Size</label>
                    <br>
                    <input required type="text" name="name" placeholder="Nhập tên size" value="{{$value->name}}" />
                    <br />
                    <label for="">Cân nặng</label>
                    <br>
                    <input required type="text" name="weight" placeholder="Kg..." value="{{$value->weight}}" />
                    <br />
                    <label for="">Chiều cao</label>
                    <br>
                    <input required type="text" name="height" placeholder="Mét... " value="{{$value->height}}" />
                    <br />
                    @endforeach
                    @endif

                </div>
                <button style="position: absolute; top:200px;" class="bt_add_type" type="submit" name="submit">Cập nhật</button>
            </form>
        </div>
    </div>
</section>
</body>

</html>