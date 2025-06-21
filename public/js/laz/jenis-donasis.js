$(function () {
    const table = $(".datatables-basic");
    const offcanvasImport = document.getElementById(
        "import-jenis-donasi-record"
    );
    const offcanvasJenisDonasiImport = new bootstrap.Offcanvas(offcanvasImport);
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    table.DataTable({
        ajax: {
            url: "/jenis-donasis",
            dataSrc: "",
        },
        columns: [
            {
                data: null,
                title: "No",
                render: (data, type, row, meta) => meta.row + 1,
            },
            { data: "nama", title: "Nama" },
            { data: "jenis", title: "Jenis" },
            { data: "deskripsi", title: "Deskripsi", defaultContent: "-" },
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
                className: "btn btn-label-primary dropdown-toggle",
                text: '<i class="ri-download-line me-1"></i> Export',
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
                    $("#form-jenis-donasi")[0].reset();
                    $("#jenis-id").val("");
                    offCanvas.show();
                },
                init: function (api, node) {
                    node.css("margin", "0.2rem");
                },
            },
            {
                text: '<i class="ri-file-add-line me-1"></i>',
                className: "btn btn-danger",
                action: function () {
                    $("#form-import-jenis-donasi")[0].reset();
                    offcanvasJenisDonasiImport.show(); // pastikan instance offcanvas terdefinisi
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
        $.get(`/jenis-donasis/${id}`, function (data) {
            $("#jenis-id").val(data.id);
            $("#jenis-nama").val(data.nama);
            $("#jenis-tipe").val(data.jenis);
            $("#jenis-deskripsi").val(data.deskripsi);
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
                    url: `/jenis-donasis/${id}`,
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

    $("#form-jenis-donasi").on("submit", function (e) {
        e.preventDefault();
        const id = $("#jenis-id").val();
        const method = id ? "PUT" : "POST";
        const url = id ? `/jenis-donasis/${id}` : `/jenis-donasis`;

        $.ajax({
            url: url,
            method: method,
            data: {
                nama: $("#jenis-nama").val(),
                jenis: $("#jenis-tipe").val(),
                deskripsi: $("#jenis-deskripsi").val(),
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
                $("#form-jenis-donasi")[0].reset();
                $("#jenis-id").val("");
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

    // Submit Form Import Jenis Donasi
    $("#form-import-jenis-donasi").on("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: "/jenis-donasis/import",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                // Reload table jika ada
                if ($(".datatables-basic").length) {
                    $(".datatables-basic").DataTable().ajax.reload();
                }

                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: "Data berhasil diimport",
                    timer: 2000,
                    showConfirmButton: false,
                });

                $("#form-import-jenis-donasi")[0].reset();
                const offcanvasEl = document.getElementById(
                    "import-jenis-donasi-record"
                );
                if (offcanvasEl)
                    bootstrap.Offcanvas.getInstance(offcanvasEl).hide();
            },
            error: function (xhr) {
                Swal.fire(
                    "Gagal",
                    xhr.responseJSON?.message ||
                        "Terjadi kesalahan saat mengimpor data.",
                    "error"
                );
            },
        });
    });
});
