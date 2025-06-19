$(function () {
    const table = $(".datatables-basic");
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    // Load DataTables
    table.DataTable({
        ajax: {
            url: BASE_URL + "/permissions",
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
            { data: "name", title: "permissions Name" },
            { data: "guard_name", title: "Guard" },
            {
                data: "id",
                title: "Actions",
                orderable: false,
                render: function (data) {
                    return `
                        <button class="btn btn-sm btn-warning btn-edit-permissions" data-id="${data}">Edit</button>
                        <button class="btn btn-sm btn-danger btn-delete-permissions" data-id="${data}">Delete</button>
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
                    $("#form-permissions")[0].reset();
                    $("#permissions-id").val("");
                    offCanvas.show();
                },
            },
        ],
        responsive: true,
        pageLength: 10,
        autoWidth: false,
    });

    // Edit permissions
    $(document).on("click", ".btn-edit-permissions", function () {
        const id = $(this).data("id");
        $.get(`/permissions/${id}`, function (permissions) {
            $("#permissions-id").val(permissions.id);
            $("#permissions-name").val(permissions.name);
            offCanvas.show();
        });
    });

    // Delete permissions
    $(document).on("click", ".btn-delete-permissions", function () {
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
                    url: `/permissions/${id}`,
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

    // Create or Update permissions
    $("#form-permissions").on("submit", function (e) {
        e.preventDefault();

        const id = $("#permissions-id").val();
        const url = id ? `/permissions/${id}` : `/permissions`;
        const method = id ? "PUT" : "POST";

        $.ajax({
            url: url,
            method: method,
            data: {
                name: $("#permissions-name").val(),
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function () {
                $(".datatables-basic").DataTable().ajax.reload();
                Swal.fire({
                    icon: "success",
                    title: "Sukses",
                    text: id
                        ? "permissions diperbarui"
                        : "permissions ditambahkan",
                    timer: 2000,
                    showConfirmButton: false,
                });
                $("#form-permissions")[0].reset();
                $("#permissions-id").val("");
                offCanvas.hide();
            },
            error: function (xhr) {
                alert("Gagal simpan: " + xhr.responseJSON.message);
            },
        });
    });
});
