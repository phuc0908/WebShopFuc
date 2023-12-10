@include('admin.layouts.header')

<h1>Sửa Màu</h1>
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
                    <label for="">Tên Màu</label>
                    <br>
                    @if(!empty($data))
                    @foreach($data as $value)
                    <input required type="text" name="name" placeholder="Nhập tên màu" value="{{$value->name}}" />
                    <br />
                    <label>Mã màu</label> <br>
                    <input type="text" name="code_color" value="{{$value->code_color}}" />
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