//Show modal create
$("body").on("click", ".modal-create", function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr("href"),
        title = me.attr("title");

    $("#modal-title").text(title);
    $("#modal-btn-save").removeClass("hide").text("Simpan");

    $("#modal-btn-save").removeClass().addClass("btn btn-success");

    $.ajax({
        url: url,
        dataType: "html",
        success: function (response) {
            $("#modal-body").html(response);
        },
    });

    $("#modal").modal("show");
});

//Show modal edit
$("body").on("click", ".modal-edit", function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr("href"),
        title = me.attr("title");

    $("#modal-title").text(title);

    $("#modal-btn-save").removeClass("hide").text("Update");

    $("#modal-btn-save").removeClass().addClass("btn btn-success");

    $.ajax({
        url: url,
        dataType: "html",
        success: function (response) {
            $("#modal-body").html(response);
        },
    });

    $("#modal").modal("show");
});

//menyimpan data
$("#modal-btn-save").click(function (event) {
    event.preventDefault();

    var form = $("#modal-body form"),
        url = form.attr("action"),
        method = $("input[name=_method]").val() == undefined ? "POST" : "PUT";

    form.find(".help-block").remove();
    form.find(".form-group").removeClass("has-error");

    $.ajax({
        url: url,
        method: method,
        data: form.serialize(),
        // contentType:false, //recent added
        // processData:false, //recent added
        success: function (response) {
            form.trigger("reset");
            $("#modal").modal("hide");
            $("#datatable").DataTable().ajax.reload();

            toastr.success("Data has been saved!");
        },
        error: function (xhr) {
            var res = xhr.responseJSON;
            // toastr.success("Data has been saved!");
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $("#" + key)
                        .closest(".form-group")
                        .addClass("has-error")
                        .append(
                            '<span class="help-block"><strong>' +
                                value +
                            "</strong></span>"
                        );
                });
            }
        },
    });
});

//Delete data
$("body").on("click", ".btn-delete", function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr("href"),
        title = me.attr("title"),
        csrf_token = $('meta[name="csrf-token"]').attr("content");

    swal({
        title: "Are you sure want to delete " + title + " ?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _method: "DELETE",
                    _token: csrf_token,
                },
                success: function (response) {
                    $("#datatable").DataTable().ajax.reload();
                    if (response.status == "error") {
                        swal({
                            type: "error",
                            title: "Oops...!",
                            text: "Data has been used!",
                        });
                    } else {
                        swal({
                            type: "success",
                            title: "Success!",
                            text: "Data has been deleted!",
                        });
                    }
                },
                error: function (xhr) {
                    swal({
                        type: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                },
            });
        }
    });
});

//show data
$("body").on("click", ".btn-show", function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr("href"),
        title = me.attr("title");

    $("#modal-title").text(title);
    // $("#modal-btn-save").addClass("hide");
    // $("#modal-btn-save").removeClass("hide").text("");
    $("#modal-btn-save").removeClass().addClass("btn hide").text("");

    $.ajax({
        url: url,
        dataType: "html",
        success: function (response) {
            $("#modal-body").html(response);
        },
    });

    $("#modal").modal("show");
});


function formatRupiah(event) {
    var input = event.target; // Mendapatkan referensi ke input yang memicu event
    var value = input.value.replace(/\D/g, ""); // Menghapus karakter selain angka
    var formatted = ""; // Variabel untuk menampung nilai format rupiah

    // Loop untuk menambahkan titik setiap tiga digit
    while (value.length > 3) {
        formatted = '.' + value.substr(value.length - 3) + formatted;
        value = value.substr(0, value.length - 3);
    }

    // Menambahkan sisa nilai dan menampilkan di input
    input.value = value + formatted;
}

// Fungsi ini menambahkan event listener ke setiap input dengan class 'input-rupiah'
function addRupiahFormatListeners() {
    var inputs = document.querySelectorAll('.input-rupiah'); // Mendapatkan semua input dengan class 'input-rupiah'
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('keyup', formatRupiah); // Menambahkan event listener
    }
}

// Menambahkan event listener setelah halaman dimuat
window.onload = addRupiahFormatListeners;