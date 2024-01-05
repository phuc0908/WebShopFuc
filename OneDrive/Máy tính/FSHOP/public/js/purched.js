function handleRadioChange() {
    const radioAddress = document.querySelectorAll(".addressRadio");
    const myAdd = document.querySelector(".formMyAddress");
    const otherAdd = document.querySelector(".otherAddress");

    if (!radioAddress[0].checked) {
        myAdd.style.opacity = 0.5;
        myAdd.style.eventpointer = "none";
        otherAdd.style.opacity = 1; // Reset opacity for other address
    } else {
        myAdd.style.opacity = 1; // Reset opacity for my address
        otherAdd.style.opacity = 0.5;
    }
}

// Gọi hàm khi có sự kiện thay đổi trạng thái radio button
document.addEventListener("change", handleRadioChange);
