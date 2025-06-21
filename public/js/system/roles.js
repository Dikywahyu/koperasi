$(function () {
    const table = $(".datatables-basic");
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    // Load DataTables
    table.DataTable({
        ajax: {
            url: BASE_URL + "/roles",
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
            { data: "name", title: "Role Name" },
            {
                data: "permissions",
                title: "Permissions",
                render: function (data) {
                    return data
                        .map(
                            (p) =>
                                `<span class="badge bg-label-danger me-1">${p.name}</span>`
                        )
                        .join(" ");
                },
            },
            {
                data: "id",
                title: "Actions",
                orderable: false,
                render: function (data) {
                    return `
                        <button class="btn btn-sm btn-warning btn-edit-role" data-id="${data}"><i class="ri-edit-box-line"></i></button>
                        <button class="btn btn-sm btn-danger btn-delete-role" data-id="${data}">Delete</button>
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
                    $("#form-role")[0].reset();
                    $("#role-id").val("");
                    $("#user-role").val("");
                    offCanvas.show();
                },
            },
        ],
        responsive: true,
        pageLength: 10,
        autoWidth: false,
    });

    // Edit Role
    $(document).on("click", ".btn-edit-role", function () {
        const id = $(this).data("id");
        $.get(`/roles/${id}`, function (role) {
            $("#role-id").val(role.id);
            $("#role-name").val(role.name);
            $("#user-role")
                .val(role.permissions.map((p) => p.name))
                .trigger("change");
            offCanvas.show();
        });
    });

    // Delete Role
    $(document).on("click", ".btn-delete-role", function () {
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
                    url: `/roles/${id}`,
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

    // Create or Update Role
    $("#form-role").on("submit", function (e) {
        e.preventDefault();

        const id = $("#role-id").val();
        const url = id ? `/roles/${id}` : `/roles`;
        const method = id ? "PUT" : "POST";

        $.ajax({
            url: url,
            method: method,
            data: {
                name: $("#role-name").val(),
                permissions: $("#user-role").val(),
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function () {
                $(".datatables-basic").DataTable().ajax.reload();
                Swal.fire({
                    icon: "success",
                    title: "Sukses",
                    text: id ? "Role diperbarui" : "Role ditambahkan",
                    timer: 2000,
                    showConfirmButton: false,
                });
                $("#form-role")[0].reset();
                $("#role-id").val("");
                offCanvas.hide();
            },
            error: function (xhr) {
                alert("Gagal simpan: " + xhr.responseJSON.message);
            },
        });
    });
});
