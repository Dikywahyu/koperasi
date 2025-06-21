$(function () {
    const table = $(".datatables-basic");
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    // ===== Load dropdowns (dengan sorting)

    // Jenis Donasi
    const loadJenisDonasis = () => {
        return $.get("/jenis-donasis", function (data) {
            const select = $("#donasi-jenis");
            select
                .empty()
                .append(`<option value="">-- Pilih Jenis Donasi --</option>`);
            data.sort((a, b) => a.nama.localeCompare(b.nama)).forEach((j) => {
                select.append(`<option value="${j.id}">${j.nama}</option>`);
            });
        });
    };

    // Zisco
    const loadZiscos = () => {
        return $.get("/ziscos", function (data) {
            const select = $("#donasi-zisco");
            select
                .empty()
                .append(
                    `<option value="">-- Pilih Zisco (Opsional) --</option>`
                );
            data.sort((a, b) => a.nama.localeCompare(b.nama)).forEach((z) => {
                select.append(`<option value="${z.id}">${z.nama}</option>`);
            });
        });
    };

    // Donatur
    const loadDonatursForDonasi = () => {
        return $.get("/donaturs", function (data) {
            const select = $("#donasi-donatur");
            select
                .empty()
                .append(`<option value="">-- Pilih Donatur --</option>`);
            data.sort((a, b) => a.nama.localeCompare(b.nama)).forEach((d) => {
                select.append(`<option value="${d.id}">${d.nama}</option>`);
            });
        });
    };

    // ===== Init DataTable
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
            { data: "donatur.nama", title: "Donatur", defaultContent: "-" },
            { data: "zisco.nama", title: "Zisco", defaultContent: "-" },
            { data: "jenis_donasi.nama", title: "Jenis ", defaultContent: "-" },
            {
                data: "nominal",
                title: "Nominal",
                render: (d) => `Rp ${parseFloat(d).toLocaleString()}`,
            },
            { data: "bulan_donasi", title: "Awal " },
            { data: "metode", title: "Metode", defaultContent: "-" },
            {
                data: "status",
                title: "Status",
                render: (d) => (d === "aktif" ? "✅ Aktif" : "❌ Nonaktif"),
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
                    Promise.all([
                        loadDonatursForDonasi(),
                        loadZiscos(),
                        loadJenisDonasis(),
                    ]).then(() => {
                        offCanvas.show();
                    });
                },
            },
        ],
        responsive: true,
        pageLength: 10,
    });

    // ====== Edit Donasi
    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");

        Promise.all([loadDonatursForDonasi(), loadZiscos(), loadJenisDonasis()])
            .then(() => {
                return $.get(`/donasis/${id}`);
            })
            .then((data) => {
                $("#donasi-id").val(data.id);
                $("#donasi-nominal").val(data.nominal);
                $("#donasi-bulan").val(data.bulan_donasi);
                $("#donasi-metode").val(data.metode);
                $("#donasi-donatur").val(data.donatur_id);
                $("#donasi-zisco").val(data.zisco_id);
                $("#donasi-jenis").val(data.jenis_donasi_id);
                $("#donasi-status").val(data.status);

                offCanvas.show();
            });
    });

    // ====== Hapus Donasi
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

    // ====== Submit Form
    $("#form-donasi").on("submit", function (e) {
        e.preventDefault();
        const id = $("#donasi-id").val();
        const method = id ? "PUT" : "POST";
        const url = id ? `/donasis/${id}` : `/donasis`;

        $.ajax({
            url: url,
            method: method,
            data: {
                nominal: $("#donasi-nominal").val(),
                bulan_donasi: $("#donasi-bulan").val(),
                metode: $("#donasi-metode").val(),
                donatur_id: $("#donasi-donatur").val(),
                zisco_id: $("#donasi-zisco").val(),
                status: $("#donasi-status").val(),
                jenis_donasi_id: $("#donasi-jenis").val(),
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
