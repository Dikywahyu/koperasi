$(function () {
    const table = $(".datatables-basic");
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    table.DataTable({
        ajax: {
            url: "/regionals",
            dataSrc: "",
        },
        columns: [
            {
                data: null,
                title: "No",
                render: (data, type, row, meta) => meta.row + 1,
            },
            { data: "nama", title: "Nama Regional" },
            { data: "kode", title: "Kode" },
            {
                data: "id",
                title: "Aksi",
                orderable: false,
                render: (id) => `
                    <button class="btn btn-warning btn-sm btn-edit" data-id="${id}"><i class="ri-edit-box-line"></i></button>
                    <button class="btn btn-danger btn-sm btn-delete" data-id="${id}"><i class="ri-delete-bin-5-line"></i></button>
                `,
            },
        ],
        dom:
            '<"card-header d-flex justify-content-between align-items-center flex-wrap"<"head-label"><"dt-buttons btn-group me-2"B>>' +
            '<"row"<"col-md-6"l><"col-md-6 d-flex justify-content-md-end justify-content-center"f>>t' +
            '<"row"<"col-md-6"i><"col-md-6"p>>',
        buttons: [
            {
                extend: "collection",
                className: "btn btn-label-primary dropdown-toggle me-2  ms-2",
                text: '<i class="ri-download-line"></i> Export',
                buttons: ["copy", "csv", "excel", "pdf", "print"].map(
                    (type) => ({
                        extend: type,
                        className: "dropdown-item",
                    })
                ),
                init: function (api, node) {
                    node.css("margin", "0.2rem");
                },
            },
            {
                text: '<i class="ri-add-line"></i> ',
                className: "btn btn-primary",
                action: function () {
                    $("#form-regional")[0].reset();
                    $("#regional-id").val("");
                    offCanvas.show();
                },
                init: function (api, node) {
                    node.css("margin", "0.2rem");
                },
            },
            {
                text: '<i class="ri-refresh-line me-1"></i>',
                className: "btn btn-outline-secondary",
                action: function () {
                    table.DataTable().ajax.reload();
                },
                init: function (api, node) {
                    node.css("margin", "0.2rem");
                },
            },
        ],
        responsive: true,
        pageLength: 10,
    });

    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");
        $.get(`/regionals/${id}`, function (data) {
            $("#regional-id").val(data.id);
            $("#regional-nama").val(data.nama);
            $("#regional-kode").val(data.kode);
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
                    url: `/regionals/${id}`,
                    method: "DELETE",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function () {
                        table.DataTable().ajax.reload();
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil",
                            text: "Data berhasil dihapus",
                            timer: 1500,
                            showConfirmButton: false,
                        });
                    },
                });
            }
        });
    });

    $("#form-regional").on("submit", function (e) {
        e.preventDefault();
        const id = $("#regional-id").val();
        const method = id ? "PUT" : "POST";
        const url = id ? `/regionals/${id}` : `/regionals`;

        $.ajax({
            url: url,
            method: method,
            data: {
                nama: $("#regional-nama").val(),
                kode: $("#regional-kode").val(),
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function () {
                table.DataTable().ajax.reload();
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: id ? "Berhasil Update" : "Berhasil Tambah",
                    timer: 2000,
                    showConfirmButton: false,
                });
                $("#form-regional")[0].reset();
                $("#regional-id").val("");
                offCanvas.hide();
            },
            error: function (xhr) {
                Swal.fire(
                    "Gagal",
                    Object.values(xhr.responseJSON.errors).join("<br>"),
                    "error"
                );
            },
        });
    });
});
