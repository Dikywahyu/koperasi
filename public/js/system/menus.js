$(function () {
    const table = $(".datatables-basic");
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    table.DataTable({
        ajax: {
            url: BASE_URL + "/menus",
            dataSrc: "",
        },
        columns: [
            {
                data: null,
                title: "No",
                orderable: false,
                searchable: false,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                },
            },
            { data: "title", title: "Judul" },
            { data: "order", title: "Order" },
            { data: "route", title: "Route" },
            { data: "icon", title: "Icon" },
            {
                data: "parent",
                title: "Parent Menu",
                render: function (data) {
                    return data ? data.title : "-";
                },
            },
            {
                data: "permission",
                title: "Permission",
                render: function (data) {
                    return data ? data.name : "-";
                },
            },
            {
                data: "id",
                title: "Action",
                orderable: false,
                render: function (data, type, row) {
                    return `
                        <button class="btn btn-sm btn-warning btn-edit-menu" data-id="${data}">Edit</button>
                        <button class="btn btn-sm btn-danger btn-delete-menu" data-id="${data}">Delete</button>
                    `;
                },
            },
        ],
        dom:
            '<"card-header d-flex justify-content-between align-items-center flex-wrap"<"head-label"><"dt-buttons btn-group me-2"B>>' +
            '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center"f>>' +
            "t" +
            '<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        buttons: [
            {
                extend: "collection",
                className: "btn btn-label-primary dropdown-toggle me-2",
                text: '<i class="ri-download-line"></i> Export',
                buttons: [
                    { extend: "copy", className: "dropdown-item" },
                    { extend: "csv", className: "dropdown-item" },
                    { extend: "excel", className: "dropdown-item" },
                    { extend: "pdf", className: "dropdown-item" },
                    { extend: "print", className: "dropdown-item" },
                ],
            },
            {
                text: '<i class="ri-add-line ri-16px me-sm-2"></i> <span class="d-none d-sm-inline-block">Add New Record</span>',
                className:
                    "create-new btn btn-primary waves-effect waves-light",
                action: function () {
                    $("#form-menu")[0].reset();
                    $("#menu-id").val("");
                    offCanvas.show();
                },
            },
        ],
        responsive: true,
        pageLength: 10,
        autoWidth: false,
        language: {
            paginate: {
                next: '<i class="ri-arrow-right-s-line"></i>',
                previous: '<i class="ri-arrow-left-s-line"></i>',
            },
        },
    });

    $("div.head-label").html('<h5 class="card-title mb-0">Menu List</h5>');

    $(document).on("click", ".btn-edit-menu", function () {
        const id = $(this).data("id");
        $.get(`/menus/${id}`, function (menu) {
            $("#menu-id").val(menu.id);
            $("#menu-title").val(menu.title);
            $("#menu-route").val(menu.route);
            $("#menu-icon").val(menu.icon);
            $("#menu-parent").val(menu.parent_id);
            $("#menu-order").val(menu.order);
            $("#menu-permission").val(menu.permission_id);
            offCanvas.show();
        });
    });

    $(document).on("click", ".btn-delete-menu", function () {
        const id = $(this).data("id");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-primary me-3 waves-effect waves-light",
                cancelButton: "btn btn-outline-secondary waves-effect",
            },
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: `/menus/${id}`,
                    method: "DELETE",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function () {
                        $(".datatables-basic").DataTable().ajax.reload();
                        Swal.fire({
                            icon: "success",
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            customClass: {
                                confirmButton: "btn btn-success waves-effect",
                            },
                        });
                    },
                    error: function (xhr) {
                        alert("Gagal hapus: " + xhr.responseJSON.message);
                    },
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    icon: "error",
                    customClass: {
                        confirmButton: "btn btn-success waves-effect",
                    },
                });
            }
        });
    });

    $("#form-menu").on("submit", function (e) {
        e.preventDefault();

        const id = $("#menu-id").val();
        const url = id ? `/menus/${id}` : `/menus`;
        const method = id ? "PUT" : "POST";

        $.ajax({
            url: url,
            method: method,
            data: {
                title: $("#menu-title").val(),
                route: $("#menu-route").val(),
                icon: $("#menu-icon").val(),
                parent_id: $("#menu-parent").val(),
                permission_id: $("#menu-permission").val(),
                order: $("#menu-order").val(),
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function () {
                table.DataTable().ajax.reload();
                Swal.fire({
                    icon: "success",
                    title: "Sukses",
                    text: id ? "Menu diperbarui" : "Menu ditambahkan",
                    timer: 2000,
                    showConfirmButton: false,
                });
                $("#form-menu")[0].reset();
                $("#menu-id").val("");
                offCanvas.hide();
            },
            error: function (xhr) {
                alert("Gagal simpan: " + xhr.responseJSON.message);
            },
        });
    });
});
