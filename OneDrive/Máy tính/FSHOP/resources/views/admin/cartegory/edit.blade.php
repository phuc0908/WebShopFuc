@include('admin.layouts.header')

<h1>Sửa Danh Mục</h1>
</header>
<section class="admin-container">

    @include('admin.layouts.sideBar')

    <div style="width: 200px; height: 100vh"></div>
    <div class="admin-container-right">
        <div class="admin-container-type-add">

            <form action="" method="POST">
                @csrf
                <div>
                    @if(!empty($data))
                    @foreach($data as $k => $v)
                    <input required type="text" name="name" placeholder="Nhập tên danh mục" value="{{$v->name}}" />
                    <br />
                    <input required type="text" name="slug" placeholder="slug" value="{{$v->slug}}" />
                    <br />
                    <select name="parent_id" id="cartegory_id">
                        <option value="0" disabled selected>
                            --Chọn danh mục cha
                        </option>
                        @foreach ($nameAll as $key => $value)
                        <option value="{{$value->id}}" {{ $v->parent_id == $value->id ? 'selected' : '' }}>{{$value->name}}</option>
                        @endforeach
                    </select>
                    @endforeach
                    <br />
                </div>
                @endif
                <button style="position: absolute; top:200px;" class="bt_add_type" type="submit" name="submit">Cập nhật</button>
            </form>
        </div>
    </div>
</section>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector("#editor"))
        .then((editor) => {
            console.log(editor);
        })
        .catch((error) => {
            console.error(error);
        });
</script>

</html>