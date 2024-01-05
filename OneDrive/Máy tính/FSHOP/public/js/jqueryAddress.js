$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("#provinces").change(function () {
        var province_code = $(this).val();

        $.ajax({
            type: "get",
            url: "/showDistricts/" + province_code,
            dataType: "json",

            success: function (data) {
                $("#wards").html("");
                $("#districts").html("");

                $("#districts").append(
                    "<option selected disabled value=''>-------</option>"
                );
                $("#wards").append(
                    "<option selected disabled value=''>-------</option>"
                );
                $.each(data, function (key, value) {
                    $("#districts").append(
                        "<option value=" +
                            value.code +
                            ">" +
                            value.name +
                            "</option>"
                    );
                });
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });
    $("#districts").change(function () {
        var district_code = $(this).val();

        $.ajax({
            type: "get",
            url: "/showWards/" + district_code,
            dataType: "json",
            success: function (data) {
                $("#wards").html("");

                $("#wards").append(
                    "<option selected disabled value=''>-------</option>"
                );
                $.each(data, function (key, value) {
                    $("#wards").append(
                        "<option value=" +
                            value.code +
                            ">" +
                            value.name +
                            "</option>"
                    );
                });
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });
});
