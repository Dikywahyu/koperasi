$(function () {
    const table = $(".datatables-basic");
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
                text: '<i class="ri-add-line"></i> Tambah Cabang',
                className: "btn btn-primary",
                action: function () {
                    $("#form-cabang")[0].reset();
                    $("#cabang-id").val("");
                    loadRegionals();
                    offCanvas.show();
                },
            },
        ],
        responsive: true,
        pageLength: 10,
    });

    const loadRegionals = () => {
        return $.get("/regionals", function (data) {
            const select = $("#cabang-regional");
            select.empty().append(`<option value="">-- Pilih Regional --</option>`);
            data.forEach(r => {
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
});
