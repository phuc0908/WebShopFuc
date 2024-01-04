   <div class="admin-container-left" style="position: fixed; top: 90px; left: 0">
       <ul>
           <li>
               <a href="{{ route('admin.home') }}">TRANG THỐNG KÊ</a>
           </li>
           <li>
               <a href="#">Danh Mục</a>
               <ul>
                   <li><a href="{{ route('admin.cartegory.add') }}">Thêm Danh Mục</a></li>
                   <li><a href="{{ route('admin.cartegory.list') }}">DS Danh Mục</a></li>
               </ul>
           </li>
           <li>
               <a href="#">Sản Phẩm</a>
               <ul>
                   <li><a href="{{ route('admin.product.add') }}">Thêm Sản Phẩm</a></li>
                   <li><a href="{{ route('admin.product.list') }}">DS Sản Phẩm</a></li>
               </ul>
           </li>
           <li>
               <a href="#">Đơn Hàng</a>
               <ul>
                   <li><a href="{{ route('admin.order.list') }}">DS Đơn Hàng</a></li>
               </ul>
           </li>
           <li>
               <a href="#">Người Dùng</a>
               <ul>
                   <li><a href="{{ route('admin.user.add') }}">Thêm Ng Dùng</a></li>
                   <li><a href="{{ route('admin.user.list') }}">DS Ng Dùng</a></li>
               </ul>
           </li>
           <li>
               <a href="#">Màu</a>
               <ul>
                   <li><a href="{{ route('admin.color.add') }}">Thêm Màu</a></li>
                   <li><a href="{{ route('admin.color.list') }}">DS Màu</a></li>
               </ul>
           </li>
           <li>
               <a href="#">Size</a>
               <ul>
                   <li><a href="{{ route('admin.size.add') }}">Thêm Size</a></li>
                   <li><a href="{{ route('admin.size.list') }}">DS Size</a></li>
               </ul>
           </li>
       </ul>
   </div>
   <!-- <div style="width: 200px; height: 100vh"></div> -->