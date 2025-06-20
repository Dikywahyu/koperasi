$(function () {
    const table = $(".datatables-basic");
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    table.DataTable({
        ajax: {
            url: "/kwitansis",
            dataSrc: "",
        },
        columns: [
            {
                data: null,
                title: "No",
                render: (data, type, row, meta) => meta.row + 1,
            },
            { data: "nomor_transaksi", title: "No. Transaksi" },
            { data: "donasi.donatur.nama", title: "Donatur" },
            {
                data: "total",
                title: "Total",
                render: (data) =>
                    new Intl.NumberFormat("id-ID", {
                        style: "currency",
                        currency: "IDR",
                    }).format(data),
            },
            {
                data: "komisi_zisco",
                title: "Komisi Zisco",
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
                    const date = new Date(data);
                    return `${date.getMonth() + 1}-${date.getFullYear()}`;
                },
            },
            {
                data: "dicetak",
                title: "Dicetak",
                render: (val) =>
                    val
                        ? '<span class="badge bg-success">Sudah</span>'
                        : '<span class="badge bg-secondary">Belum</span>',
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
                text: '<i class="ri-add-line"></i> Tambah Kwitansi',
                className: "btn btn-primary",
                action: function () {
                    $("#form-kwitansi")[0].reset();
                    $("#kwitansi-id").val("");
                    loadDonasis();
                    offCanvas.show();
                },
            },
        ],
        responsive: true,
        pageLength: 10,
    });

    function loadDonasis() {
        $.get("/donasis", function (data) {
            const select = $("#kwitansi-donasi");
            select
                .empty()
                .append(`<option value="">-- Pilih Donasi --</option>`);
            data.forEach((d) => {
                const label = `${d.donatur.nama} - ${d.bulan_donasi}`;
                select.append(`<option value="${d.id}">${label}</option>`);
            });
        });
    }

    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");
        $.get(`/kwitansis/${id}`, function (data) {
            $("#kwitansi-id").val(data.id);
            $("#kwitansi-donasi").val(data.donasi_id);
            $("#kwitansi-total").val(data.total);
            $("#kwitansi-komisi").val(data.komisi_zisco);
            $("#kwitansi-bulan").val(data.bulan_donasi);
            $("#kwitansi-dicetak").prop("checked", data.dicetak);
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
                    url: `/kwitansis/${id}`,
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

    $("#form-kwitansi").on("submit", function (e) {
        e.preventDefault();
        const id = $("#kwitansi-id").val();
        const method = id ? "PUT" : "POST";
        const url = id ? `/kwitansis/${id}` : `/kwitansis`;

        $.ajax({
            url: url,
            method: method,
            data: {
                donasi_id: $("#kwitansi-donasi").val(),
                total: $("#kwitansi-total").val(),
                komisi_zisco: $("#kwitansi-komisi").val(),
                bulan_donasi: $("#kwitansi-bulan").val(),
                dicetak: $("#kwitansi-dicetak").is(":checked") ? 1 : 0,
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
                $("#form-kwitansi")[0].reset();
                $("#kwitansi-id").val("");
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
