@include('admin.layouts.header')

<h1>Sửa Sản Phẩm</h1>
</header>
<section class="admin-container">

    @include('admin.layouts.sideBar')

    <div style="width: 200px; height: 100vh"></div>
    <div class="admin-container-right">
        <div class="admin-container-type-add">

            <form action="" method="POST" style="display: block;" enctype="multipart/form-data">
                @csrf
                <div>
                    @if(!empty($data))
                    @foreach ($data as $k => $v)
                    <select name="cartegory_id" id="cartegory_id">
                        <option value="0" disabled>
                            --Chọn danh mục</option>

                        @if(!empty($nameAll))
                        @foreach ($nameAll as $key => $value)
                        <option value="{{$value->id}}" {{$v->id === $value->id ? 'selected' : '' }}> {{$value->name}}</option>
                        @endforeach
                        @endif
                    </select>
                    <br />
                    <input required type="text" name="name" placeholder="Nhập tên sản phẩm" value="{{$v->name}}" />
                    <br />
                    <input required type="text" name="slug" placeholder="Slug" value="{{$v->slug}}" />
                    <br />
                    <input required type="number" name="price" placeholder="Nhập giá trước sale(VNĐ)" min="0" value="{{$v->price}}" />
                    <br />
                    <input required type="number" name="price_final" placeholder="Nhập giá sau sale (VNĐ)" min="0" value="{{$v->price_final}}" />
                    <br />
                    <input required type="number" name="amount" id="" placeholder="Nhập số lượng " min="0" value="{{$v->amount}}" />
                    <br />
                    <p>Chọn ảnh</p>
                    <input type="file" name="img" id="img" value="{{$v->img}}" multiple="multiple" />
                    <br />


                </div>

                <div class="txt_area">
                    <p>Mô tả sản phẩm</p>
                    <textarea id="editor" name="description">
                    {{$v->description}} </textarea>
                </div>
                @endforeach
                @endif
                <button class="bt_add_type" type="submit" name="submit">Cập nhật</button>
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