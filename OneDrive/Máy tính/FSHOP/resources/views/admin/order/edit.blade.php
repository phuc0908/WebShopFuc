<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>
    <link rel="stylesheet" href="/css/admin/style.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</head>

<body>
    <header style="
                position: fixed;
                top: 0;
                left: 0;
                z-index: 99;
                background-color: gray;
            ">
        <h1>Sửa Sản Phẩm</h1>
    </header>
    <section class="admin-container">
        @include('admin.sideBar')
        <div style="width: 200px; height: 100vh"></div>
        <div class="admin-container-right">
            <div class="admin-container-type-add">

                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <select name="cartegory_id" id="cartegory_id">
                            <option value="0" disabled selected>
                                --Chọn danh mục
                            </option>
                            @for ($i=0;$i<=10;$i++) <option value="">{{$i}}</option>
                                @endfor
                        </select>
                        <br />
                        <input required type="text" name="name" placeholder="Nhập tên sản phẩm" />
                        <br />
                        <input required type="number" name="price" placeholder="Nhập giá trước sale(VNĐ)" min="0" />
                        <br />
                        <input required type="number" name="price_final" placeholder="Nhập giá sau sale (VNĐ)" min="0" />
                        <br />
                        <input required type="number" name="amount" id="" placeholder="Nhập số lượng " min="0" />
                        <br />
                        <p>Chọn ảnh</p>
                        <input type="file" name="img" id="" />
                        <br />


                    </div>
                    <div class="txt_area">
                        <p>Mô tả sản phẩm</p>
                        <textarea id="editor" name="description">
                                    </textarea>
                    </div>
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