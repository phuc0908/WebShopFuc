const minus_button = document.querySelector(".minus");
const plus_button = document.querySelector(".plus");
var quantity = document.querySelector(".input-qty");

const main_img = document.querySelector("#main-img");

// Xử lý chọn size
// xử lý tăng giảm số lượng sản phẩm

minus_button.addEventListener("click", function () {
    if (quantity.value > 1) {
        quantity.value = quantity.value - 1;
    }
});
plus_button.addEventListener("click", function () {
    quantity.value = Number(quantity.value) + 1;
});

// xử lý chọn Size
const size_id = document.querySelectorAll(".size_id"); //radio
const size_name = document.querySelectorAll(".size-product"); //span

for (let i = 0; i < size_name.length; i++) {
    size_name[i].addEventListener("click", function () {
        for (let j = 0; j < size_name.length; j++) {
            size_name[j].style.background = "white";
            size_name[j].style.color = "black";
            size_id[j].checked = "false";
        }
        size_name[i].style.background = "black";
        size_name[i].style.color = "white";
        size_id[i].checked = "true";
    });
}
// xử lý chọn Color
const color_id = document.querySelectorAll(".color_id"); //radio
const img_id = document.querySelectorAll(".img_id"); //radio
const color_input = document.querySelectorAll(".color"); //input
var color_name = document.querySelectorAll(".color_name");

for (let i = 0; i < color_input.length; i++) {
    color_input[i].addEventListener("click", function () {
        for (let j = 0; j < color_input.length; j++) {
            color_name[j].style.display = "none";
            color_id[j].checked = "false";
            img_id[j].checked = "false";
        }
        color_name[i].style.display = "inline-block";
        color_id[i].checked = "true";
        img_id[i].checked = "true";

        // Set img of color
        path = img_id[i].value;
        main_img.setAttribute("src", path);
    });
}
