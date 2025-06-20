$(function () {
    const table = $(".datatables-basic");
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
            { data: "nama", title: "Nama Jenis Donasi" },
            { data: "jenis", title: "Kategori" },
            {
                data: "deskripsi",
                title: "Deskripsi",
                render: (data) => data || "-",
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
                text: '<i class="ri-add-line"></i> Tambah Jenis Donasi',
                className: "btn btn-primary",
                action: function () {
                    $("#form-jenis-donasi")[0].reset();
                    $("#jenis-donasi-id").val("");
                    offCanvas.show();
                },
            },
        ],
        responsive: true,
        pageLength: 10,
    });

    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");
        $.get(`/jenis-donasis/${id}`, function (data) {
            $("#jenis-donasi-id").val(data.id);
            $("#jenis-donasi-nama").val(data.nama);
            $("#jenis-donasi-jenis").val(data.jenis);
            $("#jenis-donasi-deskripsi").val(data.deskripsi);
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
        const id = $("#jenis-donasi-id").val();
        const method = id ? "PUT" : "POST";
        const url = id ? `/jenis-donasis/${id}` : `/jenis-donasis`;

        $.ajax({
            url: url,
            method: method,
            data: {
                nama: $("#jenis-donasi-nama").val(),
                jenis: $("#jenis-donasi-jenis").val(),
                deskripsi: $("#jenis-donasi-deskripsi").val(),
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
                $("#jenis-donasi-id").val("");
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
