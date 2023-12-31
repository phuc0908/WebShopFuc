-- INSERT DATA SIZE

INSERT INTO sizes (id,name,weight,height) VALUES (1,'S','55-60kgs','1m60-1m65') ;
INSERT INTO sizes (id,name,weight,height) VALUES (2,'M','60-65kg','1m64-1m69') ;
INSERT INTO sizes (id,name,weight,height) VALUES (3,'L','66-70kg','1m70-1m75') ;
INSERT INTO sizes (id,name,weight,height) VALUES (4,'XL','70-75kg','1m74-1m77') ;
INSERT INTO sizes (id,name,weight,height) VALUES (5,'XXL','76-80kg','1m70-1m77') ;


-- INSERT DATA COLOR

INSERT INTO colors (id,name,code_color) VALUES (5,'Đen','rgb(0, 0, 0)') ;
INSERT INTO colors (id,name,code_color) VALUES (6,'Trắng','rgb(255, 255, 255)') ;
INSERT INTO colors (id,name,code_color) VALUES (17,'Kẻ Đen','rgb(43, 43, 43)') ;
INSERT INTO colors (id,name,code_color) VALUES (18,'Xanh Đậm','rgb(50, 65, 96)') ;
INSERT INTO colors (id,name,code_color) VALUES (19,'Be','rgb(200, 171, 132)') ;


-- INSERT DATA PRODUCT

INSERT INTO products (id,name,cartegory_id,price,price_final,amount,slug,img,description) VALUES (23,'Áo sơ mi kẻ',64,499000,399000,123,'ao-so-mi-','upload/CsiqLgDbW1pnIPpOhVGUrb1tmLQvYFE2YK0gL6XY.jpg','
Thông tin mẫu:

Chiều cao: 175 cm

Cân nặng: 64 kg

Số đo 3 vòng:84-84-94 cm

Mẫu mặc size S (quần M Lưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.

') ;
INSERT INTO products (id,name,cartegory_id,price,price_final,amount,slug,img,description) VALUES (24,'Áo sơ mi Slim fit Basic',64,699000,589000,123,'ao-so-mi-slim-fit-basic','upload/P1Wkx1XUcEBqbMpuiZwtyVKnLFW5hb2Kjo3Wwpu8.jpg','
- Áo sơ mi tay dài cổ đức lịch thiệp.

- Thiết kế kiểu dáng Slim fit ôm nhẹ, phù hợp vóc dáng Á - Đông.

- Họa tiết trơn, basic, trẻ trung và hiện đại. 

- Kết hợp cùng quần âu, quần jeans, kaki phù hợp diện đi làm, đi chơi, gặp gỡ đối tác.

Thông tin mẫu:

Chiều cao: 186 cm

Cân nặng: 75  kg

Mẫu mặc size XXL

Lưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.

') ;
INSERT INTO products (id,name,cartegory_id,price,price_final,amount,slug,img,description) VALUES (25,'Áo Hoodie Gentleman',25,699000,455000,123,'ao-hoodie-gentlemen','upload/mQbqRuJP00fTvUG3b6y9oZgnu83F2APgvEVdWUUm.jpg','
Lấy cảm hứng từ sự kết hợp tinh tế giữa văn hoá đô thị và phong cách cá nhân, BST "URBAN REFINED" tôn vinh sự hiện đại và tối giản trong bản sắc thời trang của những quý anh thành thị. Hoodie Gentleman nằm trong BST mới nhất, đáp ứng đầy đủ tiêu chí từ lịch lãm, phong cách đến trẻ trung, hiện đại của Quý anh trong mùa Thu Đông này.

- Áo hoodie nam tay dài, cổ mũ rộng, có dây rút điều chỉnh. Thiết kế áo dáng Regular với gấu và cổ tay bo, co giãn. 

- Áo có túi trước bụng, tạo điểm nhấn khác biệt qua hình thêu trên thân trước. 

- Chất liệu vải dày dặn không nhăn, không xù, không co rút khi giặt, giữ ấm cơ thể tốt trong những ngày lạnh. Mix cùng quần jean, short...giày thể thao để có set đồ năng động.

Thông tin mẫu:

Chiều cao: 186 cm

Cân nặng: 75  kg

Mẫu mặc size XXL

Lưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.

') ;
INSERT INTO products (id,name,cartegory_id,price,price_final,amount,slug,img,description) VALUES (26,'Áo sơ mi Khaki Regular fit',64,456000,345000,12,'ao-so-mi-khaki-regular-fit','upload/f5aW3BxxC1x6n1jwmg0XyQMAgxMowxDvN8Lnggrr.jpg','
- Áo sơ mi tay dài, dáng Regular fit trẻ trung, hiện đại. 

- Thiết kế áo cơ bản, cổ áo và cổ tay đứng form, cài bằng hàng khuy nhựa tinh tế.

- Màu sắc basic dễ dàng mix&match với nhiều phong cách. 

- Chất liệu Khaki thoáng mát, ít nhăn, phù hợp diện trong nhiều hoàn cảnh khác nhau. 

Thông tin mẫu:

Chiều cao: 185 cm

Cân nặng: 70 kg

Số đo 3 vòng: 92-78-98 cm

Lưu ý: Màu sắc sản phẩm thực tế sẽ có sự chênh lệch nhỏ so với ảnh do điều kiện ánh sáng khi chụp và màu sắc hiển thị qua màn hình máy tính/ điện thoại.

') ;
-- INSERT DATA IMAGE

INSERT INTO image (id,value,product_id) VALUES (88,'upload/yQXX6cVDwYWllHKYgucroIYLKFIPBJWu56RejQxA.jpg',23) ;
INSERT INTO image (id,value,product_id) VALUES (89,'upload/2xvaa6BAwIweZczyMlXNctT93AEBaUbJzQ379gdV.jpg',23) ;
INSERT INTO image (id,value,product_id) VALUES (90,'upload/YUTtzunm6N4oB23wSDLnf3u6M51U7RiS84B5pXlA.jpg',23) ;
INSERT INTO image (id,value,product_id) VALUES (91,'upload/oXkv3LK9PFEpCUanZUzJjiPkB9WKVTC2p51dJiC7.jpg',24) ;
INSERT INTO image (id,value,product_id) VALUES (92,'upload/fylAdCEUE7mlBbXG28bYDSO7ZUUTkLiPkyci7Qd9.jpg',24) ;
INSERT INTO image (id,value,product_id) VALUES (93,'upload/Pl64wtMBvZIswdxDyeO2LWkZRPYhezB4Sy5sgQUk.jpg',24) ;
INSERT INTO image (id,value,product_id) VALUES (94,'upload/6u3t7kRNMpDndPpUgAxrHam6ukOJAmsCHreXHjOc.jpg',24) ;
INSERT INTO image (id,value,product_id) VALUES (95,'upload/ZWLSuzhwxD8xkGOaY94DcywqVOGAh1ciwX5FYkjb.jpg',24) ;
INSERT INTO image (id,value,product_id) VALUES (96,'upload/vW9TpcgHpoCXWJOpcsgG1Dh1KLKi3z3tM6fyqMc3.jpg',24) ;
INSERT INTO image (id,value,product_id) VALUES (97,'upload/WkdN33EyGO3CmIzvqOa21LwJL5WO8CL16qCH0miv.jpg',24) ;
INSERT INTO image (id,value,product_id) VALUES (98,'upload/TXA3dvVKuyQ0mK4ro90ugF6lSl2zIB2yFMPJFdSF.jpg',24) ;
INSERT INTO image (id,value,product_id) VALUES (99,'upload/ekMLmT7RRO7ChgDazn04Y6NJMs4OdOcmXJkrMCUX.jpg',24) ;
INSERT INTO image (id,value,product_id) VALUES (100,'upload/KBNuYvyTFl6k4VC4U0qVJ50T3FUg4iXxWfk8LjMJ.jpg',26) ;
INSERT INTO image (id,value,product_id) VALUES (101,'upload/ZwBli4xs9HfSh7zTocWZH2nlrEHQVh2rqV23TjjZ.jpg',26) ;
INSERT INTO image (id,value,product_id) VALUES (102,'upload/E8gwCjgDsMkuIGSZdXc4h1dFU8BeB2WNP8WSN0GB.jpg',26) ;
INSERT INTO image (id,value,product_id) VALUES (103,'upload/mSmc7Tlt2r2wXIaSPZbGsdGsJzI5gSs4pzwLd2Op.jpg',26) ;
INSERT INTO image (id,value,product_id) VALUES (104,'upload/rnGOaXqG8d1HolnyCDledyY3ljH4kxSnaUxeyRI0.jpg',26) ;
INSERT INTO image (id,value,product_id) VALUES (109,'upload/blM90K3vRjDV8JLRiaRWehJd8suGf0k2hGaDLHQY.jpg',25) ;
INSERT INTO image (id,value,product_id) VALUES (110,'upload/5KnUDkBSkN0wArGAWdlJVNBsj7DMKxGtBcxanCYH.jpg',25) ;
INSERT INTO image (id,value,product_id) VALUES (111,'upload/PFmCDHOUSRhHx3Jurk2xdQ4BzD83mXn8XUmaz8jd.jpg',25) ;
INSERT INTO image (id,value,product_id) VALUES (112,'upload/RfTJL7bTIOBTYbDpDijJmE6tAvhhbqboj8Olbe2n.jpg',25) ;
INSERT INTO image (id,value,product_id) VALUES (113,'upload/23hxQRnA8wY0xyRPbYMj47G8ziXWE7FVvmpNhA7k.jpg',25) ;
INSERT INTO image (id,value,product_id) VALUES (114,'upload/YgKJUuDYuuRny4gkmaWVxqwp0mFIVWMfJzqO6tth.jpg',25) ;


-- 
-- INSERT DATA PRODUCT SIZE

INSERT INTO product_size (product_id,size_id) VALUES (23,1);
INSERT INTO product_size (product_id,size_id) VALUES (23,2);
INSERT INTO product_size (product_id,size_id) VALUES (23,3);
INSERT INTO product_size (product_id,size_id) VALUES (23,4);
INSERT INTO product_size (product_id,size_id) VALUES (23,5);
INSERT INTO product_size (product_id,size_id) VALUES (24,1);
INSERT INTO product_size (product_id,size_id) VALUES (24,2);
INSERT INTO product_size (product_id,size_id) VALUES (24,3);
INSERT INTO product_size (product_id,size_id) VALUES (24,4);
INSERT INTO product_size (product_id,size_id) VALUES (24,5);
INSERT INTO product_size (product_id,size_id) VALUES (26,1);
INSERT INTO product_size (product_id,size_id) VALUES (26,2);
INSERT INTO product_size (product_id,size_id) VALUES (26,3);
INSERT INTO product_size (product_id,size_id) VALUES (26,4);
INSERT INTO product_size (product_id,size_id) VALUES (26,5);
INSERT INTO product_size (product_id,size_id) VALUES (25,1);
INSERT INTO product_size (product_id,size_id) VALUES (25,2);
INSERT INTO product_size (product_id,size_id) VALUES (25,3);
INSERT INTO product_size (product_id,size_id) VALUES (25,4);
INSERT INTO product_size (product_id,size_id) VALUES (25,5);
-- 
-- INSERT DATA PRODUCT COLOR

INSERT INTO product_color (product_id,color_id) VALUES (23,17);
INSERT INTO product_color (product_id,color_id) VALUES (24,18);
INSERT INTO product_color (product_id,color_id) VALUES (24,5);
INSERT INTO product_color (product_id,color_id) VALUES (26,5);
INSERT INTO product_color (product_id,color_id) VALUES (26,19);
INSERT INTO product_color (product_id,color_id) VALUES (24,6);
INSERT INTO product_color (product_id,color_id) VALUES (25,5);
INSERT INTO product_color (product_id,color_id) VALUES (24,19);

-- 
-- INSERT DATA IMAGE COLOR

INSERT INTO image_color (image_id,color_id) VALUES (96,5);
INSERT INTO image_color (image_id,color_id) VALUES (92,18);
INSERT INTO image_color (image_id,color_id) VALUES (100,19);
INSERT INTO image_color (image_id,color_id) VALUES (101,19);
INSERT INTO image_color (image_id,color_id) VALUES (88,17);
INSERT INTO image_color (image_id,color_id) VALUES (90,17);
INSERT INTO image_color (image_id,color_id) VALUES (95,18);
INSERT INTO image_color (image_id,color_id) VALUES (97,18);
INSERT INTO image_color (image_id,color_id) VALUES (91,18);
INSERT INTO image_color (image_id,color_id) VALUES (99,5);
INSERT INTO image_color (image_id,color_id) VALUES (109,5);





