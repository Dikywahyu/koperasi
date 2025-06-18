$(function () {
    const table = $(".datatables-basic");
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    table.DataTable({
        ajax: {
            url: BASE_URL + "/users",
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
            {
                data: "name",
                title: "Nama",
            },
            {
                data: "email",
                title: "Email",
            },
            {
                data: "role",
                title: "Role",
                render: function (data, type, row, meta) {
                    const roles = {
                        "Super Admin": {
                            title: "Super Admin",
                            class: "bg-label-danger",
                        },
                        Admin: {
                            title: "Admin",
                            class: "bg-label-primary",
                        },
                        Karyawan: {
                            title: "Karyawan",
                            class: "bg-label-secondary",
                        },
                        BAAK: {
                            title: "BAAK",
                            class: "bg-label-info",
                        },
                        BAUK: {
                            title: "BAUK",
                            class: "bg-label-info",
                        },
                        Sarpras: {
                            title: "Sarpras",
                            class: "bg-label-warning",
                        },
                        Koperasi: {
                            title: "Koperasi",
                            class: "bg-label-success",
                        },
                        Kaprodi: {
                            title: "Kaprodi",
                            class: "bg-label-dark",
                        },
                        "Dosen Wali": {
                            title: "Dosen Wali",
                            class: "bg-label-secondary",
                        },
                        Dosen: {
                            title: "Dosen",
                            class: "bg-label-primary",
                        },
                        Mahasiswa: {
                            title: "Mahasiswa",
                            class: "bg-label-success",
                        },
                        User: {
                            title: "User",
                            class: "bg-label-secondary",
                        },
                    };
                    const role = roles[data];
                    if (!role) {
                        return `<span class="badge bg-label-secondary">Unknown</span>`;
                    }
                    return `<span class="badge rounded-pill ${role.class}">${role.title}</span>`;
                },
            },
            {
                data: "id",
                title: "Action",
                orderable: false,
                render: function (data, type, row, meta) {
                    return `
                        <button 
                            class="btn btn-sm btn-info btn-edit-user" 
                            data-id="${row.id}" 
                            data-name="${row.name}" 
                            data-email="${row.email}" 
                            data-role="${row.role}"
                        >
                            Edit
                        </button>
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
                    $("#form-user")[0].reset();
                    $("#user-id").val("");
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
    $("div.head-label").html('<h5 class="card-title mb-0">User List</h5>');

    $(document).on("click", ".btn-edit-user", function () {
        // e.preventDefault();
        const id = $(this).data("id");

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            url: `/users/${id}`,
            method: "GET",
            contentType: "application/json",
            data: JSON.stringify({
                id: $("#user-id").val(),
                name: $("#user-name").val(),
                email: $("#user-email").val(),
                role: $("#user-role").val(),
            }),
            success: function (response) {
                $("#user-id").val(response.id);
                $("#user-name").val(response.name);
                $("#user-email").val(response.email);
                $("#user-role").val(response.role).trigger("change");
                offCanvas.show();
            },
            error: function (xhr) {
                alert("Update gagal: " + xhr.responseJSON.message);
            },
        });
    });

    $("#form-user").on("submit", function (e) {
        e.preventDefault();

        const id = $("#user-id").val(); // kosong = insert, ada = update
        const url = id ? `/users/${id}` : `/users`;
        const method = id ? "PUT" : "POST";

        $.ajax({
            url: url,
            method: method,
            data: {
                name: $("#user-name").val(),
                email: $("#user-email").val(),
                role: $("#user-role").val(),
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                $(".datatables-basic").DataTable().ajax.reload();
                Swal.fire({
                    icon: "success",
                    title: "Yey !",
                    text: id ? "Berhasil Update" : "Berhasil Tambah",
                    timer: 2000,
                    showConfirmButton: false,
                }).then(() => {
                    $("#form-user")[0].reset();
                    $("#user-id").val("");
                    offCanvas.hide();
                });
            },
            error: function (xhr) {
                alert("Update gagal: " + xhr.responseJSON.message);
            },
        });
    });
});
