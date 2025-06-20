$(function () {
    const table = $(".datatables-basic");
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    table.DataTable({
        ajax: {
            url: "/instansis",
            dataSrc: "",
        },
        columns: [
            {
                data: null,
                title: "No",
                render: (data, type, row, meta) => meta.row + 1,
            },
            { data: "nama", title: "Nama Instansi" },
            { data: "alamat", title: "Alamat" },
            { data: "telepon", title: "Telepon" },
            {
                data: "penanggung_jawab.nama",
                title: "Penanggung Jawab",
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
                text: '<i class="ri-add-line"></i> Tambah Instansi',
                className: "btn btn-primary",
                action: function () {
                    $("#form-instansi")[0].reset();
                    $("#instansi-id").val("");
                    loadDonaturs();
                    offCanvas.show();
                },
            },
        ],
        responsive: true,
        pageLength: 10,
    });

    const loadDonaturs = () => {
        return $.get("/donaturs", function (data) {
            const select = $("#instansi-penanggung-jawab");
            select.empty().append(`<option value="">-- Pilih Penanggung Jawab --</option>`);
            data.forEach(d => {
                select.append(`<option value="${d.id}">${d.nama}</option>`);
            });
        });
    };


    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");

        loadDonaturs()
            .then(() => {
                return $.get(`/instansis/${id}`);
            })
            .then((data) => {
                $("#instansi-id").val(data.id);
                $("#instansi-nama").val(data.nama);
                $("#instansi-alamat").val(data.alamat);
                $("#instansi-telepon").val(data.telepon);
                $("#instansi-penanggung-jawab").val(data.penanggung_jawab_id);
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
                    url: `/instansis/${id}`,
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

    $("#form-instansi").on("submit", function (e) {
        e.preventDefault();
        const id = $("#instansi-id").val();
        const method = id ? "PUT" : "POST";
        const url = id ? `/instansis/${id}` : `/instansis`;

        $.ajax({
            url: url,
            method: method,
            data: {
                nama: $("#instansi-nama").val(),
                alamat: $("#instansi-alamat").val(),
                telepon: $("#instansi-telepon").val(),
                penanggung_jawab_id: $("#instansi-penanggung-jawab").val(),
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
                $("#form-instansi")[0].reset();
                $("#instansi-id").val("");
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
