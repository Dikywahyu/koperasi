$(function () {
    const table = $(".datatables-basic");
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    table.DataTable({
        ajax: {
            url: "/ziscos",
            dataSrc: "",
        },
        columns: [
            {
                data: null,
                title: "No",
                render: (data, type, row, meta) => meta.row + 1,
            },
            { data: "nama", title: "Nama" },
            { data: "lokasi", title: "Lokasi" },
            {
                data: "user.name",
                title: "User",
                defaultContent: "-",
            },
            {
                data: "id",
                title: "Aksi",
                orderable: false,
                render: (id) => `
                    <button class="btn btn-warning btn-sm btn-edit" data-id="${id}">Edit</button>
                    <button class="btn btn-danger btn-sm btn-delete" data-id="${id}">Hapus</button>
                `,
            },
        ],
        dom:
            '<"card-header d-flex justify-content-between align-items-center flex-wrap"<"head-label"><"dt-buttons btn-group me-2"B>>' +
            '<"row"<"col-md-6"l><"col-md-6 d-flex justify-content-md-end justify-content-center"f>>t' +
            '<"row"<"col-md-6"i><"col-md-6"p>>',
        buttons: [
            {
                text: '<i class="ri-add-line"></i> Tambah Zisco',
                className: "btn btn-primary",
                action: function () {
                    $("#form-zisco")[0].reset();
                    $("#zisco-id").val("");
                    offCanvas.show();
                    loadUsers();
                },
            },
        ],
        responsive: true,
        pageLength: 10,
    });

    function loadUsers() {
        $.get("/users", function (users) {
            const select = $("#zisco-user");
            select.empty().append(`<option value="">-- Pilih User --</option>`);
            users.forEach((user) => {
                select.append(
                    `<option value="${user.id}">${user.name}</option>`
                );
            });
        });
    }

    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");
        $.get(`/ziscos/${id}`, function (data) {
            $("#zisco-id").val(data.id);
            $("#zisco-nama").val(data.nama);
            $("#zisco-lokasi").val(data.lokasi);
            $("#zisco-user").val(data.user_id);
            offCanvas.show();
        });
    });

    $(document).on("click", ".btn-delete", function () {
        const id = $(this).data("id");
        Swal.fire({
            title: "Yakin hapus data ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            customClass: {
                confirmButton: "btn btn-danger me-3",
                cancelButton: "btn btn-outline-secondary",
            },
            buttonsStyling: false,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: `/ziscos/${id}`,
                    method: "DELETE",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function () {
                        table.DataTable().ajax.reload();
                        Swal.fire({
                            icon: "success",
                            title: "Dihapus!",
                            timer: 1500,
                            showConfirmButton: false,
                        });
                    },
                });
            }
        });
    });

    $("#form-zisco").on("submit", function (e) {
        e.preventDefault();
        const id = $("#zisco-id").val();
        const method = id ? "PUT" : "POST";
        const url = id ? `/ziscos/${id}` : `/ziscos`;

        $.ajax({
            url: url,
            method: method,
            data: {
                nama: $("#zisco-nama").val(),
                lokasi: $("#zisco-lokasi").val(),
                user_id: $("#zisco-user").val(),
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function () {
                table.DataTable().ajax.reload();
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: id ? "Data diperbarui" : "Data ditambahkan",
                    timer: 2000,
                    showConfirmButton: false,
                });
                $("#form-zisco")[0].reset();
                $("#zisco-id").val("");
                offCanvas.hide();
            },
            error: function (xhr) {
                Swal.fire("Gagal", xhr.responseJSON.message, "error");
            },
        });
    });
});
