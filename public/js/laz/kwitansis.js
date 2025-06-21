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
            { data: "nomor_transaksi", title: "Nomor Transaksi" },
            {
                data: "donasi.donatur.nama",
                title: "Donasi",
                defaultContent: "-",
            },
            {
                data: "total",
                title: "Total",
                render: (d) => `Rp ${parseFloat(d).toLocaleString()}`,
            },
            {
                data: "komisi_zisco",
                title: "Komisi Zisco",
                render: (d) => `Rp ${parseFloat(d).toLocaleString()}`,
            },
            { data: "bulan_donasi", title: "Bulan Donasi" },
            {
                data: "dicetak",
                title: "Status Cetak",
                render: (d) => (d ? "Sudah" : "Belum"),
            },
            {
                data: "id",
                title: "Aksi",
                orderable: false,
                render: (id) => `
                    <button class="btn btn-warning btn-sm btn-edit" data-id="${id}"><i class="ri-edit-box-line"></i></button>
                    <button class="btn btn-danger btn-sm btn-delete" data-id="${id}"><i class="ri-delete-bin-5-line"></i></button>
                    <a href="/kwitansi/cetak/${id}" class="btn btn-success btn-sm" target="_blank">
                        <i class="ri-printer-line"></i>
                    </a>
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
                    $("#kwitansi-dicetak").prop("checked", false);
                    loadDonasi();
                    offCanvas.show();
                },
            },
        ],
        responsive: true,
        pageLength: 10,
    });

    function loadDonasi() {
        $.get("/donasis", function (data) {
            const select = $("#kwitansi-donasi");
            select
                .empty()
                .append(`<option value="">-- Pilih Donasi --</option>`);
            data.forEach((d) => {
                select.append(
                    `<option value="${d.id}">${
                        d.donatur?.nama ?? "-"
                    } - Rp ${parseFloat(d.nominal).toLocaleString()}</option>`
                );
            });
        });
    }

    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");
        $.get(`/kwitansis/${id}`, function (data) {
            $("#kwitansi-id").val(data.id);
            $("#kwitansi-total").val(data.total);
            $("#kwitansi-komisi").val(data.komisi_zisco);
            $("#kwitansi-bulan").val(data.bulan_donasi);
            $("#kwitansi-dicetak").prop("checked", data.dicetak);
            loadDonasi();
            setTimeout(() => {
                $("#kwitansi-donasi").val(data.donasi_id);
            }, 100);
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
                dicetak: $("#kwitansi-dicetak").is(":checked"),
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
