@include('admin.layouts.header')

<h1>Thêm Sản Phẩm</h1>
</header>
<section class="admin-container">

    @include('admin.layouts.sideBar')

    <div style="width: 200px; height: 100vh"></div>
    <div class="admin-container-right">
        <!-- ALERT -->
        <style>
            /* The alert message box */
            .alert {
                padding: 20px;
                background-color: rgb(46, 184, 134);
                /* Green */
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

            label {
                font-size: smaller;
            }

            input[type='checkbox'] {
                user-select: none;
                width: 12px;
                height: 12px;
                margin-left: 40px;
            }
        </style>
        @if (session('alertStore'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('alertStore') }}
        </div>
        @endif
        <div class="admin-container-type-add">

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <select name="cartegory_id" id="cartegory_id">
                        <option value="0" disabled selected>
                            --Chọn danh mục
                        </option>
                        @if(!empty($nameAllCart))
                        @foreach ($nameAllCart as $key => $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                        @endif
                    </select>
                    <br />
                    <label for="">Nhập tên sản phẩm </label>
                    <br>
                    <input required type="text" name="name" placeholder="Nhập tên sản phẩm" />
                    <br />
                    <label for="">Slug </label>
                    <br>
                    <input required type="text" name="slug" placeholder="Slug" />
                    <br />
                    <label for="">Nhập giá cố định </label>
                    <br>
                    <input required type="number" name="price" placeholder="Nhập giá trước sale(VNĐ)" min="0" />
                    <br />
                    <label for="">Nhập giá sau sale </label>
                    <br>
                    <input required type="number" name="price_final" placeholder="Nhập giá sau sale (VNĐ)" min="0" />
                    <br />
                    <label for="">Nhập số lượng sản phẩm</label>
                    <br>
                    <input required type="number" name="amount" id="" placeholder="Nhập số lượng " min="0" />
                    <br /><br>
                    <p>Chọn ảnh</p>
                    <input type="file" name="img" id="" multiple="multiple" />
                    <br />
                    <label for="">Chọn size</label> <br>
                    @if(!empty($sizes))
                    @foreach($sizes as $key => $size)
                    <input type="checkbox" name="size[{{$key}}]" value="{{$size->id}}">
                    <span for="vehicle1"> {{$size->name}}</span>
                    @endforeach
                    @endif
                    <p>Mô tả sản phẩm</p>
                    <textarea id="editor" name="description">
                                    </textarea>
                    <button class="bt_add_type" type="submit" name="submit">Thêm</button>
                </div>

            </form>
        </div>
    </div>
</section>
</body>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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