@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Diisi via AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Form Tambah/Edit -->
    <div class="offcanvas offcanvas-end" id="add-new-record">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title">Tambah / Edit Tipe Dokumen</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-grow-1">
            <form class="add-new-record pt-0 row g-3" id="form-tipe-dokumen">
                <input type="hidden" id="tipe-dokumen-id" name="id">

                <!-- Nama -->
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-file-line"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                class="form-control"
                                placeholder="Nama Tipe Dokumen"
                                required />
                            <label for="nama">Nama</label>
                        </div>
                    </div>
                </div>

                <!-- Kode -->
                <div class="col-sm-12">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="ri-hashtag"></i></span>
                        <div class="form-floating form-floating-outline">
                            <input
                                type="text"
                                id="kode"
                                name="kode"
                                class="form-control"
                                placeholder="Kode Tipe Dokumen"
                                required />
                            <label for="kode">Kode</label>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="col-sm-12">
                    <div class="form-floating form-floating-outline">
                        <textarea
                            id="deskripsi"
                            name="deskripsi"
                            class="form-control"
                            placeholder="Deskripsi"
                            style="height: 100px"></textarea>
                        <label for="deskripsi">Deskripsi</label>
                    </div>
                </div>

                <!-- Tombol -->
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary data-submit me-sm-4 me-1">Simpan</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JS khusus tipe dokumen -->
<script src="{{ asset('js/master/tipe_dokumen.js') }}"></script>
@endsection