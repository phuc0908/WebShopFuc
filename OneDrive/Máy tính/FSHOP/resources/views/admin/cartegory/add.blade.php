@include('admin.layouts.header')

<h1>Thêm Danh Mục</h1>
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
        </style>
        @if (session('alertStore'))
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('alertStore') }}
        </div>
        @endif

        <!-- LIST -->
        <div class="admin-container-type-add">

            <form action="" method="POST">
                @csrf
                <div>

                    <input required type="text" name="name" placeholder="Nhập tên danh mục" />
                    <br />
                    <input required type="text" name="slug" placeholder="slug" />
                    <br />
                    <select name=" parent_id" id="cartegory_id">
                        <option value="0" disabled selected>
                            --Chọn danh mục cha
                        </option>
                        @if(!empty($nameAll))
                        @foreach ($nameAll as  $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                        @endif
                    </select>
                    <br />
                </div>
                <button style="position: absolute; top:200px;" class="bt_add_type" type="submit" name="submit">Thêm</button>
            </form>
        </div>
    </div>
</section>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</html>