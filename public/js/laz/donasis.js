$(function () {
    const table = $(".datatables-basic");
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    table.DataTable({
        ajax: {
            url: "/donasis",
            dataSrc: "",
        },
        columns: [
            {
                data: null,
                title: "No",
                render: (data, type, row, meta) => meta.row + 1,
            },
            { data: "donatur.nama", title: "Donatur" },
            { data: "jenis_donasi.nama", title: "Jenis Donasi" },
            {
                data: "zisco.nama",
                title: "Zisco",
                defaultContent: "-",
            },
            {
                data: "nominal",
                title: "Nominal",
                render: (data) =>
                    new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(data),
            },
            {
                data: "bulan_donasi",
                title: "Bulan Donasi",
                render: (data) => {
                    if (!data) return "-";
                    const date = new Date(data);
                    return `${date.getMonth() + 1}-${date.getFullYear()}`;
                },
            },
            { data: "metode", title: "Metode" },
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
                text: '<i class="ri-add-line"></i> Tambah Donasi',
                className: "btn btn-primary",
                action: function () {
                    $("#form-donasi")[0].reset();
                    $("#donasi-id").val("");
                    loadDonaturs();
                    loadJenisDonasi();
                    loadZiscos();
                    offCanvas.show();
                },
            },
        ],
        responsive: true,
        pageLength: 10,
    });

    function loadDonaturs() {
        $.get("/donaturs", function (res) {
            const select = $("#donasi-donatur");
            select
                .empty()
                .append(`<option value="">-- Pilih Donatur --</option>`);
            res.forEach((item) => {
                select.append(
                    `<option value="${item.id}">${item.nama}</option>`
                );
            });
        });
    }

    function loadJenisDonasi() {
        $.get("/jenis-donasis", function (res) {
            const select = $("#donasi-jenis");
            select
                .empty()
                .append(`<option value="">-- Pilih Jenis --</option>`);
            res.forEach((item) => {
                select.append(
                    `<option value="${item.id}">${item.nama}</option>`
                );
            });
        });
    }

    function loadZiscos() {
        $.get("/ziscos", function (res) {
            const select = $("#donasi-zisco");
            select
                .empty()
                .append(
                    `<option value="">-- Pilih Zisco (Opsional) --</option>`
                );
            res.forEach((item) => {
                select.append(
                    `<option value="${item.id}">${item.nama}</option>`
                );
            });
        });
    }

    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");
        $.get(`/donasis/${id}`, function (data) {
            $("#donasi-id").val(data.id);
            $("#donasi-donatur").val(data.donatur_id);
            $("#donasi-jenis").val(data.jenis_donasi_id);
            $("#donasi-zisco").val(data.zisco_id);
            $("#donasi-nominal").val(data.nominal);
            $("#donasi-bulan").val(data.bulan_donasi);
            $("#donasi-metode").val(data.metode);
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
                    url: `/donasis/${id}`,
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

    $("#form-donasi").on("submit", function (e) {
        e.preventDefault();
        const id = $("#donasi-id").val();
        const method = id ? "PUT" : "POST";
        const url = id ? `/donasis/${id}` : `/donasis`;

        $.ajax({
            url: url,
            method: method,
            data: {
                donatur_id: $("#donasi-donatur").val(),
                jenis_donasi_id: $("#donasi-jenis").val(),
                zisco_id: $("#donasi-zisco").val(),
                nominal: $("#donasi-nominal").val(),
                bulan_donasi: $("#donasi-bulan").val(),
                metode: $("#donasi-metode").val(),
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
                $("#form-donasi")[0].reset();
                $("#donasi-id").val("");
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
