$(function () {
    const table = $(".datatables-basic");
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    table.DataTable({
        ajax: {
            url: BASE_URL + "/perusahaans",
            dataSrc: "",
        },
        columns: [
            {
                data: null,
                title: "No",
                orderable: false,
                searchable: false,
                render: (data, type, row, meta) => meta.row + 1,
            },
            { data: "nama", title: "Nama Perusahaan" },
            { data: "alamat", title: "Alamat" },
            { data: "telepon", title: "Telepon" },
            {
                data: "id",
                title: "Actions",
                orderable: false,
                render: (id) => `
                    <button class="btn btn-sm btn-warning btn-edit" data-id="${id}">Edit</button>
                    <button class="btn btn-sm btn-danger btn-delete" data-id="${id}">Hapus</button>
                `,
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
                buttons: ["copy", "csv", "excel", "pdf", "print"].map(
                    (type) => ({
                        extend: type,
                        className: "dropdown-item",
                    })
                ),
            },
            {
                text: '<i class="ri-add-line ri-16px me-sm-2"></i> <span class="d-none d-sm-inline-block">Tambah Perusahaan</span>',
                className:
                    "create-new btn btn-primary waves-effect waves-light",
                action: function () {
                    $("#form-perusahaan")[0].reset();
                    $("#perusahaan-id").val("");
                    offCanvas.show();
                },
            },
        ],
        responsive: true,
        pageLength: 10,
        autoWidth: false,
    });

    // Edit
    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");
        $.get(`/perusahaans/${id}`, function (data) {
            $("#perusahaan-id").val(data.id);
            $("#perusahaan-nama").val(data.nama);
            $("#perusahaan-alamat").val(data.alamat);
            $("#perusahaan-telepon").val(data.telepon);
            offCanvas.show();
        });
    });

    // Hapus
    $(document).on("click", ".btn-delete", function () {
        const id = $(this).data("id");
        Swal.fire({
            title: "Yakin hapus data ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            customClass: {
                confirmButton: "btn btn-primary me-3",
                cancelButton: "btn btn-outline-secondary",
            },
            buttonsStyling: false,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: `/perusahaans/${id}`,
                    method: "DELETE",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function () {
                        table.DataTable().ajax.reload();
                        Swal.fire({
                            icon: "success",
                            title: "Dihapus !",
                            text: "Data berhasil dihapus",
                            timer: 2000,
                            showConfirmButton: false,
                        });
                    },
                    error: function (xhr) {
                        Swal.fire("Gagal", xhr.responseJSON.message, "error");
                    },
                });
            }
        });
    });

    // Simpan (create/update)
    $("#form-perusahaan").on("submit", function (e) {
        e.preventDefault();
        const id = $("#perusahaan-id").val();
        const url = id ? `/perusahaans/${id}` : `/perusahaans`;
        const method = id ? "PUT" : "POST";

        $.ajax({
            url: url,
            method: method,
            data: {
                nama: $("#perusahaan-nama").val(),
                alamat: $("#perusahaan-alamat").val(),
                telepon: $("#perusahaan-telepon").val(),
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function () {
                table.DataTable().ajax.reload();
                Swal.fire({
                    icon: "success",
                    title: "Yey !",
                    text: id ? "Berhasil Update" : "Berhasil Tambah",
                    timer: 2000,
                    showConfirmButton: false,
                });
                $("#form-perusahaan")[0].reset();
                $("#perusahaan-id").val("");
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
