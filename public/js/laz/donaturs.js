$(function () {
    const table = $(".datatables-basic");
    const offCanvasElement = document.getElementById("add-new-record");
    const offCanvas = new bootstrap.Offcanvas(offCanvasElement);
    if (!table.length) return;

    table.DataTable({
        ajax: {
            url: "/donaturs",
            dataSrc: "",
        },
        columns: [
            {
                data: null,
                title: "No",
                render: (data, type, row, meta) => meta.row + 1,
            },
            { data: "nama", title: "Nama Donatur" },
            { data: "kode_donatur", title: "Kode" },
            { data: "alamat", title: "Alamat" },
            { data: "kontak", title: "Kontak" },
            {
                data: "instansi.nama",
                title: "Instansi",
                defaultContent: "-",
            },
            {
                data: "user.name",
                title: "User",
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
                text: '<i class="ri-add-line"></i> Tambah Donatur',
                className: "btn btn-primary",
                action: function () {
                    $("#form-donatur")[0].reset();
                    $("#donatur-id").val("");
                    loadUsers();
                    loadInstansis();
                    offCanvas.show();
                },
            },
        ],
        responsive: true,
        pageLength: 10,
    });

    function loadUsers() {
        $.get("/users", function (users) {
            const select = $("#donatur-user");
            select.empty().append(`<option value="">-- Pilih User --</option>`);
            users.forEach((u) =>
                select.append(`<option value="${u.id}">${u.name}</option>`)
            );
        });
    }

    function loadInstansis() {
        $.get("/instansis", function (data) {
            const select = $("#donatur-instansi");
            select
                .empty()
                .append(`<option value="">-- Pilih Instansi --</option>`);
            data.forEach((i) =>
                select.append(`<option value="${i.id}">${i.nama}</option>`)
            );
        });
    }

    $(document).on("click", ".btn-edit", function () {
        const id = $(this).data("id");
        $.get(`/donaturs/${id}`, function (data) {
            $("#donatur-id").val(data.id);
            $("#donatur-nama").val(data.nama);
            $("#donatur-kode").val(data.kode_donatur);
            $("#donatur-alamat").val(data.alamat);
            $("#donatur-kontak").val(data.kontak);
            $("#donatur-user").val(data.user_id);
            $("#donatur-instansi").val(data.instansi_id);
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
                    url: `/donaturs/${id}`,
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

    $("#form-donatur").on("submit", function (e) {
        e.preventDefault();
        const id = $("#donatur-id").val();
        const method = id ? "PUT" : "POST";
        const url = id ? `/donaturs/${id}` : `/donaturs`;

        $.ajax({
            url: url,
            method: method,
            data: {
                nama: $("#donatur-nama").val(),
                kode_donatur: $("#donatur-kode").val(),
                alamat: $("#donatur-alamat").val(),
                kontak: $("#donatur-kontak").val(),
                user_id: $("#donatur-user").val(),
                instansi_id: $("#donatur-instansi").val(),
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
                $("#form-donatur")[0].reset();
                $("#donatur-id").val("");
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
