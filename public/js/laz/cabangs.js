$(function () {
    const table = $(".datatables-basic");
    const offImportCanvasElement = document.getElementById("import-record");
    const offImportCanvas = new bootstrap.Offcanvas(offImportCanvasElement);
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    table.DataTable({
        ajax: {
            url: "/cabangs",
            dataSrc: "",
        },
        columns: [
            {
                data: null,
                title: "No",
                render: (data, type, row, meta) => meta.row + 1,
            },
            { data: "nama", title: "Nama" },
            { data: "kode", title: "Kode" },
            { data: "alamat", title: "Alamat" },
            { data: "telepon", title: "Telepon" },
            {
                data: "regional.nama",
                title: "Regional",
                defaultContent: "-",
            },
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
            '<"card-header d-flex justify-content-between align-items-center flex-wrap"<"head-label"><"dt-buttons d-flex flex-wrap gap-2"B>>' +
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
                text: '<i class="ri-add-line me-1"></i> ',
                className: "btn btn-primary",
                action: function () {
                    $("#form-cabang")[0].reset();
                    $("#cabang-id").val("");
                    loadRegionals();
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
                    $("#form-cabang")[0].reset();
                    $("#cabang-id").val("");
                    loadRegionals();
                    offImportCanvas.show();
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

    const loadRegionals = () => {
        return $.get("/regionals", function (data) {
            const select = $("#cabang-regional");
            select
                .empty()
                .append(`<option value="">-- Pilih Regional --</option>`);
            data.forEach((r) => {
                select.append(`<option value="${r.id}">${r.nama}</option>`);
            });
        });
    };

    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");

        // Tunggu sampai data regional selesai dimuat, baru get detail cabang
        loadRegionals()
            .then(() => {
                return $.get(`/cabangs/${id}`);
            })
            .then((data) => {
                $("#cabang-id").val(data.id);
                $("#cabang-nama").val(data.nama);
                $("#cabang-kode").val(data.kode);
                $("#cabang-alamat").val(data.alamat);
                $("#cabang-telepon").val(data.telepon);
                $("#cabang-regional").val(data.regional_id);
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
                    url: `/cabangs/${id}`,
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

    $("#form-cabang").on("submit", function (e) {
        e.preventDefault();
        const id = $("#cabang-id").val();
        const method = id ? "PUT" : "POST";
        const url = id ? `/cabangs/${id}` : `/cabangs`;

        $.ajax({
            url: url,
            method: method,
            data: {
                nama: $("#cabang-nama").val(),
                kode: $("#cabang-kode").val(),
                alamat: $("#cabang-alamat").val(),
                telepon: $("#cabang-telepon").val(),
                regional_id: $("#cabang-regional").val(),
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
                $("#form-cabang")[0].reset();
                $("#cabang-id").val("");
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

    // Import Cabang Excel
    $("#form-import-cabang").on("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            url: "/cabangs/import",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function () {
                table.DataTable().ajax.reload();
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: "Berhasil Tambah",
                    timer: 2000,
                    showConfirmButton: false,
                });
                offImportCanvas.hide();
                $("#form-import-cabang")[0].reset();
            },
            error: function (xhr) {
                Swal.fire(
                    "Gagal",
                    "Gagal mengimport data: " + xhr.responseText,
                    "error"
                );
            },
        });
    });
});
